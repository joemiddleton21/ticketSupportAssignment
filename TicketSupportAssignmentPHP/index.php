<?php

    require_once './resources/library.php';
    
    // Used to redirect the user to this page if login is required
    $page = 'index.php';
    
    $connection = getConnection();
    if (!$connection) {
        echo '<p>System unavailable!</p>';
        exit(); // No need to continue if we have no database connection
    }
    
    setupSession();
    
    // check if the user is logged in
    // force login if not logged in
    if (!isLoggedIn()) {
        $_SESSION['redirect'] = $page; // Remember this page
        header("Location: logIn.php"); // Redirect to login
        exit(); 
    }
    
?>

<!DOCTYPE html>
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
            <h1 style="font-size:50px">TechnipFMC System Support Dunfermline</h1>
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
        <h3>Welcome to TechnipFMC Dunfermline System Support</h3>
        <p>Please register your details using the "Registration" tab in the navigation bar above. If you have already registered, please log in to view open and closed requests
           and create any new requests.</p>
    </div>
    <br>
    <div class="leftcolumn">
        <h3>Team Hours</h3>
        <p>We aim to contact you regarding your help request within two working days. Below are the teams working hours.</p>
        <table>
  <tr>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
    <th>Sunday</th>    
  </tr>
  <tr>
    <th>08:00 - 18:00</th>
    <th>08:00 - 18:00</th>
    <th>08:00 - 18:00</th>
    <th>08:00 - 20:00</th>
    <th>08:00 - 16:00</th>
    <th>09:00 - 12:00</th>
    <th>Closed</th>    
  <br>
  </tr>

</table>
    </div>
    
    <div class="rightcolumn">
        <h3>What We Do</h3>
        <p>We aim to support and enhance TechnipFMC employees relationship with their IT equipment.
           If you are having an issue with any IT systems or software please send in a hel request using the tabs above.</p>    
        <br><br><br><br><br><br>
    </div>
    <br>
    </body>
</html>