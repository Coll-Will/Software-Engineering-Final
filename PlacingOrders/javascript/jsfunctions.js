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
  addtoStorage(itemInfo);
  alert(document.getElementById(itemInfo[0]).value + " " + itemInfo[1]+ " (s) added to your cart!");
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
        cart[itemid][6] = z.toString();
        itemInfo[6] = cart[itemid][6];
    }
    else
    {
        itemInfo[6] = quantity;
        cart[itemid]=itemInfo;   
    }
    localStorage.setItem("cart",JSON.stringify(cart));
}

function removeFromCart(id)
{
  var cart = {};
  var item = id.value;
  var itemInfo = item.split("|");
  var itemid = itemInfo[0];
  if((localStorage.getItem("cart")!=null))
  {
    cart=JSON.parse(localStorage.getItem("cart"));
  }
  alert(document.getElementById(itemInfo[0]).value + " " + itemInfo[1]+ " (s) removed from your cart");
  delete cart[itemid];
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
  if(cartStr != null && cartStr != "{}")
  {
    var cart = JSON.parse(cartStr);
    var subtotal = 0;
    for(var item in cart)
    {
      var name = cart[item][1];
      var price = cart[item][2];
      var img = cart[item][4];
      var quantity = cart[item][6];
      var totalprice = (price*quantity).toFixed(2);
      subtotal += parseFloat(totalprice);
      out += `<tr>
                <td class="col-sm-8 col-md-6">
                  <div class="media">
                    <a class="thumbnail pull-left"><img class="media-object" src = \"http://localhost/DemoVersion/placingOrders/productImages/${img}\" style="width: 80px; height: 80px;"> </a>
                    <div class="media-body">
                      <h4 class="media-heading">${name}</a></h4>
                    </div>
                  </div>
                </td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                  <input type="number" class="form-control" min="1" value="${quantity}">
                </td>
                <td class="col-sm-1 col-md-1 text-center"><strong>$${price}</strong></td>
                <td class="col-sm-1 col-md-1 text-center"><strong>$${totalprice}</strong></td>
                <td class="col-sm-1 col-md-1">
                  <button type="button" class="btn btn-danger" onclick="remove(${cart[item][0]})">
                  <span class="glyphicon glyphicon-remove"></span> Remove
                  </button>
                </td>
              </tr>`;
              
    }
    out += `
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><input type="checkbox" id="standard" name="standard" value="Standard Shipping" onclick="setShipping(this)" checked></td>
                <td><label for="standard">Standard Shipping</label></td>
              </tr>
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><input type="checkbox" id="2-day" name="2-day" value="2-Day Shipping" onclick="setShipping(this)"></td>
                <td><label for="2-day">2-Day Shipping</label></td>
              </tr>`;
    var grandtotal = (subtotal + (subtotal*0.07)).toFixed(2);
    subtotal = subtotal.toFixed(2);
    out +=`
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><h5>Subtotal</h5></td>
                <td class="text-right"><h5><strong>$${subtotal}</strong></h5></td>
              </tr>
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><h5>Sales Tax</h5></td>
                <td class="text-right"><h5><strong>7%</strong></h5></td>
              </tr>
              <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td><h3>Total</h3></td>
                  <td class="text-right"><h3><strong>$${grandtotal}</strong></h3></td>
              </tr>
              <tr>
                  <td>   </td>
                  <td>   </td>
                  <td>   </td>
                  <td>
                  <button type="button" class="btn btn-default" onclick="window.location.replace(http://localhost/Software-Engineering-FinalV4/OrderHandling/productStore.php)">
                      <span class="glyphicon glyphicon-shopping-cart"></span> 
                      Continue Shopping
                  </button></td>
                  <td>
                  <button type="submit" class="btn btn-success" onclick="checkOut()">
                      <span class="glyphicon glyphicon-play"></span>
                      Checkout 
                 </button></td>
              </tr>
          `;
  }
  else
  {
    out = `<h4>Your Cart is Empty</h4>`;
  }
  document.getElementById("info").innerHTML = out;
}

function remove(itemid)
{
  var cart = {};
  if((localStorage.getItem("cart")!=null))
  {
    cart=JSON.parse(localStorage.getItem("cart"));
  }
  delete cart[itemid];
  localStorage.setItem("cart",JSON.stringify(cart));
  displayCart();
}

/**
 * Puts all of the information the needs to be a added to the database and outs it into the order html
 */
function getOrder()
{
  var out = '';
  var order = {};
  var cartStr = localStorage.getItem("cart");
  if(cartStr != null)
  {
    var cart = JSON.parse(cartStr);
    for(var item in cart)
    {
      var quantity = cart[item][6];
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
  var cartStr = localStorage.getItem("cart");
  var msg = document.getElementById('msg');
  if(cartStr != null && cartStr != "{}")
  {
    document.location.href='http://localhost/DemoVersion/placingOrders/payment.php';
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

function setShipping(id)
{
  var standard = document.getElementById('standard');
  var fastship = document.getElementById('2-day');
  if(id.value == 'Standard Shipping')
  {
    standard.checked = true;
    fastship.checked = false;
  }
  else
  {
    fastship.checked = true;
    standard.checked = false;
  }
}