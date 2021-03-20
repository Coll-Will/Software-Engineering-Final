<?php
  #pageformat pagenavbar() has been edited to include Orders.
  require_once "pageformat.php";
  include_once("databaseConnection.php");
  pagenavbar();
  # --- VARS / get userid from session --- #
  $errstring = "";
  $CID = null;

  if(session_status() === PHP_SESSION_ACTIVE) $CID = $_SESSION["userid"];
  else header("location: login.php");

  # --- GET FUNCTIONS --- #
  function getFirstName($id){
    $conn = connectDB();
    $query = $conn->query("SELECT fname FROM customers WHERE CID = $id");
    if(!$query) $errstring = "Could not run query: " . $conn->error;
    $record = $query->fetch_row();
    $fname = $record[0];
    echo $fname;
    $query->close();
    $conn->close();
  }
  function getLastName($id){
    $conn = connectDB();
    $query = $conn->query("SELECT lname FROM customers WHERE CID = $id");
    if(!$query) $errstring = "Could not run query: " . $conn->error;
    $record = $query->fetch_row();
    $name = $record[0];
    echo $name;
    $query->close();
    $conn->close();
  }
  function getEmail($id){
    $conn = connectDB();
    $query = $conn->query("SELECT email FROM customers WHERE CID = $id");
    if(!$query) echo "Could not run query: " . $conn->error;
    $record = $query->fetch_row();
    $email = $record[0];
    echo $email;
    $query->close();
    $conn->close();
  }
  function getPassword($id){
    $conn = connectDB();
    $query = $conn->query("SELECT pass FROM customers WHERE CID = $id");
    if(!$query) $errstring = "Could not run query: " . $conn->error;
    $record = $query->fetch_row();
    $pass = $record[0];
    echo $pass;
    $query->close();
    $conn->close();
  }
  # --- SUBMIT STUFF --- #
  if(isset($_POST['submit'])) {
    $pass = $_POST['password'];
    $confpass = $_POST['confpass'];
    if(strcmp($pass, $confpass) === 0) submit($CID);
    else $errstring = "Passwords do not match.";
  }
  function submit($id){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $pass =  $_POST['password'];
    $pass_hash=password_hash($pass, PASSWORD_BCRYPT);
    $errstring = $pass_hash;
    $conn = connectDB();
    $query = "UPDATE customers SET fname = '$fname', lname = '$lname', pass = '$pass_hash' WHERE CID=$id";
    if($conn->query($query) !== TRUE) $errstring = "Error updating record: " . $conn->error;
    $conn->close();
  }
?>

 <!-- WEBPAGE -->
 <!DOCTYPE html>
 <html lang="en">
 <link rel="stylesheet" href="styles.css"> <meta charset="utf-8">
     <head>
         <meta charset="UTF-8">
         <title>My Account</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     </head>
     <style>
         html,body {
           height:100%;
           width:100%;
           margin:0;
         }
         body , body {
           display:flex;
           margin-top:5%;
         }
         form {
           margin:auto;
         }
     </style>
     <body>
         <div class="container">
             <h2 style = "text-align:center; padding-bottom: 30px; padding-top: 15px;">My Account</h2>
             <div class="row">
                 <form action="./myAccount.php" method="post">
                     <div class="form-group" style="width: 300px">
                         <label>First Name</label>
                         <input value="<?php getFirstName($CID);?>" type="text" id="firstname" name="firstname" class="form-control" required disabled>
                     </div>
                     <div class="form-group">
                         <label>Last Name</label>
                         <input value="<?php getLastName($CID);?>" type="text" id="lastname" name="lastname" class="form-control" required disabled>
                     <div class="form-group">
                         <label>Email Address</label>
                         <input value="<?php getEmail($CID);?>" type="email" id="email" class="form-control" disabled>
                     </div>
                     <div class="form-group">
                         <label>Password</label>
                         <input value="<?php getPassword($CID);?>" type="password" id="password" name="password" class="form-control" required disabled>
                     </div>
                     <div class="form-group">
                         <p> <?php echo $errstring ?> </p>
                         <label id="confpassl" style="visibility:hidden">Confirm Password</label>
                         <input id="confpass" name="confpass" type="hidden" class="form-control" required disabled>
                     </div>
                     <div class="form-group"> <!--submit-->
                         <button style="display:none" id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
                         <button id="edit" onclick="changeFields()" type="button" class="btn btn-primary">Edit</button>
                         <script>
                           function changeFields(){
                             document.getElementById('firstname').disabled = false;
                             document.getElementById('lastname').disabled = false;
                             document.getElementById('password').disabled = false;
                             document.getElementById('confpassl').style.visibility = 'visible';
                             document.getElementById('confpass').type = 'password';
                             document.getElementById('confpass').disabled = false;
                             document.getElementById('submit').style.display = 'inline';
                             document.getElementById('edit').style.visibility = 'hidden';
                           }
                         </script>
                     </div>
                 </form>
             </div>
         </div>
     </body>
 </html>
