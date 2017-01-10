<?php
require_once "Model/Database.php";
require_once "Model/Food.php";
$db=Database::getDB();

/*$query="select * from food order by Sales_volume DESC limit 5";
$results=$db->query($query);
$all=array();
var_dump($results);
foreach($results as $item){
    $food=new Food($item["Food_Catagory"],$item["Food_Price"],$item["Food_Instock"],
        $item["Food_description"],$item["Food_mark"],$item["Food_Name"],$item["Food_Image"],
        $item["Discount_price"],$item["Viewed_times"],$item["Sales_volume"]);
    $food->setId($item["Food_id"]);
    $all[]=$food;
}
var_dump($all);*/
echo date("Y-m-d");
//var_dump($all);
