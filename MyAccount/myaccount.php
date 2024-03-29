<?php
  require_once "../pageformat.php";
  require_once "../config.php";

  pagenavbar();
  if(session_status() === PHP_SESSION_ACTIVE){
      # --- VARS / get userid from session --- #
      $errstring = "";
      $CID = $_SESSION["sessionID"];

      # --- FILL FIELDS --- #
      if($fill=$db->prepare("SELECT fname, lname, email FROM customers WHERE CID = $CID")){
          $fill->execute();
          $fill->bind_result($firstname, $lastname, $emailaddr);
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
            $pass = trim($_POST['password']);
            $pass_hash=password_hash($pass, PASSWORD_BCRYPT);
            if($update=$db->prepare("UPDATE customers SET fname = '$fname', lname = '$lname', pass = '$pass_hash' WHERE CID=$CID")){
              $update->execute();
              $update->close();
            } else $errstring = "Error updating record.";
        }
        else $errstring = "Passwords do not match.";
      }

      $orders = "";
      $query = "SELECT SID, cur_street, cur_city, cur_state, cur_zip, status FROM shipments WHERE CID = $CID";
      if($result = mysqli_query($db, $query)){
          if(mysqli_num_rows($result) > 0){
            $orders = "<table style='display:inline-block'>";
            $orders = $orders . "<th style='font-size:12'> Order# </th>";
            $orders = $orders . " <th style='font-size:12; padding-left:16px'> Current Location </th>";
            $orders = $orders . "<th style='font-size:12; padding-left:16px'> Status </th>";
            while($row = mysqli_fetch_array($result)){
                $orders = $orders . "<tr>";
                    $orders = $orders . "<td style='font-size:14; padding-top:8px'>" . $row['SID'] . "</td>";
                    if($row['status'] === '1'){
                      $orders = $orders . "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . $row['cur_street']
                      . ", " . $row['cur_city'] . ", " . $row['cur_state'] . " " . $row['cur_zip'] . "</td>";
                      $orders = $orders . "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . "In-Transit". '</td>';
                    }
                    else if($row['status'] === '2'){
                      $orders = $orders . "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . $row['cur_street']
                      . ", " . $row['cur_city'] . ", " . $row['cur_state'] . " " . $row['cur_zip'] . "</td>";
                      $orders = $orders . "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . "Delivered". '</td>';
                    }
                    else {
                      $orders = $orders . "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . "N/A" . "</td>";
                      $orders = $orders .  "<td style='font-size:14; padding-left:16px; padding-top:8px'>" . "Processing". '</td>';
                    }
                $orders = $orders . "</tr>";
            }
            $orders = $orders . "</table>";
            mysqli_free_result($result);
          }
          else $orders = "No records found.";
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
                   <div style="display: flex; padding: 5%;">
                        <div class="row" style="flex: 1; border-radius: 4px; border: solid gainsboro 1px; margin-right: 5%; padding: 5%; align-items: center; justify-content: center">
                          <h3 style="margin-bottom: 10%;">Account Information</h3>
                           <form action="./myaccount.php" method="post">
                              <div class="form-group" style="width: 300px">
                                  <label>First Name</label>
                                  <input value="<?php echo $firstname;?>" type="text" id="firstname" name="firstname" class="form-control" required disabled>
                              </div>
                              <div class="form-group">
                                  <label>Last Name</label>
                                  <input value="<?php echo $lastname;?>" type="text" id="lastname" name="lastname" class="form-control" required disabled>
                              </div>
                              <div class="form-group">
                                  <label>Email Address</label>
                                  <input value="<?php echo $emailaddr;?>" type="email" id="email" class="form-control" disabled>
                              </div>
                              <div class="form-group">
                                  <label>New Password</label>
                                  <input type="password" id="password" name="password" class="form-control" required disabled>
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
                        <div class="card" style="flex: 1; margin-right: 5%; padding: 5%; text-align: center;">
                          <h3 style="margin-bottom: 10%;"> Orders </h3>
                           <p style="text-align:center"> <?php echo $orders ?> </p>
                        </div>

                  </div>
               <?php pagefooter() ?>
          </div>
     </body>
 </html>
