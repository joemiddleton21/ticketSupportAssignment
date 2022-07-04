<?php

function setupSession() {
    // Number of milliseconds after which login session should timeout
    $TIMEOUT = 1800; // seconds
    session_start(); // starts/resumes a session
    if (isset($_SESSION['timeout'])) {
        if ((time() - (int) $_SESSION['timeout']) > $TIMEOUT) {
            // session has been active for more than the timeout period
            // so we need to destroy and restart it to force a login
            session_destroy();
            session_start();
        }
    }
    // keep track of the last time the session was started/resumed
    $_SESSION['timeout'] = time();
}

// Connect to database and return the connection
function getConnection() {
    $server = "silva.computing.dundee.ac.uk";
    $username = "joemiddleton";
    $password = "bca213";
    $database = "joemiddletondb";
    return mysqli_connect($server, $username, $password, $database);
}


// Returns true if this user is logged in, false otherwise
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// PRIVATE USE: Validates a user ID. Returns true if valid, false otherwise
function validateUserID($user_id) {
    // Must start with a lowercase letter [97-122]
    // Only lower case letters and numbers [48-57, 97-122]
    if ($user_id == null || strlen($user_id) <= 0) {
        return false;
    }
    $code = ord(substr($user_id, 0, 1));
    if (!($code >= 97 && $code <= 122)) {
        return false;
    }
    for ($i = 1; $i < strlen($user_id); $i++) {
        $code = ord(substr($user_id, $i, 1));
        if (!(($code >= 48 && $code <= 57) 
                || ($code >= 97 && $code <= 122))) {
            return false;
        }
    }
    return true;
}

// PRIVATE USE: Validates a password. Returns true if valid, false otherwise
function validateName($name) {
    // Only characters (any case) 
    // No more than 15 characters [65-90, 97-122]
    if ($name == null || strlen($name) <= 0 || strlen($name) > 15) {
        return false;
    }
    for ($i = 0; $i < strlen($name); $i++) {
        $code = ord(substr($name, $i, 1));
        if (!(($code >= 65 && $code <= 90) 
                || ($code >= 97 && $code <= 122))) {
            return false;
        }
    }
    return true;
}

// Reset user password.
// Returns: ?VE (Validation error) | ?DE (Database error) | OK
function resetPassword($user_id, $password1, $password2, $connection) {
    
    // check to see if the user ID meets the format rules
    if (!validateUserID($user_id)) {
        return '?VE'; // Validation error! Invalid user ID!
    }
    
    if (!validatePassword($password1, $password2)) {
        return '?VE'; // Validation error!
    }
    
    if (isAvailable($user_id, $connection)) {
        return '?VE'; // No such user!
    }
    
    $pHash = password_hash($password1, PASSWORD_DEFAULT);
    
    $sql = "UPDATE user SET password = '$pHash' WHERE username = '$user_id'";
    if (mysqli_query($connection, $sql)) {
        return 'OK'; // Password updated!
    } else {
        return '?DE'; // Database error!
    }
}

// PRIVATE USE: Validates a name. Returns true if valid, false otherwise
function validatePassword($password1, $password2) {
    // Password must not be null. Min 1 character. 
    // Password and confirmation must be the same.
    if ($password1 == null || strlen($password1) <= 0 || $password1 !== $password2) {
        return false;
    }
    return true;
}

// check database to see if user id is available
function isAvailable($user_id, $connection) {
    
    $sql = "SELECT username FROM user WHERE username = '$user_id'";
    $result = mysqli_query($connection, $sql);
    
    // Check to see if we retrieved any record from the database
    if (mysqli_num_rows($result) == 0) {
        return true; // Username is available to use!
    } else {
        return false; // Username has been assigned to someone else!
    }
}

?>