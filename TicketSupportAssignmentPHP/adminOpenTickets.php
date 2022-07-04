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
            <h1 style="font-size:50px">Admin Portal - Open Tickets</h1>
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
    <br>  
    
    <div class="card">
    <h4>Open Tickets:</h4>
        <p>The table below will display any open tickets currently assigned to you. If you have any updates to the service requests please use the 
            "Edit" button to provide additional details. If the issue has been resolved please use the "Mark Complete" button to alert the user. </p>
    </div>
    
    <br>
    
    <form>
<table>
  <tr>
    <th>Ticket ID</th>
    <th>Description</th>
    <th>User Comments</th>
    <th>Status</th>
    <th>Date Submitted</th>
    <th>Display</th>
    <th>Edit</th>
    <th>Mark Complete</th>
  </tr>

</table>
    </form>

<!--    <div class="nav">
        <a href="#"></a>
        <a href="#" style="float:right"></a> 
    </div>-->
    
    
    </body>
</html>