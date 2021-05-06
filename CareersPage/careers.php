<?php
	require_once "../pageformat.php";
	pagenavbar();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.title{
 padding: 18px;
}
</style>
</head>
<body>
<br>
<br>
<br>
<div class="title">
<h2>Positions Available:</h2>
</div>
<br>
<br>
<button class="collapsible">Manager</button>
<div class="content">
  <p>We are looking for an experienced and skilled manager that is familiar with programming skills and concepts. Preferably, one who already has experience managing programmers.</p>
  <br>
  <p>Requirements:</p>
  <p>* At least two years experience in a manager position</p>
  <p>* Organizational Skills</p>
  <p>* Teamworking Skills</p>
  <p>* Verbal Communication Skills</p>
  <p>* Showing Initiative</p>
  <p>* At least two years experience in a manager position</p>
  <br>
  <p>What we can offer:</p>
  <p>* Healthcare benefits</p>
  <p>* Yearly Salary + Potential Bonus</p>
  <p>* Networking</p>
  <p>* Fun Working Environment</p>
</div>
<br>
<br>
<button class="collapsible">Software Tester</button>
<div class="content">
  <p>We are looking for an experienced and skilled software tester that can test complex applications and participate in assurance processes. All systems, processes, and sercives need to be deeply tested to assure their functionality is correct.</p>
  <br>
  <p>Requirements:</p>
  <p>* 2+ years of experience as a software tester</p>
  <p>* BS degree</p>
  <p>* Knowledge of SQL and database fundamentals</p>
  <p>* Ability to communicate with and collaborate across the development team</p>
  <p>* Experience in web development</p>
  <br>
  <p>What we can offer:</p>
  <p>* Healthcare benefits</p>
  <p>* Yearly Salary + Potential Bonus</p>
  <p>* Networking</p>
  <p>* Fun Working Environment</p>
</div>
<br>
<br>
<button class="collapsible">Software Engineer</button>
<div class="content">
  <p>We are looking for an experienced and skilled software tester that can test complex applications and participate in assurance processes. All systems, processes, and sercives need to be deeply tested to assure their functionality is correct.</p>
  <br>
  <p>Requirements:</p>
  <p>* 2+ years of experience as a software engineer</p>
  <p>* BS degree</p>
  <p>* Strong desire to learn code</p>
  <p>* A natural problem solver</p>
  <p>* Willing to relocate</p>
  <br>
  <p>What we can offer:</p>
  <p>* Healthcare benefits</p>
  <p>* Competitive Salary + Potential Bonus</p>
  <p>* Networking</p>
  <p>* Fun Working Environment</p>
  <p>* 401k</p>
</div>
<br>
<br>
<button class="collapsible">Front End Developer</button>
<div class="content">
  <p>We are looking for an experienced and skilled software tester that can test complex applications and participate in assurance processes. All systems, processes, and sercives need to be deeply tested to assure their functionality is correct.</p>
  <br>
  <p>Requirements:</p>
  <p>* 2+ years of experience as a software engineer</p>
  <p>* BS degree</p>
  <p>* Authorized to work in the US</p>
  <p>* Strong desire to learn code</p>
  <p>* A natural problem solver</p>
  <br>
  <p>What we can offer:</p>
  <p>* Healthcare benefits</p>
  <p>* Competitive Salary + Potential Bonus</p>
  <p>* Networking</p>
  <p>* Fun Working Environment</p>
  <p>* 401k</p>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<?php pagefooter();?>
</body>
</html>
