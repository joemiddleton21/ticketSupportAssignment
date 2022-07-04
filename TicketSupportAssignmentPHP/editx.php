<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once './resources/library.php';
    
    $connection = getConnection();
    if (!$connection) {
        echo '<p>System unavailable!</p>';
        exit(); // No need to continue if we have no database connection
    }
    
    setupSession();

$editResponse = updateUser($_POST['first_name'],$_POST['last_name'],
            $_POST['department_name'],$_POST['room_location'],$_POST['email'],
            $connection);
// Reset user password.
// Returns: ?VE (Validation error) | ?DE (Database error) | OK
function updateUser($first_name, $last_name, $department_name, $room_location, $email, $connection) {
    
    // check to see if the user ID meets the format rules
    if (!validateFirst_name($first_name)) {
        return '?VE'; // Validation error! Invalid user ID!
    }
    
    if (!validateLast_name($last_name)) {
        return '?VE'; // Validation error! Invalid user ID!
    }
    
    if (!validateDepartment_name($department_name)) {
        return '?VE'; // Validation error! Invalid user ID!
    }
    
    if (!validateRoom_location($room_location)) {
        return '?VE'; // Validation error! Invalid user ID!
    }  
    
    if (!validateEmail($email)) {
        return '?VE'; // Validation error! Invalid user ID!
    }  
    
    if (isAvailable($user_id, $connection)) {
        return '?VE'; // No such user!
    }
//     $sql = "UPDATE user SET password = '$pHash' WHERE username = '$user_id'";
//     
//    $sql = "UPDATE user SET first_name, last_name, department_name, room_location, email, first_name = '$first_name'"
//            .", last_name = '$last_name', department_name = '$department_name', room_location = '$room_location', email = '$email' WHERE user_id = '$user_id'";
    $sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', department_name = '$department_name', room_location = '$room_location', email = '$email' "
            ."WHERE user_id = '$user_id'";
    if (mysqli_query($connection, $sql)) {
        return 'OK'; // Password updated!  
    } else {
        return '?DE'; // Database error!
    }
}

// PRIVATE USE: Validates a name. Returns true if valid, false otherwise
function validateFirst_name($password1, $password2) {
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

echo $editResponse;