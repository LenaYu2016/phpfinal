
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>
<body>
<?php include "../../Assets/html/header.php";?>
<script src="../../Assets/js/Food/food_product.js"></script>
<link rel="stylesheet" type="text/css" href="../../Assets/css/food_product.css" />
<main>
    <div class="container-fluid">
        <div class="page-header row">
            <div class="btn-group col-md-2 col-md-offset-8">
                <div class="dropdown">
                    <a href="../order_management/index.php"> <button class="dropbtn btn btn-info order">Order management
                            <span class="glyphicon glyphicon-triangle-bottom"></span>
                        </button>
                    </a>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
            <div class="container button-wrapper cart col-md-2">
               <a href="../FoodShoppingcartManagement/index.php"> <button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>
                       <span class="items"><?php echo $cartnumber;?></span></button></a>
            </div>
            </div>
        <form action="#" method="post" id="">
            <input type="hidden" value="<?php echo $food->getId();?>" name="foodId" id="foodId"/>
        <div class="table-responsive">
            <table class="table1">
               <tr> <td rowspan="6" colspan="1" width="400"><img class="thumbnail" src="../../Assets/image/food/<?php echo $food->getImage();?>" width="340" height="220"/>
                       <div style="margin-top: 20px;"><label>Share:</label></div></td><td colspan="7"><h3><?php echo $food->getName();?></h3></td></tr>
                <tr><td height="60"><label>Deal record:</label><?php echo $food->getSalesVolume();?></td><td colspan="2"></td> <td>
                        <label id="ac">Accumulated comment: </label></td><td colspan="3"></td></tr>
                <tr><td colspan="7" height="60"><label>Price:</label> <span id="dp"><?php echo $food->getDiscountPrice();?></span> ( CAD ) </td></tr>
                <tr><td colspan="7" height="60"><label>Original Price:</label>$<span id="op"><?php echo $food->getPrice();?></span>
                        <label>Save:</label> $<span id="save"><?php echo $food->getPrice()-$food->getDiscountPrice();?></span> </td></tr>
                <tr><td colspan="7" height="60"><label>Cinema:</label>
                        <select name="cinema">
                        <?php foreach($cinemas as $cinema){
                            ?>
                            <option value="<?php echo $cinema["Cinema_Name"];?>"><?php echo $cinema["Cinema_Name"];?></option>
                            <?php
                        }?>
                        </select> </td></tr>
                <tr><td colspan="1" height="60">
                        <label for="size">Size: </label></td><td colspan="6">
                     Small   <input type="radio" name="size" id="small" value="1" checked/>
                      Middle  <input type="radio" name="size" id="middle" value="2"/>
                     Large   <input type="radio" name="size" id="large" value="3"/>
                    </td></tr>

                <tr><td colspan="1" height="60"></td><td colspan="1">
                       <label for="quantity">Quantity: </label>

                    </td>
                    <td colspan="2"><div class="snip">
                            <input type="button" value="-" id="m"/><input type="text" id="enter" name="quantity" size="1" maxlength="3" value="1"/><input type="button" value="+" id="p"/></div></td>
                    <td colspan="4">( Instock: <span id="stock"><?php echo $food->getInstock();?></span> )</td></tr>
                <tr><td colspan="1" height="60"></td><td colspan="1"><button type="submit" class="btn bb">Buy now</button></td> <td colspan="6">
                        <button type="submit" class="btn bb" id="add" value="Add to cart" name="add">Add to cart</button></td></tr>
                </table>
        </div>

        </form>
       <div style="height:0;border-top:2px solid orange;margin-top:30px"></div>
        <div class="container" id="comment">

            <h3>Accumulated comment</h3>
            <div>
           <label for="comment_show">Food product mark:<span style="font-size:2em;font-weight:700;margin-right:30px;color:salmon;"> <?php echo number_format($mark, 1);?></span></label>
            <input type="radio" name="comment_show" id="all" checked/>All
            <input type="radio" name="comment_show" id="good"/>Good(<span></span>)
            <input type="radio" name="comment_show" id="soso"/>So-so(<span></span>)
            <input type="radio" name="comment_show"  id="bad"/>Bad(<span></span>)
            </div>
        <div id="usercomment"></div>
        </div>
        </div>
</main>
<?php include "../../Assets/html/footer.php";?>
</body>
