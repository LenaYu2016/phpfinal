<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>
<body>
<?php include "../../Assets/html/header.php";?>
<script src="../../Assets/js/Food/food_shopping_cart.js"></script>
<link rel="stylesheet" type="text/css" href="../../Assets/css/food-shopping-cart.css" />
<main>
    <div class="container-fluid">
        <div class="page-header row">
          <h1 class="col-md-4">Food Shopping Cart</h1>

            <div class="col-md-offset-1  col-md-3">
                <form action="" class="search-form ">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="search" placeholder="search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
                </div>
            <div class="col-md-2"><h3><a href="../index.php">Food menu</a></h3></div>
                <div class-="col-md-2">
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

            </div>
        <form action="../order_management/index.php" method="post">
        <div class="row menu">

    <ul class="nav nav-tabs menu-nav col-md-5 col-sm-12 col-xs-12 row">
        <li role="presentation" class="active" id="selectall"><a >All Items</a></li>
        <li role="presentation"  class="" id="lowstock"><a >Low stock</a></li>
        <li role="presentation"  class="" id="reduction"><a >Price reduction</a></li>


    </ul>
            <div class="col-sm-12 col-md-offset-3 col-md-4">
                <p class="navbar-text">Selected Food: $<span>0.00</span></p>
                <button type="submit" class="btn btn-default navbar-btn" id="checkout">Check out</button>
            </div>
            </div>

        <div class="table-responsive" id="foods">
            <table class="table table-hover">
                <thead><td><input type="checkbox" class="check" id="checkall"></td><td>Select all</td><td colspan="4">Food information</td>
                <td>Price(CAD)</td><td>Quantity</td><td>Amount</td><td>Operation</td><td>Delivery Time</td></thead>
               <?php foreach($cart as $item){?>
                <tr class="item">
                  <td rowspan="4"><input type="checkbox" class="check" name="checkeditem[]" value="<?php echo $item->Id;?>"/> </td>
                    <td rowspan="4" ><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>">
                            <img src="../../Assets/image/food/<?php echo $item->Food_Image?>" width="130" height="95"/></a></td>
                    <td rowspan="4"><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>">
                            <?php echo $item->Food_Name;?></a></td>
                    <td rowspan="4">Catatory: <?php echo $item->Food_Catagory;?></td>
                    <td rowspan="4">Cinema:<select class="cinemas"> <?php
                        foreach($cinemas as $c)
                        { if($item->Cinema_Name==$c["Cinema_Name"]){

                        ?>
                            <option value="<?php echo $item->Cinema_Name;?>" selected><?php echo $item->Cinema_Name;?></option>

                        <?php
                        }else{
                            ?>
                            <option value="<?php echo $c["Cinema_Name"];?>"><?php echo $c["Cinema_Name"];?></option>
                            <?php
                        }

                        }
                        ?></select></td>
                    <td rowspan="4" width="150">Size:
                        <select class="foodsize">
                            <option class="small" <?php if($item->Size==1){
                                echo "selected";
                            }?>>Small</option>
                            <option class="middle" <?php if($item->Size==2){
                                echo "selected";
                                }?>>Middle</option>
                            <option class="large" <?php if($item->Size==3){
                                echo "selected";
                                }?>>Large</option>
                        </select>
                    </td>
                    <td rowspan="4" width="150">
                        <input type="hidden" value="<?php echo $item->Food_Price; ?>"/>
                        <input type="hidden" value="<?php echo $item->Discount_price;?>"/>
                        Original: $<?php if($item->Food_Price!==$item->Discount_price){?><span style="text-decoration:line-through;">
                            <?php if($item->Size==1){ echo $item->Food_Price;}else if($item->Size==2){
                                echo $item->Food_Price*1.5;
                            }else if($item->Size==3){
                                echo $item->Food_Price*2;
                            }?></span>
                    <?php }else
                    {?><span><?php if($item->Size==1){ echo $item->Food_Price;}else if($item->Size==2){
                        echo $item->Food_Price*1.5;
                    }else if($item->Size==3){
                        echo $item->Food_Price*2;
                    }?></span><?php }?>
                    <div class="current">Current: $<span><?php if($item->Size==1){ echo $item->Discount_price;}else if($item->Size==2){
                                echo $item->Discount_price*1.5;
                            }else if($item->Size==3){
                                echo $item->Discount_price*2;
                            }?></span></div>

                    </td>

                    <td rowspan="4" width="150">
                       <div class="snip"><input type="button" value="-" class="m"/><input type="text" size="1" maxlength="3" class="enter" value="<?php echo $item->Quantity;?>"/><input type="button" value="+" class="p"/>
                           <input type="hidden" value="<?php echo $item->Food_Instock;?>"/></div>
                    </td>
                    <td rowspan="4" class="amount">$<span><?php if($item->Size==1){ echo $item->Discount_price*$item->Quantity;}
                            else if($item->Size==2){echo $item->Discount_price*$item->Quantity*1.5;}
                            else if($item->Size==3){echo $item->Discount_price*$item->Quantity*2;}?></span></td>
                    <td rowspan="4">
                        <input type="hidden" value="<?php echo $item->Id;?>" name="id"/>
                        <a href="" name="delete">Delete</a>
                    </td>
                    <td rowspan="4" width="250" class="deliverytime">Date <input type="date"/>
                        <div class="timeinput">Time <input type="time"/></div></td>
                </tr>
<tr></tr>
                <tr></tr>
                <tr></tr>
               <?php }?>
            </table>
        </div>
        </form>
        <div class="row">
            <nav>
                <ul class="pager">
                    <li class="disabled"><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>

        </div>
        <div style="margin: 30px auto;" class="row">


        <ul class="nav nav-pills navbottom">
            <li role="presentation" class="active" id="guess"><a>Guess you like</a></li>
            <li role="presentation" id="history"><a>Viewed recently</a></li>

        </ul>

        </div>
        <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-1 col-xs-2">
            <button type="button " class="btn" aria-label="Left Align">
            <span class="glyphicon glyphicon-menu-left">

            </span>
            </button>
            </div>
            <div class="col-md-1 col-xs-2 col-xs-offset-8 col-md-offset-10">
                <button type="button" class="btn" aria-label="Right Align">
            <span  class="glyphicon glyphicon-menu-right">

            </span>
                </button>
            </div>
        </div>
        <div class="row" id="bottomcontent">
<?php foreach($guess as $item){ ?>

            <div class="col-xs-10 col-sm-4 col-md-2">
                <div href="#" class="thumbnail">
                    <img src="../../Assets/image/food/<?php echo $item->getImage();?>" alt="..." class="">
                    <div class="caption">
                    <h3 class="food_title"><?php echo $item->getName();?></h3>
                   <a href="../Food%20Management/index.php?id=<?php echo $item->getId();?>"> <button type="button" class="btn btn-default btn-sm view">View Detail</button></a>
</div>
                </div>

            </div>

<?php } ?>
    </div>
</main>
<?php include "../../Assets/html/footer.php";?>
</body>

