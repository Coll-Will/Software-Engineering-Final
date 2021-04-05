<?php
  require_once '../pageformat.php';
  pagenavbar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Cart</title>
    <style type="text/css">

    </style>
  </head>
  <body>
    <h1 calss = "mt-5">Shopping Cart</h1>
    <div class = "mt-5" id = "info"></div>

    <button type = "submit" class = "btn btn-primary" onclick = "checkOut()">Check Out</a>

    <button type = "button" class = "btn btn-primary" onclick = "clearcartHTML()" style = "margin-left: 20px">Clear Cart</button>

    <p id="msg"></p>

    <script type = "text/javascript" src ="./javascript/jsfunctions.js"></script>
    <script type = "text/javascript">displayCart();</script>
  </body>
</html>