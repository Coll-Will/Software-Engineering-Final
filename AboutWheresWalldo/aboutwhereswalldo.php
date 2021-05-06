<?php
  require_once "../pageformat.php";
  pagenavbar();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link for color matching red to rest of website -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>About Where's Walldo</title>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 600px) {
  .prev, .next,.text {font-size: 11px}
  .column {width: 100%;}
}

/*grid styling*/
/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style for 3D vertical flip boxes */
.flip-box {
  background-color: transparent;
  width: 100%;
  height: 280px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateX(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-box-front {
  color: black;
}

.flip-box-back {
  background-color: white;
  color: black;
  transform: rotateX(180deg);
}

.center {
  display: flex;
  justify-content: center;
  align-items: center;
}


</style>
</head>
<body>

<!-- slide show -->
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="./img/img1.jpg" style="width:100%">
</div>

<!-- ERROR:IMG DISPLAYS ON LOCAL HOST BUT NOT WEBHOST(NEED FIX) 
<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="./img/img2.jpg" style="width:100%">
</div>
-->

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="./img/img3.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<!-- Divider -->
<div class="w3-container w3-black w3-center w3-opacity w3-padding-20">
  <h1 class="w3-margin w3-xlarge">What Exactly Is Where's Walldo?</h1>
</div>

<!-- column1 for flip cards -->
<div class="row">
  <div class="column w3-red" >
    <!-- 3D VERTICAL FLIP BOX -->
    <div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front w3-red center">
          <h2>Software Engineering Senior Project</h2>
        </div>
        <div class="flip-box-back center">
          <p>Where's Walldo is the product of a collective effort from 5 computer science majors at GCSU. It is not a real service but rather an opportunity to implement knowledge gained through years of preperation as a real world application. </p>
        </div>
      </div>
    </div>
  </div>
  <!-- column2 for flip cards -->
  <div class="column w3-red">
    <!-- 3D VERTICAL FLIP BOX -->
    <div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front w3-red center">
          <h2>Front & Back End Development Languages</h2>
        </div>
        <div class="flip-box-back center">
            <ul>
              <li>HTML</li>
              <li>PHP</li>
              <li>Javascript</li>
              <li>CSS</li>
              <li>SQL</li>
            </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- column3 for flip cards -->
  <div class="column w3-red">
    <!-- 3D VERTICAL FLIP BOX -->
    <div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front w3-red center">
          <h2>Special Thanks To</h2>
        </div>
        <div class="flip-box-back center">
          <p>Professor Frank Richardson at Georgia College and State Unniversity for instructing this course in which we are able to work on our own independent projects as a team and be exposed to how real world projects are completed from conception to completion.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script for slide show -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php pagefooter();?>
</body>
</html> 