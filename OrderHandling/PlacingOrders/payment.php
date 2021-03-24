<?php
    require_once "../pageformat.php";
    if(!isset($_SESSION['sessionID']))
    {
        die("UNAUTHORIZED ACCESS DENIED");
    }
    pagenavbar();
?>
<!-- Page template used: https://codepen.io/theresa-e/pen/BOBQxR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Information</title>
    <style><?php include_once"pymt.css" ?></style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
        <?php
            if(isset($_GET["msg"]))
            {
                $msg = $_GET["msg"];
                echo "<h4 class = \"text-danger\" style =\"text-align:center;\">$msg</h4>";
            }
        ?>
            <form action="./placeOrder.php" method = "post">
                <h1>
                    <i class="fas fa-shipping-fast"></i>
                    Shipping Details
                </h1>
                <div class="name">
                    <div>
                        <label for="f-name">First</label>
                        <input type="text" name="f-name" required>
                    </div>
                    <div>
                        <label for="l-name">Last</label>
                        <input type="text" name="l-name" required>
                    </div>
                </div>
                <div class="street">
                    <label for="name">Street</label>
                    <input type="text" name="address" required>
                </div>
                <div class="address-info">
                    <div>
                        <label for="city">City</label>
                        <input type="text" name="city" required>
                    </div>
                    <div>
                        <label for="state">State</label>
                        <input type="text" name="state" required>
                    </div>
                    <div>
                        <label for="zip">Zip</label>
                        <input type="number" name="zip" required>
                    </div>
                </div>
                <h1>
                    <i class="far fa-credit-card"></i> Payment Information
                </h1>
                <div class="cc-num">
                    <label for="card-num">Credit Card No.</label>
                    <input type="number" name="card-num" required>
                </div>
                <div class="cc-info">
                    <div>
                        <label for="expire">Exp</label>
                        <input type="text" name="expire" required>
                    </div>
                    <div>
                        <label for="security">CCV</label>
                        <input type="number" name="security" required>
                    </div>
                </div>
                <div class="btns">
                    <input type="submit" name="submit" class="btn btn-primary" value="Place Order">
                    <input type="button" value="Go Back" class="btn btn-primary" id="backBtn" onclick="document.location.href='./shoppingcart.php'">
                </div>
            </form>
        </div>
    </div>
</body>
</html>