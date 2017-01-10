
<?php
use Project\Auth\models\AuthModel;
include '../../autoloader.php';
require_once "../Model/OrderDB.php";
require_once "../Model/ShoppingcartDB.php";
require_once "../Model/FoodDB.php";
require_once "../Model/Food.php";
session_start();
// Start a session, there is no need to add this line if session is active.


$page="";

if(isset($_GET["action"])){
    $page=$_GET["action"];
}else if(isset($_POST["action"])){

$page=$_POST["action"];
}else{

    $page="original";
}
$orderdb=new OrderDB();
if($page=="all"){
    $orders=$orderdb->getAllOrders(AuthModel::getUser('id'));
    $items=array();
    foreach($orders as $order){
        $item= $orderdb->getItemByOrder($order->Order_id);
        $items[]=$item;

    }

    include "show.php";
}else if($page=="payment"){
    $orders=$orderdb->getUnpaidOrder(AuthModel::getUser('id'));
    $items=array();
    foreach($orders as $order){
        $item= $orderdb->getItemByOrder($order->Order_id);
        $items[]=$item;

    }
    include "show.php";
}else if($page=="comment"){
    $orders=$orderdb->getUncomment(AuthModel::getUser('id'));
    $items=array();
    foreach($orders as $order){
        $item= $orderdb->getItemByOrder($order->Order_id);
        $items[]=$item;

    }
    include "show.php";
}else if($page=="original"){
if(isset($_SESSION["food"])){unset($_SESSION["food"]);}
    $orders=$orderdb->getAllOrders(AuthModel::getUser('id'));
    $items=array();
     foreach($orders as $order){
        $item= $orderdb->getItemByOrder($order->Order_id);
         $items[]=$item;

     }
    $cartnumber=ShoppingcartDB::getCount(AuthModel::getUser('id'));


    include "Order_Management.php";
}else if($page=="delete"){

    $orderdb->deleteById($_POST["id"]);

}else if($page=="pay"){
    $total=$_POST["total"];
    $id=$_POST["id"];
    $phone=$_POST['phone'];
    $itemid=$_POST['itemid'];
    $itemquantity=$_POST['itemquantity'];;

    $_SESSION["food"]=true;
    $_SESSION["food1"]["total"]=$total;
    $_SESSION["food1"]["phone"]=$phone;
    $_SESSION["food1"]["id"]=$id;
    $_SESSION["food1"]["foodid"]=$itemid;
    $_SESSION["food1"]["itemquantity"]=$itemquantity;

 include "payment.php";

}else if($page=="paid"){

  $orderdb->updateOrder($_GET['total'],1,$_GET['phone'],$_GET['id']);

  foreach($_GET['foodid'] as $key => $id) {
        $food = FoodDB::getFoodById($id);
        $stock=$food->getInstock()-$_GET['itemquantity'][$key];
        $sale=$food->getSalesVolume()+1;
        FoodDB::updateFoodById($id,$stock,$sale);
    }

}else if($page=="ajax"){
  echo  $_SESSION["food"];
}else if($page=="paying"){
    echo  json_encode($_SESSION["food1"]);

}
if(isset($_POST["check"])){


   $total=$_POST["total"];
   $orderid= $orderdb->insertOrder(AuthModel::getUser('id'));

    foreach($_POST["info"] as $item){
       $food= ShoppingcartDB::getItemById($item[0]);

        $orderdb->insertOrderItem($orderid,$item[1],$item[2],$item[3],$item[4],$food);
    }
    $orderdb->updateOrder($total,0,"",$orderid);

}