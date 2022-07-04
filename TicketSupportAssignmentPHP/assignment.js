/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



  
function createUser() {
    var fn = document.getElementById("first_name").value;
    var ln = document.getElementById("last_name").value;
    var dn = document.getElementById("department_name").value;
    var rl = document.getElementById("room_location").value;
    var em = document.getElementById("email").value;
    var p1 = document.getElementById("password1").value;
    var p2 = document.getElementById("password2").value;
//    disableUserForm(true);
    var formData = new FormData();
    formData.append("first_name", fn);
    formData.append("last_name", ln);
    formData.append("department_name", dn); 
    formData.append("room_location", rl); 
    formData.append("email", em); 
    formData.append("password1", p1);
    formData.append("password2", p2);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "?RF") {
                disableUserForm(false);
                document.getElementById("action_status").innerHTML = "User registration failed!";
            } else {
                // Copy the username to the clipboard
                updateClipboard(this.responseText);
                alert("Your username is " + this.responseText);
                // navigate to home page! -- this should force a login!
                location.replace("https://zeno.computing.dundee.ac.uk/2020-ga/joemiddleton/TicketSupportAssignmentPHP/index.php");  
            }
        } else if (this.readyState === 4) {
            disableUserForm(false);
            document.getElementById("action_status").innerHTML = "Something went wrong!";
        }
    };
    request.open("POST", "regx.php", true);
    request.send(formData);
    
}

////        I have added in functions to create and update user info although im not sure if it is the methods i should be using so i have just left them matching for now

function updateUser () {
    var fn = document.getElementById("first_name").value;
    var ln = document.getElementById("last_name").value;
    var dn = document.getElementById("department_name").value;
    var rl = document.getElementById("room_location").value;
    var em = document.getElementById("email").value;
//    disableUserForm(true);
    var formData = new FormData();
    formData.append("first_name", fn);
    formData.append("last_name", ln);
    formData.append("department_name", dn); 
    formData.append("room_location", rl); 
    formData.append("email", em); 
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "?RF") {
                disableUserForm(false);
                document.getElementById("action_status").innerHTML = "Update failed!";
            } else {
//              updateClipboard(this.responseText);
                alert ("Profile updated sucessfully");
                // navigate to home page! -- this should force a login!
                location.replace("https://zeno.computing.dundee.ac.uk/2020-ga/joemiddleton/TicketSupportAssignmentPHP/editDetails.php"); 
                 disableupdateUser(false);
            }
        } else if (this.readyState === 4) {
            disableupdateUser(false);
            document.getElementById("action_status").innerHTML = "Something went wrong!";
        }
    };
    request.open("POST", "editx.php", true);
    request.send(formData);
    
}

function verifyPassword(){
var password1 = document.getElementById("password1").value;
var password2 = document.getElementById("password2").value;

  if(password1 !== password2)
  {   
    alert("Passwords entered do not match, please try again");  
  } else {  
    alert("Log in successful");  
    return false;
  }
}

function login() {
    var u = document.getElementById("user_id").value.toLowerCase();
    var p = document.getElementById("password").value;
    disableLogin(true);
    var formData = new FormData();
    formData.append("user_id", u);
    formData.append("password", p);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === '?LF') {
                // Login failed!
                disableLogin(false);
                document.getElementById("login_status").innerHTML = "Login failed!";
            } else {
                // navigate to redirect page! should receive this from the server!
                location.replace("https://zeno.computing.dundee.ac.uk/2020-ga/joemiddleton/TicketSupportAssignmentPHP/" + this.responseText);
            }
        } else if (this.readyState === 4) {
            disableLogin(false);
            document.getElementById("login_status").innerHTML = "Something went wrong!";
        }
    };
    request.open("POST", "auth.php", true);
    request.send(formData);
}

function disableLogin(state) {
    document.getElementById("user_id").disabled = state;
    document.getElementById("password").disabled = state;
    document.getElementById("button").disabled = state;
}

function disableUserForm(state) {
    document.getElementById("first_name").disabled = state;
    document.getElementById("last_name").disabled = state;
    document.getElementById("email").disabled = state;
    document.getElementById("password1").disabled = state;
    document.getElementById("password2").disabled = state;
    document.getElementById("button").disabled = state;
}

function resetPass() {
    var u = document.getElementById("user_id").value.toLowerCase();
    var p1 = document.getElementById("password1").value;
    var p2 = document.getElementById("password2").value;
    disablePassResetForm(true);
    var formData = new FormData();
    formData.append("user_id", u);
    formData.append("password1", p1);
    formData.append("password2", p2);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            alert(this.responseText);
            if (this.responseText === "OK") {
                alert("Password reset successful!");
                location.replace("https://zeno.computing.dundee.ac.uk/2020-ga/joemiddleton/TicketSupportAssignmentPHP/index.php");
            } else {
                disablePassResetForm(false);
                document.getElementById("action_status").innerHTML = "Password reset failed!";
            }
        } else if (this.readyState === 4) {
            disablePassResetForm(false);
            document.getElementById("action_status").innerHTML = "Something went wrong!";
        }
    };
    request.open("POST", "respwx.php", true);
    request.send(formData);
}

function disablePassResetForm(state) {
    document.getElementById("user_id").disabled = state;
    document.getElementById("password1").disabled = state;
    document.getElementById("password2").disabled = state;
    document.getElementById("button").disabled = state;
}

function updateClipboard(newClip) {
  navigator.clipboard.writeText(newClip).then(function() {
    /* clipboard successfully set */
    // Add code here if needed
  }, function() {
    /* clipboard write failed */
    // Add code here if needed
  }
          );
  }
  
function createTicket() {
    var sub = document.getElementById("subject").value;
    var msg = document.getElementById("msg").value;
    var formData = new FormData();
    formData.append("subject", sub);
    formData.append("message", msg);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "E") {
                alert("Error completing ticket!");
            } else {
                alert("Your ticket has been sent!");
                location.replace("https://zeno.computing.dundee.ac.uk/2020-ga/joemiddleton/TicketSupportAssignmentPHP/openTickets.php");
            }
        } else if (this.readyState === 4) {
            alert("Something went wrong!");
        }
    };
    request.open("POST", "createTicketx.php", true);
    request.send(formData);
}

