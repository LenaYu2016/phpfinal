<?php
?>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">




</head>
<body>
<?php include "../Assets/html/header.php";?>
<link rel="stylesheet" type="text/css" href="../Assets/css/food-index.css" />
<script src="../Assets/js/Food/food_index.js"></script>
<main>
    <div class="container-fluid">
        <div class="page-header row">
            <h1 class="col-md-3">Food Menu</h1>
            <div class="col-md-3 col-md-offset-2">
            <form action="index.php" class="search-form " method="get">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input list="listchosen" type="text" class="form-control" name="search" id="search" placeholder="search">
                    <span class="glyphicon glyphicon-search form-control-feedback" ></span>
                    <datalist id="listchosen">

                    </datalist>
                </div>
            </form>
                </div>
            <div class="btn-group col-md-2 ">

                <div class="dropdown">
                   <a href="order_management/index.php" id="goorder"> <button class="dropbtn btn btn-info order">Order management
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

            <div class="container button-wrapper cart col-md-1">
               <a href="FoodShoppingcartManagement/index.php" id="goshop"> <button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="items"><?php
                           echo $cartnumber;
                           ?></span></button></a>
            </div>

        </div>



        <div class="sidebar-nav col-xs-12 col-sm-3 col-md-3  ">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MainMenu">
                <span class="sr-only" style="background-color:crimson">Toggle navigation</span>
                <span class="icon-bar" style="background-color: #0A0A0A"></span>
                <span class="icon-bar" style="background-color: #0A0A0A"></span>
                <span class="icon-bar" style="background-color: #0A0A0A"></span>
            </button>
                </div>

            <div id="MainMenu" class="collapse navbar-collapse ctlist">
                <div class="list-group panel">
                    <a href="#demo1" id="allFoods" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">All foods</a>

                    <a href="#demo3" id="special" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Special</a>
                    <div class="collapse" id="demo3">
                        <a href="" class="list-group-item">1</a>
                        <a href="" class="list-group-item">2</a>
                        <a href="" class="list-group-item">3</a>
                    </div>
                    <a href="#demo4" id="breakfast" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Breakfast</a>
                    <div class="collapse" id="demo4">
                        <a href="" class="list-group-item">Subitem 1</a>
                        <a href="" class="list-group-item">Subitem 2</a>
                        <a href="" class="list-group-item">Subitem 3</a>
                    </div>
                    <a href="#demo5" id="LunchAndDinner" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Lunch & Dinner</a>
                    <div class="collapse" id="demo5">
                        <a href="" class="list-group-item">Subitem 1</a>
                        <a href="" class="list-group-item">Subitem 2</a>
                        <a href="" class="list-group-item">Subitem 3</a>
                    </div>
                    <a href="#demo6" id="Bakery" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Bakery</a>
                    <div class="collapse" id="demo6">
                        <a href="" class="list-group-item">Subitem 1</a>
                        <a href="" class="list-group-item">Subitem 2</a>
                        <a href="" class="list-group-item">Subitem 3</a>
                    </div>
                </div>
            </div>
         <div id="rate"><h3>Top Food</h3>

<?php foreach($topfoods as $food){?>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <form action="Food Management/index.php" method="get">
                 <div href="#" class="thumbnail">
                     <img src="../Assets/image/food/<?php echo $food->getImage();?>" alt="..." class="">

                     <p><?php echo $food->getName();?></p>
                    <p>Sales volume:<?php echo $food->getSalesVolume();?></p>
                     <input type="hidden" name="id" value="<?php echo $food->getId()?>"/>
                     <input type="submit" class="btn btn-default btn-sm " value="View Detail" />

                 </div>

                 </form>
             </div>
<?php }?>



         </div>

</div>
        <div class="menu col-xs-12  col-sm-9 col-md-9">

<div class="row">




   <?php include "Food Management/show.php";?>


  </div>

            <nav class="col-md-offset-4 col-sm-offset-4 col-xs-12 col-md-10 col-sm-8">
                <ul class="pagination">
                    <li class="disabled">
      <span>
        <span aria-hidden="true">&laquo;</span>
      </span>
                    </li>
                    <?php for($i=1;$i<=$pages;$i++){?>
                        <li class="<?php if($i==1){echo "active";}?>">
                            <span><?php echo $i;?><span class="sr-only">(current)</span></span>
                        </li>
                    <?php }?>
                    <li>
                    <span>
        <span aria-hidden="true">&raquo;</span>
      </span>
                    </li>
                </ul>
            </nav>

   </div>

    </div>

    </div>
</main>
<?php include "../Assets/html/footer.php";?>
</body>
