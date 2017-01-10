<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>

<?php include "../../Assets/html/header.php";?>
<script src="../../Assets/js/Food/Order_Management.js"></script>
<link rel="stylesheet" type="text/css" href="../../Assets/css/food-order.css" />
<main>

    <div class="container-fluid">
        <div class="page-header row">
            <h1 class="col-md-4">Order Management</h1>
            <div class="col-md-offset-5 col-md-2"><h3><a href="../index.php">Food menu</a></h3></div>
            <div class="container button-wrapper cart col-md-1">
               <a href="../FoodShoppingcartManagement/index.php"> <button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="items"><?php
                        echo $cartnumber;
                        ?></span></button>
               </a>
            </div>
            </div>
         <div>
             <div class="row menu">
                 <ul class="nav nav-tabs menu-nav col-md-12 col-sm-12 col-xs-12">
                     <li role="presentation" class="active" id="all">
                         <a href="">All orders</a>
                     </li>
                     <li role="presentation"  class="" id="payment">
                         <a href="">Waiting for payment</a>
                     </li>
                     <li role="presentation"  class="" id="comment">
                         <a href="">Waiting for comment</a>
                     </li>


                 </ul>

             </div>
             <div class="table-responsive" id="foods">
                <?php include "show.php";?>
         </div>
    </div>
</main>
<?php include "../../Assets/html/footer.php";?>
</body>
