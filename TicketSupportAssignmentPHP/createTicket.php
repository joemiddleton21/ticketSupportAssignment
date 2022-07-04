 <?php
include 'functions.php';

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
    
    <div class="background-image">
        <div class="background-text">
            <h1 style="font-size:50px">My Tickets</h1>
        </div>
    </div>
    
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="registration.php">Registration</a>
        <a href="tickets.php">Tickets</a>
        <a href="myAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>
    
    <div class="card">
    <h2>Tickets:</h2>
    <h3>Welcome, <?php echo $_SESSION['first_name']; ?></h3>
        <p>Please create a ticket below. Use as much detail as possible when creating the ticket so that we
        can ensure the correct expert is on hand to help.</p>
    </div>
    <br>
    
    
    <h4>Create Your Ticket Here:</h4>
<!--    <form action="">-->
<table>
  <tr>
    <th>Subject</th>
    <th><input type="text" id="subject" name="subject" placeholder="Subject..." required><br></th>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="text" id="msg" name="message" placeholder="Description..." required></textarea><br></td>
  </tr>
</table>

            <button id="button" class="button" onclick="createTicket()" >Create Ticket</button>
<!--    </form>-->

    <br><br>
            <p id="action_status"></p>
    </body>
</html>

