


<?php
use Project\Auth\models\AuthModel;
include '../../autoloader.php';
require_once "../Model/Food.php";
require_once "../Model/FoodDB.php";
require_once "../Model/ShoppingcartDB.php";
session_start();

if(isset($_GET["id"])){
    $food=FoodDB::getFoodById($_GET["id"]);
    $cinemas=FoodDB::getFoodCinema();
   $mark=FoodDB::calculateMark($_GET["id"]);
FoodDB::setHistory($_GET["id"]);
    $cartnumber=ShoppingcartDB::getCount(AuthModel::getUser('id'));
    include "food_product.php";
}else if(isset($_POST["action"])){
      if($_POST["action"]=="add") {

          $count = ShoppingcartDB::insertItemById($_POST['foodId'],AuthModel::getUser('id') , $_POST['quantity'], $_POST['size'], $_POST['cinema']);
      }else if($_POST["action"]=="insertcomment"){

             $count = FoodDB::insertCommentById($_POST["orderitemid"], $_POST["foodid"], $_POST["comment"], $_POST["mark"],
                 $_POST["satisfaction"], $_POST["file"],AuthModel::getUser('id'));

      }
}else if(isset($_GET["foodid"])){
    $food=FoodDB::getFoodById($_GET["foodid"]);
    $cartnumber=ShoppingcartDB::getCount(AuthModel::getUser('id'));
    include "CommentForm.php";
}else if(isset($_POST["submit"])){
    //path of the file in temp directory
    $file_temp = $_FILES['upfile']['tmp_name'];
//original path and file name of the uploaded file
    $file_name = $_FILES['upfile']['name'];
//size of the uploaded file in bytes
    $file_size = $_FILES['upfile']['size'];
//type of the file(if browser provides)
    $file_type = $_FILES['upfile']['type'];
//error number
    $file_error = $_FILES['upfile']['error'];

    echo $file_temp . "<br />";
    echo $file_name . "<br />";
    echo $file_size . "<br />";
    echo $file_type . "<br />";
    echo $file_error . "<br />";
    if ($file_error > 0)
    {
        echo "Problem";
        switch ($file_error)
        {
            case 1:
                echo "File exceeded upload_max_filesize.";
                break;
            case 2:
                echo "File exceeded max_file_size";
                break;
            case 3:
                echo "File only partially uploaded.";
                break;
            case 4:
                echo "No file uploaded.";
                break;
        }
        exit;
    }



    $max_file_size = 200000;
    if($file_size > $max_file_size)
    {
        echo "file size too big";

    }

//folder to move the uploaded file
    $target_path = "uploads/";
    $target_path = $target_path .  $_FILES['upfile']['name'];
//
////move the uploaded file from tempe path to taget path
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
        echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
//
//

}
?>

