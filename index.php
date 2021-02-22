<!DOCTYPE html>
<html lang="en">

  <title>Where&#39;s Walldo? | Package Tracking</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body,h1,h2,h3,h4,h5,h6 
        {
            font-family: "Lato", sans-serif;
        }
            .w3-bar,h1,button {
            font-family: "Montserrat", sans-serif;
        }
        form{
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <body>
        <?php
            require_once "pageformat.php";
            pagenavbar(false);
        ?>
      
        <header class="w3-container w3-red w3-center" style="padding:128px 16px">
          <h1 class="w3-margin w3-jumbo">Where Is It?</h1>
          <h1 class="w3-margin w3-medium">Find your package by entering your tracking number below</h1>

          <!-- Input tracking number form -->
          <form class="w3-container w3-card-3" style="width:40%" action="/action_page.php">
            <input class= "w3-input w3-border w3-round" name="tracking_number" type="text" placeholder = "XXX-XXX-XXX">
          </form>

          <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Find it</button>

        </header>

        <!--First Grid-->
        <div class="w3-row-padding w3-padding-64 w3-container">
          <div class="w3-content">
            <div class="w3-twothird">
              <h1>Who is Walldo?</h1>
              <h5 class="w3-padding-32">Walldo is a genuine american-made brick wall that we brought to life as a result of our R&D department. He has been our faithfull mascot since our founding. He is cheerful, energetic, and most of all LOVES ensuring the highest quality shipping and delivery experience possible.</h5>

            </div>

            <div class="w3-third w3-center">
              <img src="./images/Walldo.jpg" alt="Walldo.jpg" width="200" height="200">
            </div>
          </div>
        </div>

        <!-- Second Grid -->
        <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
          <div class="w3-content">
            <div class="w3-third w3-center">
              <img src="./images/package.jpg" alt="Walldo.jpg" width="200" height="200">
            </div>

            <div class="w3-twothird">
              <h1>Who are we?</h1>
              <h5 class="w3-padding-32">The Where&#39;s Walldo company, established in 2021, is a business of people. We may ship packages, but our goal with every shipment is to connect people from all over the world. We are dedicated to safe, secure, and reliable shipping for all of our thousands of customers.</h5>

            </div>
          </div>
        </div>

        <div class="w3-container w3-black w3-center w3-opacity w3-padding-20">
            <h1 class="w3-margin w3-xlarge">Secure / Safe / Reliable </h1>
        </div>
        <?php pagefooter() ?>
    </body>
</html>