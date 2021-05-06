<?php
  require_once '../config.php';
  require_once '../pageformat.php';
  pagenavbar();
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!DOCTYPE html><html class=''>
<head>

<link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600);

a.follow {
  position: absolute;
  left: 0;
  top: 0;
  padding: 10px;
  color: #fff !important;
  z-index: 9999;
  font-family: 'Helvetica';
  font-size: 11px;
  text-transform: uppercase;
  text-decoration: none;
  opacity: .5;
}
a.follow svg {
  vertical-align: middle;
  margin-right: 5px;
}
a.follow span {
  display: none;
}
a.follow:hover {
  opacity: 1;
}
a.follow:hover span {
  display: inline;
}

body {
  font-family: 'Open Sans', arial;
  margin-top: 10%;
}

html, body {
  min-height: 100%;
  height: 100%;
  background: #f4f4f4;
}

.demo-container {
  display: table;
  width: 100%;
  height: 100%;
}

.demo-container-inner {
  display: table-cell;
  vertical-align: middle;
}

.contents {
  width: 80%;
  margin: auto;
}

.s10 {
  height: 10px;
}

h1 {
  margin-bottom: 40px;
  font-weight: 300;
  color: #999;
}

.flipable {
  -webkit-perspective: 80;
          perspective: 80;
  position: relative;
  display: inline-block;
}
.flipable .flipable-group {
  -webkit-transition: 0.3s;
  transition: 0.3s;
  -webkit-transform-origin: center;
          transform-origin: center;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
.flipable .flipable-group > *:nth-child(1), .flipable .flipable-group > *:nth-child(2) {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  z-index: 2;
  top: 0;
  left: 0;
}
.flipable .flipable-group > *:nth-child(1) {
  position: relative;
  z-index: 1;
}
.flipable .flipable-group > *:nth-child(2) {
  -webkit-transform: rotatex(180deg);
          transform: rotatex(180deg);
  position: absolute;
}
.flipable.flipped .flipable-group {
  -webkit-transform: rotatex(180deg);
          transform: rotatex(180deg);
}
.flipable.flipped .flipable-group > *:nth-child(1) {
  pointer-events: none;
}
.flipable.flipped .flipable-group > *:nth-child(2) {
  z-index: 10;
}

.btn:focus, .btn:active {
  outline: 0 !important;
  box-shadow: none !important;
}

.card {
  border-color: #ccc;
}
.card .card-title {
  color: #fc5830;
}

.cart-price {
  font-size: 1.5rem;
}

.add-to-cart span, .remove-from-cart span {
  pointer-events: none;
}

.add-to-cart {
  background-color: #fc5830;
  border-color: #fc5830;
}
.add-to-cart:hover, .add-to-cart:active, .add-to-cart:focus, .add-to-cart:active:focus {
  background-color: #fc4417;
  border-color: #fc4417;
}

.remove-from-cart {
  background-color: #0da58e;
  border-color: #0da58e;
}
.remove-from-cart:hover, .remove-from-cart:active, .remove-from-cart:focus, .remove-from-cart:active:focus {
  background-color: #ed1c24;
  border-color: #ed1c24;
}

.overlay {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: black;
  z-index: 989;
  opacity: 0;
  -webkit-transition: opacity 0.2s;
  transition: opacity 0.2s;
  pointer-events: none;
}

.card-wrapper {
  opacity: 0;
  -webkit-transition: opacity .1s;
  transition: opacity .1s;
}

.jp-card-logo.jp-card-elo .o {
  position: relative;
  display: inline-block;
  width: 12px;
  height: 12px;
  right: 0;
  top: 7px;
  border-radius: 100%;
  background-image: -webkit-linear-gradient(yellow 50%, red 50%);
  background-image: linear-gradient(yellow 50%, red 50%);
  -webkit-transform: rotate(40deg);
          transform: rotate(40deg);
  text-indent: -9999px;
}

.jp-card-logo.jp-card-elo .o:before {
  content: "";
  position: absolute;
  width: 49%;
  height: 49%;
  background: black;
  border-radius: 100%;
  text-indent: -99999px;
  top: 25%;
  left: 25%;
}

.jp-card.jp-card-elo.jp-card-identified .jp-card-front:before,
.jp-card.jp-card-elo.jp-card-identified .jp-card-back:before {
  background-color: #6F6969;
}

.jp-card .jp-card-front,
.jp-card .jp-card-back {
  border-radius: 10px;
  background: rgba(0, 0, 0, 0.3) !important;
  border: 2px solid white !important;
}

.jp-card .jp-card-front:before,
.jp-card .jp-card-back:before {
  border-radius: 10px;
}

.jp-card .jp-card-front .jp-card-display,
.jp-card .jp-card-back .jp-card-display {
  color: white;
  font-weight: normal;
  opacity: 1;
}

.jp-card .jp-card-front .jp-card-shiny,
.jp-card .jp-card-back .jp-card-shiny {
  background: rgba(255, 255, 255, 0.5) !important;
}

.jp-card .jp-card-front .jp-card-shiny:before,
.jp-card .jp-card-back .jp-card-shiny:before {
  background: rgba(255, 255, 255, 0.5) !important;
}

.jp-card .jp-card-back .jp-card-bar {
  background-color: #444;
  background-image: -webkit-linear-gradient(#444, #333);
  background-image: linear-gradient(#444, #333);
}

.jp-card .jp-card-back:after {
  background-color: #FFF;
  background-image: -webkit-linear-gradient(#FFF, #FFF);
  background-image: linear-gradient(#FFF, #FFF);
}

.jp-card .jp-card-back .jp-card-shiny:after {
  content: "This card has been issued by Jesse Pollak and is licensed for anyone to use anywhere for free.AIt comes with no warranty.A For support issues, please visit: github.com/jessepollak/card.";
  position: absolute;
  left: 120%;
  top: 5%;
  color: white;
  font-size: 7px;
  width: 230px;
  opacity: .5;
}

.jp-card.jp-card-identified {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

.jp-card.jp-card-identified .jp-card-front,
.jp-card.jp-card-identified .jp-card-back {
  background-color: rgba(0, 0, 0, 0.5);
}

.jp-card.jp-card-identified .jp-card-front .jp-card-logo,
.jp-card.jp-card-identified .jp-card-back .jp-card-logo {
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
}

.jp-card.jp-card-identified .jp-card-front:before,
.jp-card.jp-card-identified .jp-card-back:before {
  background-image: none !important;
}
input
{
    width:50px;
    align-content: left;
}
</style></head><body>

<div class="demo-container">
  <div class="demo-container-inner">
    <div class="container">
        <?php
        if(!isset($_SESSION['sessionID']))
        {
          echo "<h3 class =\"text-danger\" style = \"text-align:center\">Please login to add items to the cart</h3>";
        }
        echo "<h1>Awesome shop</h1>";

        if($query = $db->prepare("SELECT * FROM inventory"))
        {
            $result = $query->execute();
            if(!$result)
            {
                die("Error Code 0000");
            }

            $result = $query->get_result();
            echo "<div class=\"row\">";
            while($item = $result->fetch_assoc())
            {
                $itemName = $item['package_name'];
                $price = $item['cost'];
                $imgName = $item['imgName'];
                $IID = $item['IID'];
                $stock = $item['stock'];
                $description = $item['description'];
                $itemInfo = implode("|",$item);
echo <<< _END
            <div class="col-xs-6 col-md-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">$itemName</h4>
                            <img src = "./productImages/$imgName" class = "center-fit" alt = "$imgName" height = "100" width = "100">
                            <p class="card-text">$description</p>
                    </div>
                    <div class="card-block">
_END;
                if(isset($_SESSION['sessionID']))
                {
                  if($stock > 0)
                  {
echo <<< _END
                        <input id = "$IID" type="number" name="quantity" value="1" min="1">
                        <div class="pull-xs-right flipable">
                            <div class="flipable-group">
                                <button class="btn btn-primary add-to-cart" onclick="addtocart(this)" value="$itemInfo" id="btn$IID"><span class="fa fa-cart-plus"></span></button>
                                <button class="btn btn-primary remove-from-cart" onclick="removeFromCart(this)" value="$itemInfo"><span class="fa fa-check"></span></button>
                            </div>
                        </div>
_END;
                  }
                  else
                  {
                    echo "<p class=\"card-text\">Out of Stock</p>";
                  }
                }

                echo "<p class=\"card-text cart-price\">$$price</p></div></div></div>";
            }
            echo "</div>";
        }
        else
        {
            die("Error Code 0001");
        }
    ?>
    </div>
  </div>
</div>
<script type = "text/javascript" src ="./javascript/jsfunctions.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.1.1/js/tether.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/175382/jquery.card.js'></script>
<script>
$(document).ready(function() {
  $('.add-to-cart, .remove-from-cart').on('click', function() {
    $(this).parents('.flipable').toggleClass('flipped product-added');
    if ($('.product-added').length > 0){
      $('body').addClass('enable-checkout');
    }else{
      $('body').removeClass('enable-checkout');
    }
  });
})
</script>
</body>
</html>