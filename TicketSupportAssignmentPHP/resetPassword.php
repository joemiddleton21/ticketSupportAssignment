<?php

    require_once './resources/library.php';
    
    $connection = getConnection();
    if (!$connection) {
        echo '<p>System unavailable!</p>';
        exit(); // No need to continue if we have no database connection
    }
    
    setupSession();

//    // in case a user navigates directly to this page
//    if(isLoggedIn()) {
//        header("Location: index.php");
//        exit();
//    }

?>

<html>
    <head>
        <title>Ticket Assignment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <br/>
        <p style="font-size: 20px;" id="output"></p>
        <script src="assignment.js"></script>
    <link rel="stylesheet" href="assignment.css">
    
    <div class="background-image">
        <div class="background-text">
            <h1 style="font-size:50px">Reset Password</h1>
        </div>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="registration.php">Registration</a>
        <a href="tickets.php">Tickets</a>
        <a href="myAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>
    <br>
        <div class="container">
            <h1>Password Reset</h1>
            <br>
            <h3>Please fill out the form below:</h3>

            <label for="user_id">User Name</label><br>
            <input type="text" id="user_id" name="user_id" placeholder="user name...">
            <br>
            
            <label for="password1">New Password</label><br>
            <input type="password" id="password1" name="password1" placeholder="new password...">
            <br>
            
            <label for="password2">Confirm Password</label><br>
            <input type="password" id="password2" name="password2" placeholder="confirm password...">
            <br>
            <br>
            
            <button id="button" class="button" onclick="resetPass()" >Reset Password</button>
            <br><br> 

            <p id="action_status"></p>
        </div>
    <br>
    </body>
</html>
