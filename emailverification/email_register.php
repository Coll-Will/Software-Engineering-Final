<?php
include 'config.php';
include 'session.php';

if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($con,"SELECT * FROM userregistration WHERE activationcode='$code'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
  
$st=0;
$result =mysqli_query($con,"SELECT id FROM userregistration WHERE activationcode='$code' and status='$st'");
$result4=mysqli_fetch_array($result);   

if($result4>0) 
  {
$st=1;
$result1=mysqli_query($con,"UPDATE userregistration SET status='$st' WHERE activationcode='$code'");
$msg="Your account is activated"; 
}
else
{
$msg ="Your account is already active, no need to activate again";
}
}
else
{
$msg ="Wrong activation code.";
}
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
            <!--center-->
 			<div class="col-sm-6">
    		<div class="row">
      		<div class="col-xs-12">
        	<h3>PHP Email Verification Script </h3>
			<hr >
			<p><?php echo htmlentities($msg); ?></p>
   			<p> Now you can login</p>
   			<p>For login <a href="login.php">Click Here</a></p>
 			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- newone21 -->
		<ins class="adsbygoogle"
    	 style="display:inline-block;width:728px;height:90px"
    	 data-ad-client="ca-pub-8906663933481361"
    	 data-ad-slot="6355325537"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
    	  </div>
    		</div>
  	  		<hr>
        
   
  				</div><!--/center-->
            </div>
        </div>
    </body>
</html>