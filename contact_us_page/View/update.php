<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
//require_once '../Model/Contactus.php';
require_once '../../contact_us_page/Model/Contactus.php';
$contact_id =  $_POST["id"];
$first_name = htmlspecialchars($_POST["firstname"]);
$last_name =  htmlspecialchars($_POST["lastname"]);
$Email = htmlspecialchars($_POST["email"]);
$Message = htmlspecialchars($_POST["message"]);
$modifiedContact = new Contactus();
$modifiedContact ->updateFrom($contact_id);
?>

<!Doctype HTML>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
   <link rel="stylesheet" href="/Assets/css/style.css"/>

   <title>List of contacts</title>
</head>
<boby>

<div class="container">
<h1> You have made the following changes :</h1>

<p><strong>First name :</strong> <?php echo $first_name ?></p>
<p><strong>Last name :</strong> <?php echo $last_name ?></p>
<p><strong>Email :</strong> <?php echo $Email ?></p>
<p><strong>Messgae :</strong> <?php echo $Message ?></p>

<br>
<div>
  <!-- <a href ="/contact_us_page/View/displaycontact.php">  <input type="button" name="back" value="Back To Index" class="btn btn-primary"> </a>-->
   <a href ="/admin/contact">  <input type="button" name="back" value="Back To Index" class="btn btn-primary"> </a>
</div>

</div>
</boby>
</html>


