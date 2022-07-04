<?php
// Supports an asynchronous JavaScript request from the login page

require_once './resources/library.php';

$connection = getConnection();
if (!$connection) {
    // Notice that we are not using echo here
    // Although we can, we have chosen not to because 
    // We want to use echo strictly to return the response text to JavaScript
    throw new Exception("System unavailable");
}


// Login and log the date.
// Returns: OK (Logged in)      | NU (No such user)     | WP (Wrong password) 
//          SE (session error)  | IU (Invalid user ID)
function login($user_id, $password, $connection) { 
    
    // check to see if the user ID meets the format rules
    if (!validateUserID($user_id)) {
        return 'IU'; // Invalid user ID!
    }
    
    $sql = "SELECT first_name, last_name, password, last_login "
            . "FROM user WHERE username = '$user_id'";
    $result = mysqli_query($connection, $sql);
    
    // Check to see if we got only one user record from the database
    if (mysqli_num_rows($result) != 1) {
        // ...if not, then
        return 'NU'; // No such user!
    }
    
    $row = mysqli_fetch_assoc($result);
    
    if (!password_verify($password, $row['password'])) {
        return 'WP'; // Wrong password!
    }
    
    // Needed as we will be using session variables next
    if (session_status() == PHP_SESSION_NONE) {
        return 'SE'; // No active session!
    }
    
    $_SESSION['user_id'] = $user_id;
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['last_login_date'] = $row['last_login'];
    
    // Need to update last login date
    $sql = "UPDATE user SET last_login = CURRENT_TIMESTAMP() "
            . "WHERE username = '$user_id'";
    mysqli_query($connection, $sql);

    return 'OK'; // Logged in!
}

setupSession();

// Returns: OK (Logged in)      | NU (No such user)     | WP (Wrong password) 
//          SE (session error)  | IU (Invalid user ID)
$loginStatus = login($_POST['user_id'], $_POST['password'], $connection);

if ($loginStatus == 'OK') {
    echo isset($_SESSION['redirect']) ? $_SESSION['redirect'] : 'index.php';
} else {
    echo '?LF'; 
    // For now, we will not reveal to the client, the reason the login failed!
}