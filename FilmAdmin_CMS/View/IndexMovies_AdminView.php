<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
//require_once '../Model/Filmadmin.php';       UNCOMMENT THIS LINE IF YOU ARE RUNNING THIS PAGE FROM DIRECTLY AND COMMENT BELOW LINE
require_once '../../FilmAdmin_CMS/Model/Filmadmin.php';
$db = DB::getDB();
$displayAllMovies = new Filmadmin();
$allMovies = $displayAllMovies->displayMovie();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>
    <!--Attahced Admin CSS-->
    <link rel="stylesheet" type="text/css" href="../../Admin_Login/admin.css" />
    <title>Homepage</title>
</head>


<body>
<!--<?//php include '../../Admin_Login/admin.php' ?>-->
<main id="main-content">
    <section  class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8">
                <div class="row film-gallery">
                    <form action="/admin/addMovie" method="post"
                          id="add_movie_form">
                        <input type="submit" value = "Add Movie" class="btn btn-default btn-booking" />
                    </form>
                    <br>
                    <?php foreach($allMovies as $displayMovie) : ?>
                        <div class="film-container col-lg-4 col-md-4 col-sm-4 col-xs-4">

                            <img alt="film1" src="<?php echo $displayMovie['img'] ?>"/>
                            <p class="film-title"><?php echo $displayMovie['title'] ?>(U)</p>
                            <p class="film-detail">
                                Stars:
                                <span><?php echo $displayMovie['cast']?></span><br>
                                Director:
                                <span><?php echo $displayMovie['director']?></span><br/>
                                Release Date :
                                <span><?php echo $displayMovie['releaseDate']?></span>
                            </p>

                            <form action="/FilmAdmin_CMS/controller/delete_movie.php" method="post">
                                <input type="hidden" name="film_id"
                                       value="<?php echo $displayMovie['film_id']; ?>" />
                                <input type="submit" value ="Delete" class="btn btn-default btn-booking"/>
                            </form>
                            <br>
                            <form action = "/admin/editMovie" method="post">
                                <input type="hidden" name="film_id"
                                       value="<?php echo $displayMovie['film_id']; ?>" />
                                <input type="submit" value = "Update" class="btn btn-default btn-booking"/>
                            </form>

                            <br>
                        </div>

                    <?php endforeach; ?>
                </div>
