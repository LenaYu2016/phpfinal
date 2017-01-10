<?php
// Get FilmIDs
$film_id = $_POST['film_id'];
use Project\Classes\DB\DB;
include '../../autoloader.php';
require_once '../Model/Filmadmin.php';
$deleteMovies = new Filmadmin();            // Delete the movie from the database
$deleteMovies->deleteMovie($film_id);

// Redirect to display the Product List
//header('location: ../View/IndexMovies_AdminView.php');
header('location: /admin/movie');
?>