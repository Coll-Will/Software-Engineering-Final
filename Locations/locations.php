<?php
  require_once "../environment/pageformat.php";
  pagenavbar();
  # --- FILL FIELDS --- #
  function getWarehouses(){
    require_once "../environment/config.php";
    $query = "SELECT state, street, city, zip FROM warehouses";
    if($result = mysqli_query($db, $query)){
        if(mysqli_num_rows($result) > 0){
          echo "<table style='display:inline-block'>";
              echo "<tr>";
                  #echo "<th> street </th>";
                  #echo "<th> city </th>";
                  #echo "<th> state </th>";
                  #echo "<th> zip </th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td style='font-size:18; font-weight:bold; padding-top:8px'>" . $row['state'] . "</td>";
                  echo "<td style='font-size:18; padding-left:16px; padding-top:8px'>" . $row['street'] . "</td>";
                  echo "<td style='font-size:18; padding-left:16px; padding-top:8px'>" . $row['city'] . "</td>";
                  echo "<td style='font-size:18; padding-left:16px; padding-top:8px'>" . $row['zip'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
          mysqli_free_result($result);
        }
        else echo "No records found.";
      } else echo "Something went wrong!";
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
             <h2 style = "text-align:center; padding-bottom: 30px; padding-top: 15px;">Our Locations</h2>
             <div class="row">
                 <div class="form-group" style="width: 100vw">
                     <p style="text-align: center"> <?php getWarehouses() ?>  </p>
                 </div>
             </div>
         <?php pagefooter() ?>
     </body>
 </html>
