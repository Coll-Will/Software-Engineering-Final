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
</style>
</head>
<body>
    <br>
    <br>
    <br>
<p>TRACKING AND RECEIVING SHIPMENTS</p>
<button class="collapsible">The status of my package is "out for delivery." When will I receive it?</button>
<div class="content">
  <p>Delivery on week days can go until 9:00 P.M. If we are unable to deliver the package that shows status "out for delivery," we will attempt delivery on the next business day.</p>
</div>

<button class="collapsible">Do I have to sign for my package?</button>
<div class="content">
  <p>Please check your delivery description to see if you chose special delivery options. If it is displayed "signature required," then a signature is needed to receive your package. Otherwise, no signature will be required, and your package will be left in a safe place.</p>
</div>

<button class="collapsible">How do I cancel a delivery?</button>
<div class="content">
  <p>Please contact the sender to stop delivery before the first delivery attempt.  Only the person who sent the package can cancel the delivery before the first attempt.</p>
</div>

<button class="collapsible">My shipment shows delivered, but I can't find it. What should I do?</button>
<div class="content">
  <p>To ensure the safety of your package, we do our best to deliver it to a safe location. We recommend that you check all exterior doors where the package could have been placed,
  including the porch, back patio, garage, and any area out of potential weather hazards. If you're still unable to locate the package, contact the sender to start a claim.</p>
</div>

<button class="collapsible">The address I provided for delivery is incomplete or wrong. What can I do?</button>
<div class="content">
  <p>Please contact the sender to note the error in the address. The sender should correct the address and pass the updated informnation to us.</p>
</div>

<button class="collapsible">How do I cancel a delivery?</button>
<div class="content">
  <p>Please contact the sender to stop delivery before the first delivery attempt.  Only the person who sent the package can cancel the delivery before the first attempt.</p>
</div>
<br>
<p>CREATING AND SENDING SHIPMENTS</p>

<button class="collapsible">How much will my shipment cost?</button>
<div class="content">
  <p>Shipping cost depends on origin, destination, service, package weight, and other considerations.</p>
</div>

<button class="collapsible">How should I pack my shipment?</button>
<div class="content">
  <p>It is important to package the item safely in your box so no damage will be caused during the shipment. The use of bubble wrap, or packing paper are highly recommended to secure the item. You can buy these items by logging into our website and purchasing them from the shipping tools page.</p>
</div>

<button class="collapsible">How do I get shipping labels, or other shipping supplies?</button>
<div class="content">
  <p>You can print your labels and receipts after submitting your shipment information, or you can reprint from your shipping history.</p>
</div>
<br>
<p>MANAGING YOUR PROFILE AND BILLING</p>

<button class="collapsible">I've forgotten my username and password, or they no longer work. What should I do?</button>
<div class="content">
  <p>Select "I forgot my User ID or Password at the bottom of any login page. This will take you to the "Reset or recover your login" screen. Enter your user ID and registered Email Address. You will receive an email to help you recover your login information.</p>
</div>

<button class="collapsible">How do I view my invoices and bills?</button>
<div class="content">
  <p>You can see your previous statements by navigating to the "My Profile" page and selecting View and Pay Bill.</p>
</div>
<br>
<p>TECHNICAL SUPPORT</p>

<button class="collapsible">Contacts for technical support</button>
<div class="content">
  <p>If none of these answered your questions, please contact contactwhereswalldo@gmail.com for further assistance.</p>
</div>
<?php
  pagefooter();
?>

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

</body>
</html>
