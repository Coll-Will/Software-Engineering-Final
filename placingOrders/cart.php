<?php
  require_once '../pageformat.php';
  pagenavbar();
?>
<!-- Above: Loads in the navigation bar for all navigation links 
Below: Page uses the displayCart() functions to pull a JSON string from localstorage and then prints those items in
a table
Each item is able to be individually removed, subtotal, tax, and total price are included at the bottom along with a button that continues to checkout-->
<!DOCTYPE html>
<html lang="en">
  <head>
  	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Cart</title>
<div class="container" style = "margin-top: 150px;">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody id = "info">
                    
                </tbody>
            </table>
        </div>
    </div>
    <p id="msg"></p>
</div>
<script type = "text/javascript" src ="./javascript/jsfunctions.js"></script>
<script type = "text/javascript">displayCart();</script>
</html>