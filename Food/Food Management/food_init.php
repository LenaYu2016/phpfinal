<?php
require_once "../Model/Database.php";
require_once "../Model/Food.php";
require_once "../Model/FoodDB.php";
$foods=FoodDB::getAll();
echo $foods;