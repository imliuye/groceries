<?php
//global $groceryList;
static $groceryList;
//global $groceryList;
$groceryList = array();

function cartEmpty(){
    global $groceryList;
    if (isset($_GET['empty'])) {
        return true;
    } else if (count($groceryList) == 0) {
        return true;
    } else {
        return false;
    }
}

$quantity = "";
$productId = "";
$productInfo = "";
$productPrice = "";

if(isset($_GET['productId'])){
    $quantity = $_GET['quantity'];
    $productId = $_GET['productId'];
    $productInfo = $_GET['productInfo'];
    $productPrice = $_GET['productPrice'];
}

?>

<html>
<head>
    <link rel="stylesheet" href="./css/grocery.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script type="text/javascript" src="./scripts/jquery.js"></script>
    <script type="text/javascript">

        let productId = "<?php echo $productId ?>";
        let quantity = "<?php echo $quantity ?>";
        let productInfo = "<?php echo $productInfo ?>";
        let productPrice = "<?php echo $productPrice ?>";
        let shoppingCartJasonStr = window.localStorage.getItem("shoppingCartJasonStr");
        let shoppingCartJason = !shoppingCartJasonStr ? {} : JSON.parse(shoppingCartJasonStr);

        function updateShoppingCart() {
            if (!shoppingCartJason[productId]) {
                shoppingCartJason[productId] = {
                    "quantity": quantity,
                    "productInfo": productInfo,
                    "productPrice": productPrice
                };
            } else {
                let oldQuantity = parseInt(shoppingCartJason[productId]["quantity"]);
                let newQuantity = parseInt(quantity);
                shoppingCartJason[productId]["quantity"] = oldQuantity + newQuantity;
            }
            shoppingCartJasonStr = JSON.stringify(shoppingCartJason);
            window.localStorage.setItem("shoppingCartJasonStr", shoppingCartJasonStr);

        }

        function emptyCart() {
            if (confirm("Are you sure you want to empty your cart?")) {
                $("#emptyShoppingCart").show();
                $("#checkoutWindow").hide();
            }
            window.localStorage.setItem("shoppingCartJasonStr", "");
        }

        function renderShoppingCartList() {
            let shoppingCartJasonStr = window.localStorage.getItem("shoppingCartJasonStr");
            let shoppingCartJason = !shoppingCartJasonStr ? {} : JSON.parse(shoppingCartJasonStr);
            let totalAmout = 0;
            for (let productID in shoppingCartJason) {

                let imgStr = "&nbsp;<img alt='' src='./images/" + productID + ".jpg' width='25'>&nbsp;";
                let html = "<tr>";
                html += "<th scope=\"row\">" + imgStr + shoppingCartJason[productID]['productInfo'] +  "</th>";
                html += "<td>" + shoppingCartJason[productID]['quantity'] + "</td>";
                html += "<td>$" + shoppingCartJason[productID]['productPrice'] + "</td>";
                let amount = parseFloat(shoppingCartJason[productID]['quantity']) * parseFloat(shoppingCartJason[productID]['productPrice']);
                html += "<td>$" + amount.toFixed(2) + "</td>";
                html += "</tr>";
                totalAmout += amount;
                $("#cart-table-total").before(html);
            }

            $("#total-amount").html(totalAmout.toFixed(2));
        }

        $(document).ready(function() {
            if ((!shoppingCartJasonStr && !productId)) {
                $("#emptyShoppingCart").show();
                $("#checkoutWindow").hide();
            } else if (!!productId) {
                $("#emptyShoppingCart").hide();
                $("#checkoutWindow").show();
                updateShoppingCart();
                renderShoppingCartList();
            } else {
                $("#emptyShoppingCart").hide();
                $("#checkoutWindow").show();
                renderShoppingCartList();
            }
        });

    </script>
</head>
<body>

<div id="emptyShoppingCart">
    Your shopping cart is currently empty.
</div>
<div id="checkoutWindow">
    <table class="table table-striped table-hover">
        <thead class="thead-dark thead-ego" id="cart-table-header">
        <tr>
            <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody id="">
        <tr id="cart-table-total" class="table-primary">
            <th scope="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</th>
            <td></td>
            <td></td>
            <td >$<span id="total-amount">0.00</span></td>
        </tr>
        </tbody>
    </table>

    <form action="paymentdetails.php" target="productDetail" align="right" style="margin-right:10px">
        <input id="checkout-button" type="submit" value="Checkout" class="checkout-button btn btn-primary">
        <input id="empty-button" type="button" value="Empty Cart" class="clear-cart btn btn-secondary" onclick="emptyCart();">
    </form>

</div>



</body>
</html>
