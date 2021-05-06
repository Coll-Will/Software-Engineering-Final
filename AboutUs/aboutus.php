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

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
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
    <h2>About Us</h2>
  <p>We are a five person team, dedicated to making a website capable of shipping packages for our Software Engineering Class. </p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Adam Volz</h2>
        <p class="title">Programmer</p>
        <p>Senior Computer Science Major at Georgia College... "honestly, idk how I made it this far."</p>
        <p>adam.volz@bobcats.gcsu.edu</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Collin Williams</h2>
        <p class="title">Programmer</p>
        <p>Senior Computer Science Major at Georgia College... "carnival ride enthusiast and enjoyer."</p>
        <p>collin.williams@bobcats.gcsu.edu</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Miqaa'iyl Fahiym</h2>
        <p class="title">Programmer</p>
        <p>Senior Computer Science Major at Georgia College... "soon-to-be college escapee."</p>
        <p>miqaaiyl.fahiym@bobcats.gcsu.edu</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Morgan Lumpkin</h2>
        <p class="title">Programmer</p>
        <p>Senior Computer Science Major at Georgia College... "aspiring witch."</p>
        <p>morgan.lumpkin@bobcats.gcsu.edu</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Niko Moran</h2>
        <p class="title">Programmer</p>
        <p>Senior Computer Science Major at Georgia College... "send help immediately."</p>
        <p>sharon.moran@bobcats.gcsu.edu</p>
      </div>
    </div>
  </div>
</div>
<?php pagefooter();?>
</body>
</html>
