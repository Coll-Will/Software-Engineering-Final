
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<?php
  require_once "../pageformat.php";
    pagenavbar();
?>

    <title>Customer Comments Viewer</title>
    <style>
        
        .center {
          line-height: 200px;
          height: 200px;
          border: 3px solid green;
          text-align: center;
        }

        .center p {
          line-height: 1.5;
          display: inline-block;
          vertical-align: middle;
        }
    </style>
  </head>
  <body>
    <div class="container">

<?php

      require_once('../connection.php');
      $conn=connectDB();
      if(!$conn){
      echo "connecting failed, try again later!";
      die("failed on DB connection");
     }
     //$d=$_GET['date'];
     // $date = date("Y-m-d", strtotime($d));
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $msg = $_POST["msg"];
      $query="INSERT INTO `contactus` (`name`, `email`, `phone`, `msg`, `date`) VALUES ($name, $email, $phone, $msg, date)";
       $result=$conn->query($query);
    if(!$result)
    {
      echo "query is not correct!";
      die("fatal error");
    }
?>

<div class="center">
  <p>Thank you for your comments, our team looks forward to accessing your input.</p>
</div>
     

  </div>
 <div style = "margin-top:185px">
  <?php
  pagefooter();
  ?>
</div>
  </body>
</html>