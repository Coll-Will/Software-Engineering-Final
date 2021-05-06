<?php
    require_once "../pageformat.php";
    if(!isset($_SESSION['sessionID']))
    {
        die("UNAUTHORIZED ACCESS DENIED");
    }
    pagenavbar();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {
  font-family: Arial;
  margin-top: 50px;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 20 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<title>Payment Information</title>
</head>
<body>

<!-- User form to enter checkout information-->
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="./placeOrder.php" method = "post">
      
      <!-- billing information -->
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="f-name"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="f-name" name="f-name" placeholder="--" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="--" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="--" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="--"required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="number" id="zip" name="zip" placeholder="--" required>
              </div>
            </div>
          </div>

          <!--payment information -->
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="--">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="MM">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="YYYY">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="cvv" placeholder="--">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" id="checkbox" name="sameadr" onclick="showshipform()"> Shipping address same than billing
        </label>

        <div class="row" id="shipping">
          <div class="col-50">
            <h3>Shipping Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="shipadr" name="shipaddress" placeholder="--">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="shipcity" name="shipcity" placeholder="--">

            <div class="row">
              <div class="col-50">
                <label for="shipstate">State</label>
                <input type="text" id="state" name="shipstate" placeholder="--">
              </div>
              <div class="col-50">
                <label for="shipzip">Zip</label>
                <input type="number" id="zip" name="shipzip" placeholder="--">
              </div>
            </div>
          </div>
        </div>
        <?php
            if(isset($_GET["msg"]))
            {
                $msg = $_GET["msg"];
                echo "<h4 class = \"text-danger\" style =\"text-align:center;\">$msg</h4>";
            }
        ?>
        <input type="submit" name = 'submit' value="Place Order" class="btn w3-red">
        <input type = "hidden" id = "order" name = "order" value = "">
      </form>
    </div>
  </div>
 </div>

<script type ="text/javascript" src = "./javascript/jsfunctions.js"></script>
<script type = "text/javascript">getOrder();</script>      


<!-- script to show shipping address form if check box not clicked-->
<script>
function showshipform() {
  var x = document.getElementById("shipping");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>


<?php pagefooter() ?>
</body>
</html>