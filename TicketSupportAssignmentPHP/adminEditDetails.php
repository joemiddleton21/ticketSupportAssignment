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
    <link rel="stylesheet" href="Assignment.css">

    <div id="fb-root"></div>
    <div class="background-image">
        <div class="background-text">
            <h1 style="font-size:50px">Edit Details</h1>
        </div>
    </div>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="registration.php">Registration</a>
        <a href="adminTickets.php">Tickets</a>
        <a href="adminMyAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>

    <br>
    
    <h4>Update User Details Here:</h4>
    <form>
<table>
  <tr>
    <th>First Name</th>
    <th><input type="text" id="firstName"><br></th>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" id="lastName"><br></td>
  </tr>
  <tr>
    <th>Contact Number</th>
    <th><input type="text" id="contactNumber"><br></th>
  </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="text" id="email"><br></td>
  </tr>  
</table>
        <input type="submit" onclick="return updateUser()" />
    </form>

    <br><br>


</html>