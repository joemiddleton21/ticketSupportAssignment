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

//$recipient = strtolower($_POST['recipient']);
$subject = mysqli_real_escape_string($connection, $_POST['subject']);
$message = mysqli_real_escape_string($connection, $_POST['message']);

$sql = "INSERT INTO tickets (user_id, subject, message, time_submitted, time_edited, created, status, email) "
        . "VALUES ('$user_id','$subject', '$message', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), '$status', '$email')";
if (mysqli_query($connection, $sql)) {
    echo 'OK'; // Ticket sent!
} else {
    return 'E'; // Error!
}