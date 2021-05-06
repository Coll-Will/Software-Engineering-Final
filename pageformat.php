<?php
	session_start();
?>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="icon" href="../images/walldo_icon.png" sizes = "32x32" type = "image/png">

<style>
	h1{
		text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
	}
	.login-container {
		float: right;
		margin-right: 16px;
		color: white;
		font-size: 17px;
		border: none;
		cursor: pointer;
	}
	.website{
		font-family:Montserrat; 
		font-size: 200%; 
		text-align: center;
		margin-left: auto;
		margin-right: auto;
		color:white;
	}
	#footer {
        position:fixed;
        bottom:0;
    }
</style>
<?php
	function pagenavbar()
	{
		if(isset($_SESSION['sessionID']))
		{
			$loginIcon ="<div class = \"login-container\">
							<a href = \"http://localhost/DemoVersion/placingOrders/cart.php\" class=\"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\"><img src=\"http://localhost/DemoVersion/images/cart.png\" alt=\"cart.png\" width=\"25px\" height=\"25px\"></img></a>
			                <a href=\"http://localhost/DemoVersion/myaccount/myaccount.php\" class=\"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\"><img src = \"http://localhost/DemoVersion/images/account.png\" width = \"25px\" height = \"25px\"></img></a>
			    			<a href=\"http://localhost/DemoVersion/userlogin/logout.php\" class=\"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\">Logout</a>
			    		</div>";
		}
		else{
			$loginIcon = "<div class = \"login-container\">
			    			<a href=\"http://localhost/DemoVersion/userlogin/login.php\" class = \"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\">Signup / Login</a>
			    		 </div>";
		}

echo <<< _END
			<div class="w3-top">
			  	<div class="w3-bar w3-red w3-card w3-left-align w3-large">
				    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

				    <a href = "http://localhost/DemoVersion/index.php" class="w3-bar-item w3-text w3-padding-large w3-red" style = "text-decoration: none;">Where&#39;s Walldo?</a>

				    <a href="http://localhost/DemoVersion/placingOrders/productStore.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Store</a>

				    <a href="http://localhost/DemoVersion/locations/locations.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Locations</a>

				    <a href="http://localhost/DemoVersion/support/help-page.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Support</a>

					$loginIcon

			  	</div>
			</div>
_END;
	}

	function pagefooter()
	{
echo <<< _END
		<footer class="w3-container w3-padding-64 w3-center w3-opacity" style = "inline"> 
			<div style = "font-family:Montserrat;">
				<a href="http://localhost/DemoVersion/aboutwhereswalldo/aboutwhereswalldo.php" class="w3-button w3-padding-large w3-hover-white">About Where&#39;s Walldo</a>
				<a href="http://localhost/DemoVersion/AboutUs/aboutus.php" class="w3-button w3-padding-large w3-hover-white">About Our Team</a>
		    	<a href="http://localhost/DemoVersion/contactForm/fcf.form.php" class="w3-button w3-padding-large w3-hover-white">Contact Us</a>
		    	<a href="http://localhost/DemoVersion/termsOfService/termsOfService.php" class="w3-button w3-padding-large w3-hover-white">Our Terms of Service</a>
		    	<a href="http://localhost/DemoVersion/CareersPage/careers.php" class="w3-button w3-padding-large w3-hover-white">Careers</a>
		    	<a href="http://localhost/DemoVersion/AdminLogin/index.php" class="w3-button w3-padding-large w3-hover-white">Admin Login</a>
			</div>
			<div class="w3-xlarge w3-padding-32">
			  	<i class="fa fa-facebook-official w3-hover-opacity"></i>
			  	<i class="fa fa-instagram w3-hover-opacity"></i>
				<i class="fa fa-linkedin w3-hover-opacity"></i>
			</div>
		</footer>
_END;
	}
?>
