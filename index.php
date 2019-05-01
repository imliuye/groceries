<html>
<head>

    <title>Groceries</title>
<!--  Ye Liu 12866277 all the images are downloaded from jd.com  -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grocery.css">
<!--    <script language="JavaScript"  type="text/javascript" src="jquery.min.js"></script>-->
    <script language="JavaScript"  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            // 执行代码
            adjustSize();
        });

        function adjustSize() {

            $('.main-table').height(window.innerHeight);
            $('.item-frame').width( window.innerWidth - $(".left").width() )
            if ( $('.item-frame').width() < 460 ) {
                $('.item-frame').height(540);
            } else {
                $('.item-frame').height(window.innerHeight - $(".item-frame").height());
            }

        }

        window.onresize = adjustSize;

        function showSubTree(title) {
            console.log(title)
            $("#frozenFoodImg").hide();
            $("#freshFoodImg").hide();
            $("#beveragesImg").hide();
            $("#homeHealthImg").hide();
            $("#petFoodImg").hide();
            $("#"+title+"Img").show();
        }

    </script>
</head>
<body>

    <div class="header">
        <div class="logo"><img src="./images/logo.png" alt="Groceroo, The Online Store" width="40px" height="40px">
        </div>
        <div class="welcome">

            Welcome to Grocery!
        </div>
        <div class="desp">
            You are going to love it...
        </div>
    </div>

    <div class="main-table ">
        <div class="row">
            <div class="left">

                <div id="checkOutBlock"><div>You are now in the check out process and cannot add more products. To add more products, click <strong>Continue Shopping</strong>.</div></div>

                <div class="prompt"><p>select a product:</p></div>
                <img class="category-img " src="images/root.png" usemap="#subTreeMap">
                <img class="category-img hide" src="./images/frozenFood.png"  id="frozenFoodImg" usemap="#frozenFoodMap">
                <img class="category-img hide" src="./images/freshFood.png" id="freshFoodImg" usemap="#freshFoodMap">
                <img class="category-img hide" src="./images/beverages.png" id="beveragesImg" usemap="#beveragesMap">
                <img class="category-img hide" src="./images/homeHealth.png" id="homeHealthImg" usemap="#homeHealthMap">
                <img class="category-img hide" src="./images/petFood.png" id="petFoodImg" usemap="#petFoodMap">

                <map name="subTreeMap">
                    <area shape="rect" coords="0,118,92,164"  onmouseover="showSubTree('frozenFood')">
                    <area shape="rect" coords="113,118,200,164" onmouseover="showSubTree('freshFood')">
                    <area shape="rect" coords="221,118,310,164"  onmouseover="showSubTree('beverages')">
                    <area shape="rect" coords="331,118,423,164" onmouseover="showSubTree('homeHealth')">
                    <area shape="rect" coords="442,118,531,164" onmouseover="showSubTree('petFood')">
                </map>
                <map name="frozenFoodMap">
                    <area shape="rect" coords="122,118,202,158" title="Fish Fingers 500g" href="item.php?itemId=1000" target="itemFrame">
                    <area shape="rect" coords="11,118,91,158" title="Fish Fingers 1kg" href="item.php?itemId=1001" target="itemFrame">
                    <area shape="rect" coords="0,59,87,104" title="Hamburger Patties" href="item.php?itemId=1002" target="itemFrame">
                    <area shape="rect" coords="204,59,291,104" title="Shelled Prawns" href="item.php?itemId=1003" target="itemFrame">
                    <area shape="rect" coords="327,118,407,158" title="Tub Ice Cream 1l" href="item.php?itemId=1004" target="itemFrame">
                    <area shape="rect" coords="217,118,297,158" title="Tub Ice Cream 2l" href="item.php?itemId=1005" target="itemFrame">
                </map>
                <map name="freshFoodMap">
                    <area shape="rect" coords="0,67,65,100" href="item.php?itemId=3002" title="T'Bone Steak" target="itemFrame">
                    <area shape="rect" coords="9,112,68,142" href="item.php?itemId=3000" title="Cheddar Cheese 500g" target="itemFrame">
                    <area shape="rect" coords="92,112,151,142" href="item.php?itemId=3001" title="Cheddar Cheese 1kg" target="itemFrame">
                    <area shape="rect" coords="151,67,216,100" href="item.php?itemId=3003" title="Navel Oranges" target="itemFrame">
                    <area shape="rect" coords="227,67,292,100" href="item.php?itemId=3004" title="Bananas" target="itemFrame">
                    <area shape="rect" coords="303,67,362,97" href="item.php?itemId=3006" title="Grapes" target="itemFrame">
                    <area shape="rect" coords="372,67,431,97" href="item.php?itemId=3007" title="Apples" target="itemFrame">
                    <area shape="rect" coords="441,67,500,97" href="item.php?itemId=3005" title="Peaches" target="itemFrame">
                </map>
                <map name="beveragesMap">
                    <area shape="rect" coords="1,95,63,127" href="item.php?itemId=4004" title="Instant Coffee 500g" target="itemFrame">
                    <area shape="rect" coords="71,96,133,128" href="item.php?itemId=4003" title="Instant Coffee 200g" target="itemFrame">
                    <area shape="rect" coords="158,93,221,127" href="item.php?itemId=4000" title="Earl Grey Tea Bags P25" target="itemFrame">
                    <area shape="rect" coords="238,93,300,127" href="item.php?itemId=4001" title="Earl Grey Tea Bags P100" target="itemFrame">
                    <area shape="rect" coords="316,93,378,127" href="item.php?itemId=4002" title="Earl Grey Tea Bags P200" target="itemFrame">
                    <area shape="rect" coords="410,43,479,78" href="item.php?itemId=4005" title="Chocolate Bar" target="itemFrame">
                </map>
                <map name="homeHealthMap">
                    <area shape="rect" coords="0,60,87,104" href="item.php?itemId=2002" title="Bath Soap" target="itemFrame">
                    <area shape="rect" coords="25,125,103,166" href="item.php?itemId=2000" title="Panadol Pack" target="itemFrame">
                    <area shape="rect" coords="128,125,206,166" href="item.php?itemId=2001" title="Panadol Bottle" target="itemFrame">
                    <area shape="rect" coords="202,60,289,104" href="item.php?itemId=2005" title="Washing Powder" target="itemFrame">
                    <area shape="rect" coords="229,125,307,165" href="item.php?itemId=2003" title="Garbage Bag (Small)" target="itemFrame">
                    <area shape="rect" coords="356,125,434,164" href="item.php?itemId=2004" title="Garbage Bag (Large)" target="itemFrame">
                    <area shape="rect" coords="410,60,497,104" href="item.php?itemId=2006" title="Laundry Beach" target="itemFrame">
                </map>
                <map name="petFoodMap">
                    <area shape="rect" coords="55,56,140,100" href="item.php?itemId=5002" title="Bird Food" target="itemFrame">
                    <area shape="rect" coords="176,56,262,100" href="item.php?itemId=5003" title="Cat Food" target="itemFrame">
                    <area shape="rect" coords="210,116,288,155" href="item.php?itemId=5000" title="Dry Dog Food 5kg" target="itemFrame">
                    <area shape="rect" coords="377,116,455,155" href="item.php?itemId=5001" title="Dry Dog Food 1kg" target="itemFrame">
                    <area shape="rect" coords="411,55,497,99" href="item.php?itemId=5004" title="Fish Food" target="itemFrame">
                </map>

            </div>

            <div class="right">
                <div class="main-table">
                    <div class="row top">
                        <div class="top-inner">
                            <iframe src="item.php" frameborder="0" name="itemFrame" class="item-frame"></iframe>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="bottom-inner">
                            <iframe src="cart.php" frameborder="0" name="cart" class="cart-frame"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>