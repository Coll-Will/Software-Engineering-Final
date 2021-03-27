<?php
  require_once '../config.php';
  require_once '../pageformat.php';
  pagenavbar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Store</title>
    <style type="text/css">
    	.row{
    		margin-top: 10%;
    	}
    </style>
  </head>
  <body>
    <div class = "container">
      <?php
      if($query = $db->prepare("SELECT * FROM inventory"))
      {
        $result = $query->execute();
        if(!$result)
        {
          die("Error Code 0000");
        }

        echo "<div class = \"row\">";

        $result = $query->get_result();
        while($item = $result->fetch_assoc())
        {
          $itemName = $item['package_name'];
          $price = $item['cost'];
          $imgName = $item['imgName'];
          $IID = $item['IID'];
          $itemInfo = implode("|",$item);

echo <<< _END
          <div class = "col col-sm-4" style = "padding:20px; text-align:center">

          <img src = "./productImages/$imgName" class = "rounded" alt = "$imgName" width= "300" height = "250">
          <h4> $itemName $$price </h4>

          <label for = "quantity">Quantity:</label>
          <input id = "quantity"type="number" name="quantity">
          <br>

          <button type="button" value = "$itemInfo" id = "btn$IID" onclick = "addtocart(this)" class="btn btn-primary" style = "margin-top:15px">Add to Cart</button>

          </div>
_END;
        }
        echo"</div>";
      }
      else
      {
        die("Error Code 0001");
      }
      ?>
    </div>
  </body>
</html>