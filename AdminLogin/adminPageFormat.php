<style>
a:hover{
    background-color:#D3D3D3;
    color:white;
}
a:active{
    background-color:#808080;
    color:white;
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
function pageheader()
{	
	echo "<div class=\"row\">";

	    echo "<div class=\"col-sm-7\">";
		echo "<nav class=\"navbar navbar-default\">";
			echo "<a class=\"nav-link\" href=\"./adminpage.php\">Stock</a>";
			echo "<a class=\"nav-link\" href=\"./updateStock.php\">Update Stock</a>";
			echo "<a class=\"nav-link\" href=\"./dailyRevenue.php\">Daily Revenue</a>";
			echo "<a class=\"nav-link\" href=\"./contactusadmindate.php\">Customer Comments</a>";
		
		echo "</div>";
		echo "</nav>";
	echo "</div>";

	echo "<hr>";
}

?>