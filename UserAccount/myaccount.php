<?php
  require_once "../pageformat.php";
  require_once "../config.php";
  //require_once "../session.php";
  pagenavbar();
  if(session_status() === PHP_SESSION_ACTIVE){
      # --- VARS / get userid from session --- #
      $errstring = "";
      $CID = $_SESSION["sessionID"];
      
    
      # --- FILL FIELDS --- #
      if($fill=$db->prepare("SELECT fname, lname, email, pass FROM customers WHERE CID = $CID")){
          $fill->execute();
          $fill->bind_result($firstname, $lastname, $emailaddr, $password);
          $fill->fetch();
          $fill->close();
      } else $errstring = "Something went wrong!";
    
      # --- SUBMIT STUFF --- #
      if(isset($_POST['submit'])) {
        $pass = $_POST['password'];
        $confpass = $_POST['confpass'];
        if(strcmp($pass, $confpass) === 0){
            $fname = trim($_POST['firstname']);
            $lname = trim($_POST['lastname']);
            $pass =  trim($_POST['password']);
            $pass_hash=password_hash($pass, PASSWORD_BCRYPT);
            if($update=$db->prepare("UPDATE customers SET fname = '$fname', lname = '$lname', pass = '$pass_hash' WHERE CID=$CID")){
              $update->execute();
              $update->close();
            } else $errstring = "Error updating record.";
        }
        else $errstring = "Passwords do not match.";
      }
  } else header("Location: ../userlogin/login.php");
  
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
                 <form action="./myaccount.php" method="post">
                     <div class="form-group" style="width: 300px">
                         <label>First Name</label>
                         <input value="<?php echo $firstname;?>" type="text" id="firstname" name="firstname" class="form-control" required disabled>
                     </div>
                     <div class="form-group">
                         <label>Last Name</label>
                         <input value="<?php echo $lastname;?>" type="text" id="lastname" name="lastname" class="form-control" required disabled>
                     <div class="form-group">
                         <label>Email Address</label>
                         <input value="<?php echo $emailaddr;?>" type="email" id="email" class="form-control" disabled>
                     </div>
                     <div class="form-group">
                         <label>Password</label>
                         <input value="<?php echo $pass;?>" type="password" id="password" name="password" class="form-control" required disabled>
                     </div>
                     <div class="form-group">
                         <p> <?php echo $errstring ?> </p>
                         <label id="confpassl" style="visibility:hidden">Confirm Password</label>
                         <input id="confpass" name="confpass" type="hidden" class="form-control" required disabled>
                     </div>
                     <div class="form-group"> <!--submit-->
                         <button style="background-color:#f44336;border:none;display:none" id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
                         <button style="background-color:#f44336;border:none" id="edit" onclick="changeFields()" type="button" class="btn btn-primary">Edit</button>
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
         <?php pagefooter() ?>
     </body>
 </html>
