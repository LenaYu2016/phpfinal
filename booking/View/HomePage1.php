
<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Assets/css/booking/slick.css"/>
        <link rel="stylesheet" href="../Assets/css/booking/style.css"/>

        <title>Homepage</title>
    </head>


    <body>
    <?php require_once "../Assets/html/header.php"?>

        <section id="slider" class="container-fluid">
           <h2 class=hidden>slide show</h2>
           <div class="row">
            <div class="slides">
                <img alt="pic" src="./image/slide.jpg"/>
            </div>
            </div>
        </section>
         
         <main id="main-content">
         <section  class="container">
            <div class="row">
             <div class="col-lg-8 col-sm-8 col-md-8">
                    <div class="row">
                         <ul class="nav nav-tabs home-tab">
                             <li class="showing_now">Now Showing</li>
                           		
                              <img class="slick-next" src="./image/ic_arrwnext.png"/>
    						 <img class="slick-prev" src="./image/ic_arrwprev.png"/>
                                                 
                         </ul>
                         
                    </div>
                 
                    <div class="row film-gallery slick-test">
                       <?php foreach ($filmInfo as $film):?>

                             <div class="film-container col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                 <img alt="film1" src='<?php echo $film->Film_pic?>'/>
                                 <p class="film-title"><?php echo $film->Film_Name?></p>
                                 <p class="film-detail">
                                     Stars:
                                     <span><?php echo $film->Film_Actor?></span><br>
                                     Director:
                                     <span><?php echo $film->Film_Director?></span>
                                 </p>

                                 <form method="get" action=".">
                                 <input type="hidden" name="route" value="HomePageController/postToBooking/<?php echo $film->Film_Id?>"/>
                                 <button type="submit" class="btn btn-default btn-booking">Book Now</button>
                                 </form>
                             </div>
                       <?php endforeach; ?>
                    </div>
             </div>
             <div class="col-lg-4 col-sm-4 col-md-4 ">
                   <div class="booking-form">
                    <h2>Book Tickets</h2>
                     <form action="./index.php" method="post" >
                         <input type="hidden" name="route" value="HomePageController/toBookingPage"/>
                         <input id="filmInfo" type="hidden" name="filmInfo" value="" />
                        <div class="form-space">
                                 <select class="films" name="movie">
                                     <option value ="default">Select Movie</option>
                                     <?php foreach ($filmInfo as $film):?>
                                     <option value ="<?php echo $film->Film_Id?>"><?php echo $film->Film_Name?></option>
                                     <?php endforeach;?>
                                 </select>  
                        </div>  

                        <div class="form-space">
                             <select id="Cinemas" name="Cinema">
                                 <option value ="default">Select Cinema</option>

                             </select>
                         </div>

                         <div class="form-space">
                             <select id="Rooms" name="Room">
                             <option value ="default">Select Room</option>

                             </select>
                         </div>

                         <div class="form-space">
                             <select id="Date" name="Date">
                                 <option value ="default">Select Date</option>

                             </select>
                         </div>

                         <div class="form-space">
                             <select id="showTime" name="Time">
                                 <option value ="default">Select Time</option>

                             </select>
                         </div>

                             <button id="submitbooking" type="submit" class="btn btn-default btn-booking">Book Now
                             <img  alt="arrow pic" class="btn-arrow" src="./image/btn-arrow.png"/>
                         </button>
                     </form>
                    <?php if(isset($_GET["error"])):?>
                    <div id="error"><?php echo $_GET["error"]?></div>
                    <?php endif?>
                 </div> 
                 
                  <div class="about-us">
                      <h2>ABOUT US</h2>
                      <p>PVR's Director's Cut®, the luxury arm of PVR Cinemas, blends the best in high-end hospitality and entertainment.</p>
                  </div> 
             </div>
             </div>
             
             
         </section>
         
         <section id="top-movie" class="container">
             <h2>Top rated</h2>
             <?php for($i=0; $i<count($filmRate); $i++):?>
             <?php if($i==4){
                     break;
                 } ?>
             <?php if($i%2==0):?>
             <div class="movie-list row">
             <?php endif;?>

                     <div class="col-sm-3 col-xs-7">
                         <img alt="film1" src='<?php echo $filmRate[$i]->Film_pic ?>'/>
                     </div>

                     <div class="col-sm-3 col-xs-5">
                         
                         <h3><img src="./image/arrow-highlight.png"/><?php echo $filmRate[$i]->Film_Name ?></h3>
                         <p>Top <?php $k=$i+1; echo $k?></p>
                         <p>Click Rate:<?php echo $filmRate[$i]->filmClickNum ?></p>
                         <P>Running Time:<span><?php echo $filmRate[$i]->Film_length?></span></P>
                         <p>Opening:<?php echo $filmRate[$i]->Film_Time?></p>
                     </div>
                 <?php if($i%2==1):?>
             </div>
                 <?php endif;?>
             <?php endfor;?>
             

         </section>
         </main>

    <?php require_once "../Assets/html/footer.php"?>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script type="text/javascript" src="../Assets/js/booking/slick.min.js"></script>
    <script type="text/javascript" src="../Assets/js/booking/homepage.js"></script>
    <script type="text/javascript" src="../Assets/js/booking/home.js"></script>
    </body>
</html> 