


<?php
use Project\Auth\models\AuthModel;
include '../../autoloader.php';
require_once "../Model/Food.php";
require_once "../Model/FoodDB.php";
require_once "../Model/Shoppingcart.php";
require_once "../Model/ShoppingcartDB.php";
session_start();
$page="";
$action="";

//if(isset($_SESSION["user"])) {
if(isset($_GET['action'])){

    $action=$_GET['action'];
}else if(isset($_POST['action'])){
    $action=$_POST['action'];
}else {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "cart_list";
    }
}

if($action=="delete"){
    ShoppingcartDB::deleteById($_POST['id']);

}else if($action=="stock"){
 $results= ShoppingcartDB::getLowstock(5,AuthModel::getUser('id'));
    $cinemas = FoodDB::getFoodCinema();
   include "load.php";

}else if($action=="all"){
    $results = ShoppingcartDB::getCartByUserId(AuthModel::getUser('id'));
    $cinemas = FoodDB::getFoodCinema();
    include "load.php";

}else if($action=="reduction"){
    $results = ShoppingcartDB::getReduction(AuthModel::getUser('id'));
    $cinemas = FoodDB::getFoodCinema();
    include "load.php";

}else if($action=="history"){
   $foods=ShoppingcartDB::getHistory(6);

    include "bottomload.php";
}else if($action=="guess"){
    $foods=ShoppingcartDB::getGuess(AuthModel::getUser('id'),6);
    include "bottomload.php";
}else if($action=="update"){

    ShoppingcartDB::updateSizeById($_GET["id"],$_GET["size"]);

}else if($action=="updatecinema"){

    ShoppingcartDB::updateCinemaById($_GET["id"],$_GET["cinema"]);

}else if($action=="updateq"){

   ShoppingcartDB::updateQuantityById($_GET["id"],$_GET["quantity"]);
echo $_GET["id"]." ".$_GET["quantity"];
}else{
    if ($page == "cart_list") {
        $cart = ShoppingcartDB::getCartByUserId(AuthModel::getUser('id'));
        $cinemas = FoodDB::getFoodCinema();
        $guess=ShoppingcartDB::getGuess(AuthModel::getUser('id'),6);
        include "food-shopping-cart.php";
    } else if ($page == "order_management") {
        include "Order_Management.php";
    }

}
?>


