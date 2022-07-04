<?php

    require_once './resources/library.php';
    
    $connection = getConnection();
    if (!$connection) {
        echo '<p>System unavailable!</p>';
        exit(); // No need to continue if we have no database connection
    }
    
    setupSession();
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
            <h1 style="font-size:50px">Edit Details</h1>
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

            <?php
                $sql = "SELECT first_name, last_name, department_name, room_location, email "
                        . "FROM user "
                        . "WHERE username = '" . $_SESSION['user_id'] . "'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);
                
                if (mysqli_num_rows($result) != 1) {
                    echo '<p>No Such Message! Please Login or Register</np>';
                }

            ?>
    
    <h4>Update User Details Here:</h4>
<table>
  <tr>
      
      
    <th>First Name</th>
    <th><input type="text" id="first_name" name="first_name" placeholder="first name..." <?php 
                    echo 'value="' . $row['first_name'] . '"';
                ?>><br></th>
                
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" id="last_name" name="last_name" placeholder="last name..." <?php 
                    echo 'value="' . $row['last_name'] . '"'; 
                ?>><br></td>
                    
  </tr>
  <tr>
    <th>Department Name</th>
    <th><input type="text" id="department_name" placeholder="department name..." <?php 
                    echo 'value="' . $row['department_name'] . '"'; 
                ?> ><br></th>
                    
  </tr>
  <tr>
    <th>Room Location</th>
    <th><input type="text" id="room_location" placeholder="room location..." <?php 
                    echo 'value="' . $row['room_location'] . '"'; 
                ?>><br></th>
                 
  </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="text" id="email" placeholder="email..." <?php 
                    echo 'value="' . $row['email'] . '"'; 
                ?>><br></td>
                    
  </tr>
</table>
        <button id="button" class="button" onclick="updateUser()" >Update User</button>
                


    <br><br>


</html>