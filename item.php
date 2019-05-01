<html>
<head>
    <link rel="stylesheet" href="./css/grocery.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script type="text/javascript" src="./scripts/jquery.js"></script>
    <script>
        function addItem(upperLimit){
            var currentValue = $("#quantity").val();
            if(currentValue < upperLimit){
                currentValue++;
                $("#btnMore").prop('disabled', false);
                $("#btnLess").prop('disabled', false);
            }

            else{
                currentValue = upperLimit;
                $("#btnMore").prop('disabled', true);
                $("#btnLess").prop('disabled', false);
            }
            $("#quantity").val(currentValue);
        }

        function subItem(){
            let currentValue = $("#quantity").val();

            $("#btnMore").prop('disabled', false);
            if(currentValue > 1){
                currentValue--;
            } else {
            }
            if (currentValue == 1) {
                $("#btnLess").prop('disabled', true);
            } else {
                $("#btnLess").prop('disabled', false);

            }
            $("#quantity").val(currentValue);
        }

        $(document).ready(function(){
            $("#btnLess").prop('disabled', true);
            var quantityBox = $("#quantity");
            if(quantityBox)
                $(quantityBox).on("input propertychange paste", function(){
                    var quantityToAdd = $(this).val();
                    if(isFinite(quantityToAdd) && Number(quantityToAdd) > 0){
                        $("#cart-button").prop('disabled', false);
                    }
                    else
                        $("#cart-button").prop('disabled', true);
                });
        });

        function addCartButtonCtrl(upperLimit) {
            let currentValue = $("#quantity").val();
            if(currentValue >= upperLimit){
                $("#quantity").val(upperLimit);
                $("#btnMore").prop('disabled', true);
                $("#btnLess").prop('disabled', false);
            } else if (currentValue <= 1){
                //$("#quantity").val(1);
                $("#btnMore").prop('disabled', false);
                $("#btnLess").prop('disabled', true);
            } else {

                $("#btnMore").prop('disabled', false);
                $("#btnLess").prop('disabled', false);
            }

        }


    </script>
</head>
<body>
<?php
$servername = "rerun.it.uts.edu.au";
$username = "potiro";
$password = "pcXZb(kL";
$dbname = "poti";
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败:<br> " . $conn->connect_error);
}



$product_name = "";
$unit_price = "";
$unit_quantity = "";
$in_stock = "";
$itemNo = "";
$showNoItem = "display: none";
$showItem = "";


if (isset($_GET['itemId'])) {
    $itemNo = $_GET['itemId'];
    $sql = "SELECT product_id , product_name , unit_price, unit_quantity, in_stock  FROM products where product_id=".$itemNo;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 输出数据
        $showNoItem = "display: none";
        $showItem = "";
        while($row = $result->fetch_assoc()) {
            $product_name = $row["product_name"];
            $unit_price =  $row["unit_price"];
            $unit_quantity =  $row["unit_quantity"];
            $in_stock =  $row["in_stock"];
            break;
        }
    } else {

        $showNoItem = "";
        $showItem = "display: none";
    }
} else {
    $showNoItem = "";
    $showItem = "display: none";
}



?>

<div id="noItem" style="<?php echo $showNoItem?>">Select items from categories on the left.</div>
<div id="itemDiv" style="<?php echo $showItem?>">
    <div class="item-title">
        <span class="item-name"><?php echo $product_name?> </span>
        (<span class="item-quatity"><?php echo $unit_quantity?></span>)
    </div>
    <div class="itemDetail">
        <div class="">

            <img src="./images/<?php echo $itemNo ?>.jpg" align="left"  height="250px" class="item-img">
        </div>

        <div class="item-desp">
            <div class="in-stock-div">In Stock: <span class="item-in-stock"><?php echo $in_stock?> </span> </div>
            <div class="price-tag-div">Price: <span class="item-price-red">$<?php echo $unit_price ?></span></div>
            <p></p>

            <form action="cart.php" target="cart" class="order-row">
                <input id="btnLess" type="button" class="op-button" value="-" title="Less" onclick="subItem();">
                <input type="number" class="item-quatity-input spin0" value="1" name="quantity" id="quantity" onkeyup="addCartButtonCtrl(<?php echo $in_stock?>)" >
                <input type="hidden" name="productId" value="<?php echo $itemNo?>">
                <input type="hidden" name="productInfo" value='<?php echo "$product_name($unit_quantity)"?>'>
                <input type="hidden" name="productPrice" value="<?php echo $unit_price ?>" >
                <input id="btnMore" type="button" class="op-button" value="+" title="More" onclick="addItem(<?php echo $in_stock?>);">


                <div class="add-cart-div">
                    <input id="cart-button" class="btn btn-primary" type="submit" value="Add to Cart" title="Add to cart." target="">

                </div>
            </form>
        </div>

    </div>
</div>

<?php
$conn->close();
?>
</body></html>