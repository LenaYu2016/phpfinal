<?php ?>
<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../Assets/css/booking/chooseSeat.css"/>
        <link rel="stylesheet" href="../Assets/css/booking/booking.css"/>

        <title>Booking</title>
    </head>


    <body>
   <div style="height:70px">
        <?php require_once "../Assets/html/header.php"?>
   </div>


<main>
     <section id="seat" class="container max-space">
      <!--film name -->

       <div class="row">
          <div class="col-lg-12 title">
           <h1><?php echo $filmInfo[0]->Film_Name?> <img class="concal" src="./image/seat-close.png"/></h1>
           
          </div> 
       </div>
         <form method="post" action=".">
             <input type="hidden" name="route" value="DetailController/index"/>
             <input id="bookingInfo" type="hidden" name="OrderInfo" value=""/>
             <input id="seatsNums" type="hidden" name="seatsNums" value=""/>
             <input id="itemId" type="hidden" name="itemId" value="<?php if(isset($item_id)):?>
                <?php echo $item_id?>
                <?php endif ?>
             "/>
             <input id="ticket-price" type="hidden" name="price" value="<?php echo $filmInfo[0]->Price_Full?>"/>
             <input id="total-price" type="hidden" name="totalPrice" value=""/>
             <div id="seatsJson" style="display:none"><?php if(isset($SeatsInfos)):?>
                     <?php echo $SeatsInfos?>
                 <?php endif ?></div>

       <!--film information-->
       <div class="row">
           <div class="col-lg-12">
               <p id="OrderInfo"></p>
           </div>
           
       </div>
       
       <div class="row select-seats">
           <div class="col-sm-7">
               <p>Please select your seats <img alt="arr_pic" src="./image/screen-arr.png"/><span id="choosen_seats">
                       <?php if(isset($ErrorMessage)):?>
                       <?php echo $ErrorMessage?>
                       <?php endif?>
                   </span></p>
           </div>
           
           <div class="col-sm-3">
               <p>Total: $<span id="price"></span></p>
           </div>
           
           <div class="col-sm-2">
               <button type="submit" class="btn btn-default btn-booking">CHECKOUT<img alt="arr pic" src="./image/btn-arrow.png"/></button>
           </div>
       </div>
       <!--seats map-->
       <div class="row">
           <div class="col-sm-8 seat-layout">
               <table>
                   <thead>
                      <tr>
                       <th colspan="12">Seats Map</th>
                      </tr>
                   </thead>
                   
                   <tbody id="seatsMap">

                   </tbody>
                  <tfoot>
                      <tr>
                          <td colspan="12">SCREEN THIS WAY <span><img src="./image/screen-arr.png"/></span></td>
                      </tr>
                  </tfoot>
               </table>
           </div>
           
           <div class="col-sm-4 explain-role" >
               <div><span class="sold-out"></span>Sold Out</div>
               <div><span class="current-selection"></span>Current selection</div>
           </div>
       </div> 
    </section>

     <div class="shadow">

      <section id="film-banner" class="container-fluid click">
            <h1 id="film-title">
                <?php if(isset($filmInfo[0]) && !isset($item)):?>
                <?php echo $filmInfo[0]->Film_Name?>
                <?php endif?>

                <?php if(isset($item)):?>
                    <?php echo $item->Film_Name?>
                <?php endif?>
            </h1>
      </section>
      
      <section id="film-info" class="container">

              <div class="row">
                <?php if(isset($filmId)):?>
                <input id="filmId" type="hidden" name="filmId" value="<?php echo $filmId?>" />
                <?php endif?>

                  <?php if(isset($item)):?>
                  <input id="filmId" type="hidden" name="filmId" value="<?php echo $item->FilmId?>" />
                  <?php endif?>

                 <div class="col-sm-4">
                         <label for="film">Select Cinema:</label>
                         <select name="Cinema" class="cinemaNum">
                             <option value="defult" >select an option</option>
                             <?php if(isset($CinemaInfos)):?>
                             <?php foreach($CinemaInfos as $CinemaInfo):?>
                             <option value="<?php echo $CinemaInfo->Cinema_ID?>"><?php echo $CinemaInfo->Cinema_Name?></option>
                             <?php endforeach; ?>
                             <?php endif?>

                             <?php if(isset($item)):?>
                             <option value="<?php echo $item->Cinema_ID?>" selected><?php echo $item->Cinema?></option>
                             <?php endif?>
                         </select>
                 </div>
              
                 <div class="col-sm-4">
                             <label for="film">Select Room:</label>
                         <select id="Rooms">
                             <option value="defult" >select an option</option>
                             <?php if(isset($item)):?>
                                 <option value="<?php echo $item->Room_ID?>" selected><?php echo $item->Room?></option>
                             <?php endif?>
                         </select>

                 </div>



                  <div class="col-sm-4">

                           <label for="Date">Select &nbsp;&nbsp;Date:</label>
                            <select id="Date">
                                <option value="defult" >select an option</option>
                                <?php if(isset($item)): ?>
                                    <option value="<?php echo $item->Room_ID?>" selected><?php echo $item->showDate?></option>
                                <?php endif?>
                            </select>

                    </div>


          </div>

              <div class="row">
                   <div class="col-sm-12 show-time">

                        <label for="time">Show timings:</label>

                            <div class="btn-group" id="showTime">
                                <?php if(isset($TimeInfos)):?>
                                    <?php foreach($TimeInfos as $time):?>
                                        <?php if($time->RunTime == $item->showTime):?>
                                        <button id="selected" type="button" class="btn btn-time
                                         <?php if(isset($seatsLoadArray)):?>
                                         <?php echo $seatsLoadArray[$item->showTime]?>
                                         <?php endif?>
                                        "><?php echo $time->RunTime?> </button>
                                        <?php endif?>

                                        <?php if($time->RunTime != $item->showTime):?>
                                            <button type="button" class="btn btn-time
                                            <?php if(isset($seatsLoadArray)):?>
                                         <?php echo $seatsLoadArray[$time->RunTime]?>
                                         <?php endif?>
                                            "><?php echo $time->RunTime?> </button>
                                        <?php endif?>
                                    <?php endforeach; ?>
                                <?php endif?>
                            </div>

                   </div>
                </div>

              <div class="row">
                   <div class="col-sm-12 Legend">
                        
                        <p>
                        <label for="time">Legend:</label>
                            <span class="available">Available</span>
                            <span class="filling">Filling up Fast</span>
                            <span class="sold-out">Sold Out</span>

                        </p>
                   </div>
                </div>

              <div class="row">
                    <div class="col-sm-12 btn-submit">
<!--                        <button id="booking" type="submit" class="btn btn-default btn-booking">Confirm</button>-->
                        <a href="." class="btn btn-default btn-booking">Cancel</a>
                    </div>
                </div>

          </form>
                  
      </section>
      
      <section id="film-detail" class="container">
         <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-line">
                 <img src="<?php echo $filmInfo[0]->Film_pic?>"/>
             </div>
             
             <div class="col-lg-9 col-sm-9 col-md-9 col-xs-6 col-line">
                 <h3><?php echo $filmInfo[0]->Film_Name?></h3>
               <?php
                new \Project\JsApps\MovieTrailer\MovieTrailer($filmInfo[0]->Film_Name)
               ?>
                 <div class="row movdet">
                     <div class="col-lg-4 col-sm-4 col-md-4">
                         Release Date
                     </div>
                     
                     <div class="col-lg-8 col-sm-8 col-md-8">
                         <span>:</span><?php echo $filmInfo[0]->Film_Time?>
                     </div>
                 </div>

                 <div class="row movdet">
                      <div class="col-lg-4 col-sm-4 col-md-4">
                         Director
                     </div>
                     
                     <div class="col-lg-8 col-sm-8 col-md-8">
                         <span>:</span><?php echo $filmInfo[0]->Film_Director?>
                     </div>
                 </div>
                 <div class="row movdet">
                      <div class="col-lg-4 col-sm-4 col-md-4">
                         Cast & Crew
                     </div>
                     
                     <div class="col-lg-8 col-sm-8 col-md-8">
                         <span>:</span><?php echo $filmInfo[0]->Film_Actor?>
                     </div>
                 </div>
                 <div class="row movdet">
                      <div class="col-lg-4 col-sm-4 col-md-4">
                         Duration
                     </div>
                     
                     <div class="col-lg-8 col-sm-8 col-md-8">
                         <span>:</span><?php echo $filmInfo[0]->Film_length?>

                     </div>
                 </div>
             </div>
         </div>
          
      </section>
      
      <section id="film-intro" class="container">
         
          <p class="row">
          <span>Film Discription</span><?php echo $filmInfo[0]->filmDisc?>
          </p>
      </section>
         <?php require_once "../Assets/html/footer.php"?>
      </div>
</main>


          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="/Assets/js/trailerApp.js"></script>
   <script src="../Assets/js/booking/booking.js"></script>

    </body>
</html> 