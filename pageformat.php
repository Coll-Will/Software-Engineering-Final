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
</style>
<?php
	function pagenavbar($logged)
	{
		if(!$logged){
			$loginIcon = "<div class = \"login-container\">
			    			<a href=\"https://whereswalldo.000webhostapp.com/userlogin/login.php\" class = \"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\">Signup / Login</a>
			    		 </div>";
		}
		else{
			$loginIcon ="<div class = \"login-container\">
			    			<a href=\"http://whereswalldo.000webhostapp.com/index.php\" class=\"w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white\">Logout</a>
			    		</div>";
		}

echo <<< _END
			<div class="w3-top">
			  	<div class="w3-bar w3-red w3-card w3-left-align w3-large">
				    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
				    <a class="w3-bar-item w3-text w3-padding-large w3-red" style = "text-decoration: none;">Where&#39;s Walldo?</a>
				    <a href="http://whereswalldo.000webhostapp.com/index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
				    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tracking</a>
				    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Locations</a>
				    <a href="http://whereswalldo.000webhostapp.com/support/help-page.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Support</a>
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
				<a href="#" class="w3-button w3-padding-large w3-hover-white">About Where&#39;s Walldo</a>
		    	<a href="#" class="w3-button w3-padding-large w3-hover-white">Contact Us</a>
		    	<a href="#" class="w3-button w3-padding-large w3-hover-white">Our Terms of Service</a>
		    	<a href="#" class="w3-button w3-padding-large w3-hover-white">Careers</a>
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