<?php
use Project\Classes\DB\DB;
//connect to database :
include '../../autoloader.php';
$db = DB::getDB();

// Get the value from the form
$film_id = $_POST['film_id'];
$title = $_POST['title'];
$releaseDate = $_POST['releaseDate'];
$director = $_POST['director'];
$cast = $_POST['cast'];
//$img = $_POST['img'];

// Image
$file_get = $_FILES['img1']['name'];

// put the file in PHP temp folder
$temp = $_FILES['img1']['tmp_name'];

//get the type of the file(if browser provides)
$file_type = $_FILES['img1']['type'];

//get the file size in bytes
$fileSize  = $_FILES['img1']['size'];
//Get the Error Message
$fileErrorMsg = $_FILES['img1']['error'];    // 0 for false .. and 1 for true ..
$file_to_saved = "../../Assets/image/HomePage/".$file_get;
$splitFile = explode(".",$file_get);    // split file name into an array using the dot

//Now target the last array element to get the file extension
$fileExt = end($splitFile);

// ===== PHP Image Upload Error Handling=======

if(!$temp)
{
    echo "<span style='color:red;font-size:24px;'>";
    echo "Error:Please browse for a file before clicking the Add button";
    echo "</span>";
    exit();
}
else if($fileSize > 5242880)  // if file size is larger than 5 Megabytes
{
    echo "<span style='color:red;font-size:24px;'>";
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    echo "</span>";
    unlink($temp);      // Remove the uploaded file from the PHP temp folder
    exit();
}
else if(!preg_match("/.(gif|jpg|png)$/i",$file_get))
{
    echo "<span style='color:red;font-size:24px;'>";
    echo "ERROR: Your image was not .gif, .jpg, or .png."."<br/>";
    echo "Only  .gif, .jpg, or .png files are allowed ";
    echo "</span>";
    unlink($temp);      // Remove the uploaded file from the PHP temp folder
    exit();
}
else if($fileErrorMsg == 1)
{
    echo "<span style='color:red;font-size:24px;'>";
    echo "ERROR: An error occured while processing the file. Try again.";
    echo "</span>";
    exit();
}
//=====END PHP Image Upload Error Handling========

//===Documents folder, should exist in your host in there you're going to save the file just uploaded

$moveResult = move_uploaded_file($temp, $file_to_saved);

//echo $file_to_saved;
if($moveResult != true)
{
    echo "<span style='color:red;font-size:24px;'>";
    echo "ERROR: File not uploaded. Try again.";
    echo "</span>";
    unlink($temp); // Remove the uploaded file from the PHP temp folder
    exit();
}
//======= Image part ends here

//unlink($temp);  // Remove the uploaded file from the PHP temp folder

//========Include Image Resize function=======

include('imageResize.php');
$file_to_saved = "../../Assets/image/HomePage/".$file_get;
$resized_file ="../../Assets/image/HomePage/"."resized_".$file_get;
$wmax = 400;
$hmax = 750;

img_resize($file_to_saved, $resized_file, $wmax, $hmax, $fileExt);


unlink($file_to_saved);   // Remove the Original  file from the image folder and display only resized image


//========End of Image Resize function===========

// ======== Start Image Thumbnail(Crop) Function//===== ------

$target_file = "../../Assets/image/HomePage/"."resized_".$file_get;
$thumbnail = "../../Assets/image/HomePage/"."thumb_".$file_get;
$wthumb = 400;
$hthumb = 595;

img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);

unlink($resized_file);

//====End of Image Thumbnail(Crop) Function ==============