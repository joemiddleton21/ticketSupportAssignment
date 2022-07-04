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
            <h1 style="font-size:50px">Admin Portal - My Account</h1>
        </div>
    </div>

<!--    <div class="nav">
        <a href="index.php">Home</a>
        <a href="registration.php">Registration</a>
        <a href="tickets.php">Tickets</a>
        <a href="myAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>-->

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="adminTickets.php">Tickets</a> 
        <a href="adminMyAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>
        <!--        I have created separate html pages for admins use of the ticket requests. I am assuming that i can use the same log-in method and use code to differentiate between admin and user but for now i wanted to show it was being addressed-->
    <br>
    
<br/>

    <form action="">
        <button class="button" formaction="adminTickets.php">My Tickets</button>
        <button class="button" formaction="adminMyAccount.php">Edit Details</button>
    </form>


    </body>
</html>