<?php

//require_once './resources/library.php';
//
//// Reset user password.
//// Returns: ?VE (Validation error) | ?DE (Database error) | ?PE (Incorrect PIN) | OK
//function resetPassword($user_id, $password1, $password2, $connection) { //removed $pin from in between password 2 and connection    
//    // check to see if the user ID meets the format rules
//    if (!validateUserID($user_id)) {
//        return '?VE'; // Validation error! Invalid user ID!
//    }
//    
//    if (!validatePassword($password1, $password2)) {
//        return '?VE'; // Validation error!
//    }
//    
//    $pHash = password_hash($password1, PASSWORD_DEFAULT);
//    
//    $sql = "UPDATE user SET password = '$pHash' WHERE username = '$user_id'";
//    if (mysqli_query($connection, $sql)) {
//        return 'OK'; // Password updated!
//    } else {
//        return '?DE'; // Database error!
//    }
//}
//
//
//$connection = getConnection();
//if (!$connection) {
//    // Notice that we are not using echo here
//    // Although we can, we have chosen not to because 
//    // We want to use echo strictly to return the response text to JavaScript
//    throw new Exception("System unavailable");
//}
//
//setupSession();
//
//// Returns: ?VE (Validation error) | ?DE (Database error) | ?PE (Incorrect PIN) | OK
//$regResponse = resetPassword($_POST['user_id'], $_POST['password1'], 
//        $_POST['password2'], $connection);
//
//echo $regResponse;

require_once './resources/library.php';

$connection = getConnection();
if (!$connection) {
    // Notice that we are not using echo here
    // Although we can, we have chosen not to because 
    // We want to use echo strictly to return the response text to JavaScript
    throw new Exception("System unavailable");
}

setupSession(); 

// Returns: ?VE (Validation error) | ?DE (Database error) | OK
$regResponse = resetPassword($_POST['user_id'], $_POST['password1'], $_POST['password2'], $connection);

echo $regResponse;

