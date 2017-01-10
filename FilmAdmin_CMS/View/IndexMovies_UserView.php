<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
require_once '../Model/Filmadmin.php';
$indexMovies = new Filmadmin();
$allMovies = $indexMovies->movieIndex();
?>

<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/Assets/css/style.css"/>
        <link rel="stylesheet" href="/Assets/css/movie_index.css"/>
        <!--Rating CSS and JQuery File-->

        <link rel="stylesheet" href="/Rating_System/rating.css" />
        <title>Homepage</title>
    </head>
    <body>
       <?php include '../../Assets/html/header.php'?>
        <section id="slider" class="container-fluid">
           <h2 class=hidden>slide show</h2>
           <div class="row">
            <div class="slides">
                <img alt="pic" src="/Assets/image/HomePage/slide.jpg"/>
            </div>
            </div>
        </section>

         <main id="main-content">
         <section  class="container">
            <div class="row">
             <div class="col-lg-8 col-sm-8 col-md-8">
                    <div class="row">
                         <ul class="nav nav-tabs home-tab">
                             <li><a class="active-link">All Movies</a></li>
                         </ul>
                    </div>

                    <div class="row film-gallery">
                        <?php foreach($allMovies as $displayMovie) : ?>
                         <div class="film-container col-lg-4 col-md-4 col-sm-4 col-xs-4">

                             <img alt="film1" src="<?php echo $displayMovie['img'] ?>" />
                             <p class="film-title"><?php echo $displayMovie['title'] ?>(U)</p>
                             <p class="film-detail">
Stars: :
                                 <span><?php echo $displayMovie['cast']?></span><br>
Director :
                                 <span><?php echo $displayMovie['director']?></span><br>
Release Date :
                                 <span><?php echo $displayMovie['releaseDate']?></span>
                             </p>
                             <button type="button" class="btn btn-default btn-booking">Book Now</button>

                             <!--Include Movie Rating HTML Part here -->
                             <div id= "<?php echo $displayMovie['film_id']; ?>">
                             <?php include '../../Rating_System/Rating_Html.php';?>
                             </div>
                           <!--End of Include Movie Rating HTML Part  -->

                         </div>
                        <?php endforeach; ?>
                    </div>
                 </div>
                <div class="col-lg-4 col-sm-4 col-md-4" style="margin-top: 60px;">
                    <h2 style="text-align: center;margin-right: 40%;">Top Rated</h2>

                    <div class="movie-list row">

                        <div class="col-lg-4 col-sm-4 col-md-4" style="width:70%;">
                            <img alt="film1" src="/Assets/image/TheRevenant.jpg"/>
                        </div>

                     </div>
                        <div class="col-lg-8 col-sm-8 col-md-8">
                            <p>Top 1</p>

                            <p>$ 26.00M</p>

                            <P>Running Time:<span> 1h 48m</span></P>

                            <p>Opening: April 29, 2016</p>
                        </div>
                    <!----------------------------------->
                    <div class="movie-list row">
                        <div class="col-lg-4 col-sm-4 col-md-4" style="width:70%;">
                            <img alt="film1" src="/Assets/image/kongfupanda.jpg"/>
                        </div>

                    </div>
                    <div class="col-lg-8 col-sm-8 col-md-8">
                        <p>Top 2</p>

                        <p>$ 26.00M</p>

                        <P>Running Time:<span> 1h 35m</span></P>

                        <p>Opening: Jan 29, 2016</p>
                    </div>
                </div>

         </section>
     </main>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--    <script src="/Assets/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="/Rating_System/rating.js"></script>
   <!-- <script type="text/javascript" src="/Rating_System/jquery.js"></script>-->
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->


    </body>
</html>