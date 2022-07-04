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
        <a href="registration.php">Registration</a>        <a href="tickets.php">Tickets</a>
        <a href="myAccount.php" style="float:right">My Account</a>
        <a href="logIn.php" style="float:right">Log In</a>
    </div>

    <br>
    
    <div class="card">
    <h2>Tickets:</h2>
    <h3>Welcome, <?php echo $_SESSION['first_name']; ?></h3>
        <p>Please use the buttons below to display, edit and delete any tickets linked with your user account. If you mark an open ticket as complete, it will be displayed in the closed ticket
           area after approval.</p>
    </div>
    <br>
    
    <form action="">
        <button class="button" formaction="createTicket.php">Create Ticket</button>
        <button class="button" formaction="openTickets.php">Open Tickets</button>
        <button class="button" formaction="closedTickets.php">Closed Tickets</button>
        <button class="button" formaction="editTickets.php" style="float: ">Edit Tickets</button>
    </form>  
     
    <br>    
    
    </body>
</html>
