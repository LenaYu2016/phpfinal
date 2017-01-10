<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
require_once '../Model/Filmadmin.php';
//require_once '../../FilmAdmin_CMS/Model/Filmadmin.php';
require_once 'manage_movie.php';
$db = DB::getDB();
//validate date
$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
// Validate inputs
if (empty($title) || empty($releaseDate) || empty($cast) || empty($director) || empty($thumbnail) ) {
    echo "<span style='color:red;font-size:24px;'>";
    $error = "Invalid Movie data. Check all fields and try again.";
    echo $error;
    echo "</span>";
}
else if(!preg_match($date_regex, $releaseDate))
{
    $error = "Your date entry does not match the YYYY-MM-DD required format.";
    echo "<span style='color:red;font-size:24px;'>";
    echo $error;
    echo "</span>";
}
else {
    // If valid, update the movie to the database
    $thumbnail = "/Assets/image/HomePage/"."thumb_".$file_get;
    $updatingMovie = new Filmadmin();
    $updatingMovie->updateMovie($title,$releaseDate,$director,$cast,$thumbnail,$film_id);

    // Display the Movie List page
   // header('location: ../View/IndexMovies_AdminView.php');
    header('location: /admin/movie');
}