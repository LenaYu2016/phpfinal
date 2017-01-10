<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
require_once '../../Rating_System/Model/Ratings.php';
require_once '../../Rating_System/database.php';
$db = Database::getDB();
// Get the value from the form
$rating_id = $_POST['rating_id'];
$total_votes = $_POST['total_votes'];
$total_value = $_POST['total_value'];
$used_ips = $_POST['used_ips'];
$date = $_POST['date'];
// Validate inputs
if (empty($total_votes) || empty($total_value) || empty($used_ips) || empty($date)) {
    echo "<span style='color:red;font-size:24px;'>";
    $error = "Invalid Rating data. Check all fields and try again.";
    echo $error;
    echo "</span>";
} else {
    // If valid, update the Rating data to the database
    $ratingData = new Ratings();
     $ratingData->ratingUpdate($total_votes,$total_value,$used_ips,$date,$rating_id);
    // Display the Rating List page
  //  header('location: ../View/Ratings_Index.php');
    header('location: /admin/rating');
}