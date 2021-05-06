
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Customer Comments Viewer</title>
</head>

<?php
  include_once "adminPageFormat.php";
  require_once "../pageformat.php";
    pagenavbar();
    echo "<div style = \"margin-top:50px\" class = \"container\">";
  pageheader();
?>

    <style>
        .pad{
            margin-left: 10%;
            margin-right:10%;
            
        }
        table {
          border-collapse: separate;
          border-spacing: 70px 0;
        }
        
        td {
          padding: 10px 0;
          text-align:center;
        }
    </style>
  </head>
  <body>
    <div class="container">

<?php

      require_once('connection.php');
      $conn=connectDB();
      if(!$conn){
      echo "connecting failed, try again later!";
      die("failed on DB connection");
     }
     $d=$_GET['date'];
      $date = date("Y-m-d", strtotime($d));
      $query="SELECT name, email, phone, msg FROM contactus WHERE date (date)=\"$date\"";
     $result=$conn->query($query);
     if(!$result)
      {
         echo "query is not correct!";
         die("fatal error");
      }
      $rows=$result->num_rows;

      echo<<<_END

        <div class="w3-container w3-red pad">
         <table>
         <thead>
         <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Comment</th>
         </tr>
         </thead>  
_END;

      for($i=0; $i<$rows; $i++)
      {
         $count = $i+1;
         $row=$result->fetch_array(MYSQLI_ASSOC);
         $name=$row['name'];
         $email=$row['email'];
         $phone=$row['phone'];
         $msg=$row['msg'];
         echo "<tr><td>$name</td><td>$email</td><td>$phone</td><td>$msg</td></tr>";
      }

      echo "</table>";
      echo "</div>";
?>

  </div>
 <div style = "margin-top:185px">
  <?php
  pagefooter();
  ?>
</div>
  </body>
</html>