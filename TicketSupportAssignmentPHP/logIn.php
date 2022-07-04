<?php

    require_once './resources/library.php';
//    include('functions.php');
    
    $connection = getConnection();
    if (!$connection) {
        echo '<p>System unavailable!</p>';
        exit(); // No need to continue if we have no database connection
    }
    
    setupSession();

    // in case a user navigates directly to this page
    if(isLoggedIn()) {
        header("Location: index.php");
        exit();
    }
   
?> 

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Ticket Assignment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <br />
        <p style="font-size: 20px;" id="output"></p>
        <script src="assignment.js"></script>
    <link rel="stylesheet" href="assignment.css">
    
    <div class="background-image">
        <div class="background-text">
            <h1 style="font-size:50px">Log In</h1>
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
            <label for="user_id">User Name</label><br>
            <input type="text" id="user_id" name="user_id" placeholder="user name...">
            <br><br>
            
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="password...">
            <br><br>
            
            <button id="button" class="button" onclick="login()" >Login</button>
            <br><br>

            <p id="login_status"></p>
<!--        I am assuming the log in function will be learned next term so for now i have just given it a filler name in the submit function-->

    <br>
    <a href="adminPortal.php">Admin Login</a><br /> 
<!--        I am assuming that i can use the same log-in method and use code to differentiate between admin and user but for now i wanted to show it was being addressed-->
        <br>
        <a href="resetPassword.php">Forgotten Password?</a><br />
    <br>
    </body>
</html>