<?php
// Supports an asynchronous JavaScript request from the registration page

require_once './resources/library.php';


$connection = getConnection();
if (!$connection) {
    // Notice that we are not using echo here
    // Although we can, we have chosen not to because 
    // We want to use echo strictly to return the response text to JavaScript
    throw new Exception("System unavailable");
}

setupSession();

// Create a new user.
// Returns: ?VE (Validation error) | ?DE (Database error) | Username
function createUser($first_name, $last_name, $department_name, $room_location, $email, $password1, $password2, $connection) {
    
//    if (!validateName($first_name) || !validateName($last_name)) {
//        return '?VE'; // Validation error!
//    }
    if (!validatePassword($password1, $password2)) {
        return '?VE'; // Validation error!
    }
    
    // Username generation
    // If first name = John & last name = Matthews,
    // Username = johnm* where * could either be nothing or a numeric value
    $user_id = strtolower($first_name . substr($last_name, 0, 1));
    if (!isAvailable($user_id, $connection)) {
        $i = 1;
        while (!isAvailable($user_id . $i, $connection)) {
            $i++;
        }
        $user_id = $user_id . $i;
    }
    
    $pHash = password_hash($password1, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (username, first_name, last_name, department_name, room_location, email, password, last_login) "
            . "VALUES ('$user_id', '$first_name', '$last_name', '$department_name', '$room_location', '$email', '$pHash', CURRENT_TIMESTAMP())";
    if (mysqli_query($connection, $sql)) { 
        return $user_id; // User created and username returned!
    } else {
        return '?DE'; // Database error!
    }
}

// Returns: ?VE (Validation error) | ?DE (Database error) | Username (if OK)
$regResponse = createUser(ucfirst($_POST['first_name']), ucfirst($_POST['last_name']), $_POST['department_name'], 
        $_POST['room_location'], $_POST['email'], $_POST['password1'], $_POST['password2'], $connection);

if (substr($regResponse, 0, 1) == '?') {
//    echo '?RF'; 
    echo $regResponse; 
    // For now, we will not reveal the reason the account creatioon failed!
} else {
    echo $regResponse; // This should be the username
}