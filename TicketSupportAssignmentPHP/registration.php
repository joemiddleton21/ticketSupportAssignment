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
//    

?>

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

    <div id="fb-root"></div>
    <div class="background-image">
        <div class="background-text">
            <h1 style="font-size:50px">Registration</h1>
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
    
    <h4>Register Here:</h4>
<!--    <form action="">-->
<table>
  <tr>
    <th>First Name</th>
    <th><input type="text" id="first_name" name="first_name" placeholder="first name..." required><br></th>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" id="last_name" name="last_name" placeholder="last name..." required><br></td>
  </tr>
  <tr>
    <th>Department Name</th>
    <th><input type="text" id="department_name" placeholder="department name..." required><br></th>
  </tr>
  <!--MB = main building, NB = new building, B3 = building 3, WH = warehouse -->
  <tr>
    <th>Room Location</th>
    <th><input type="text" id="room_location" placeholder="room location..." required><br></th>
  </tr>
  <!--GF = ground floor, FF = first floor, SF = shopfloor -->
  <tr>
    <td>Email Address</td>
    <td><input type="text" id="email" placeholder="email..." required><br></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" id="password1" name="password1" placeholder="password..." required><br></td>
  </tr> 
  <tr>
    <th>Confirm Password</th>
    <th><input type="password" id="password2" name="password2" placeholder="confirm password..." required><br></th>
  </tr> 
</table>

            <button id="button" class="button" onclick="createUser()" >Register User</button>
<!--    </form>-->

    <br><br>
            <p id="action_status"></p>
    </body>
</html>
