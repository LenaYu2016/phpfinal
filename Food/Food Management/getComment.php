<?php
require_once "../Model/Food.php";
require_once "../Model/FoodDB.php";
if(isset($_GET["id"])){

   $foods= FoodDB::getFoodCommentById($_GET["id"]);

    echo $foods;
}