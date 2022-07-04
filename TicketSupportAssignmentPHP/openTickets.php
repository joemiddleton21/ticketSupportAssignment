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
            <h1 style="font-size:50px">Open Tickets</h1>
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
    
    <div class="card">
    <h4>Open Tickets:</h4>
        <p>The table below will display any open tickets currently being worked on by our IT department that are linked to your account. If you have any updates to the service requests please use the 
            "Edit" button to provide additional details. If the issue has been resolved please use the "Mark Complete" button to alert the admin. </p>
    </div>
    
    <br>
    
    <form>
<table>
  <tr>
    <th>Ticket ID</th>
    <th>Description</th>
    <th>Admin Comments</th>
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