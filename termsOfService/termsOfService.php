<?php
	require_once "../pageformat.php";
	pagenavbar();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
<div class="about-section">
<h2>Terms Of Service</h2>
<br>
  <p>We are not responsible for any unwanted information stored on the website. This is simply for a Software Engineering Project, and no packages, or services will actually be provided.</p>
</div>

<?php pagefooter();?>
</body>
</html>
