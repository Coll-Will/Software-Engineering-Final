/**
 * This file contains all the the functions used to process items being 
 * added from the product store into the shopping cart
 */

/**
 * Takes the input from the store page and adds it to the localstorage
 * @param  {button} id The Add to Cart button that has all of the item info stored as its value
 */
function addtocart(id) 
{

  var item=id.value;
  var itemInfo=item.split("|");
  if(!(document.getElementById(itemInfo[0]).value == "") && !(document.getElementById(itemInfo[0]).value < 1))
  {
    addtoStorage(itemInfo);
    alert(document.getElementById(itemInfo[0]).value + " " + itemInfo[1]+ " (s) added to your cart!");
  }
  else
  {
    alert("Not a valid amount!");
  }
}

/**
 * Gets the item information and the adds it to the localstorage for our cart. It also adds in the quantity
 * @param  {assoc array} itemInfo An array containing all the different attributes of an item
 */
function addtoStorage(itemInfo)
{
	var cart={};
	var itemid=itemInfo[0];
  var quantity = document.getElementById(itemInfo[0]).value;
	if((localStorage.getItem("cart")!=null))
  {
    cart=JSON.parse(localStorage.getItem("cart"));
	}

	if(cart[itemid]!=null)
  {
    //the quantity is stored as a string so I parse the old quantity and the
    //new value I want to add into an int, and then add them. 
    var x = parseInt(quantity);
    var y = parseInt(cart[itemid][4]);
    var z = x + y;
	  cart[itemid][4] = z.toString();
    itemInfo[4] = cart[itemid][4];
  }
  else
  {
    itemInfo[4] = quantity;
    cart[itemid]=itemInfo;   
  }
  localStorage.setItem("cart",JSON.stringify(cart));
}

/**
 * clears the localstorage, removing all items from the cart
 */
function clearcartHTML()
{
	localStorage.clear();
	document.getElementById("info").innerHTML="";
}

/**
 * Displays all the items stored in the local storage onto the cart page
 */
function displayCart()
{
  var out = '';
  var cartStr = localStorage.getItem("cart");
  if(cartStr != null)
  {
    var cart = JSON.parse(cartStr);
    for(item in cart)
    {
      img = cart[item][3];
      name = cart[item][1];
      quantity = cart[item][4];
      price = cart[item][2];
      price = (price*quantity).toFixed(2);
      out += `<div>
                <img src = \"../OrderHandling/productImages/${img}\" style = "width:200px; height:200px;">
                <h4>${name}</h4>
                <h4>Price: ${price}</h4>
                <h4>Quantity: ${quantity}</h4>
                -------------------------------
              </div>`;
    }
  }
  document.getElementById("info").innerHTML = out;
}

/**
 * Puts all of the information the needs to be a added to the database and outs it into the order html
 */
function getOrderForServer()
{
  var out = '';
  var order = {};
  var cartStr = localStorage.getItem("cart");
  if(cartStr != null)
  {
    var cart = JSON.parse(cartStr);
    for(item in cart)
    {
      var quantity = cart[item][4];
      var itemid = cart[item][0];
      order[itemid] = quantity;
    }
    document.getElementById("order").value = JSON.stringify(order);
  }
}

/**
 * This function ensures that a user cannot procceed to the paymant/checkout page without having
 * atleast one item in the cart
 */
function checkOut()
{
  var cart = localStorage.getItem("cart");
  var msg = document.getElementById('msg');
  if(cart != null)
  {
    document.location.href='./Payment/payment.php';
  }
  else
  {
    msg.innerHTML = "Your Cart is Empty";
    msg.className = "text-danger";
  }
}

function redirect(location, command)
{
  window.location.replace(location);
}