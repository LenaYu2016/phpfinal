<?php include $_SERVER['DOCUMENT_ROOT'] . '/autoloader.php'?>


<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../Assets/css/booking/confirm.css"/>
        <title>Comfirm</title>
    </head>
        
    
    <body>
    <!--seat map-->

    <div style="height:70px">
        <?php require_once "../Assets/html/header.php"?>
    </div>
    <section id="film-banner" class="container-fluid">
            <h1>Hi <?php echo $_SESSION['user']['username'] ?> You film is ready to pay</h1>
    </section>
     <main>
         <section id="booking-detail" class="container">
            <div class="row">
               <!-- Ticket Detail Parts-->
                <div class="col-gl-8 col-md-8 col-sm-12 ticket-booking">
                 <h2>TICKET BOOKING DETAIL</h2>
                    <?php $i=0;?>
                 <?php foreach ($cart->shoppingCart->data as $item):?>


                    <div class="row">
                     <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                         Movie Name<span>:</span>
                     </div>
                     
                     <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                         <?php echo $item->Film_Name?>
                     </div> 
                 </div>
                 
                 <div class="row">
                     <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                         Cinema<span>:</span>
                     </div>
                     
                     <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                         <?php echo $item->Cinema?>
                     </div> 
                 </div>
                 
                  <div class="row">
                     <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                         Room<span>:</span>
                     </div>
                     
                     <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                         <?php echo $item->Room?>
                     </div> 
                 </div>
                 
                  <div class="row">
                     <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                         Seat(s)<span>:</span>
                     </div>
                     
                     <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                         <?php echo $item->Seats?>
                     </div> 
                 </div>
                 
                  <div class="row">
                     <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                         Date & Show Time<span>:</span>
                     </div>
                     
                     <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                         <?php echo $item->Run_Time?>
                     </div> 
                 </div>

                    <div class="row">
                        <div class="col-gl-5 col-md-5 col-sm-12 detail-row">
                            Cinema Address<span>:</span>
                        </div>

                        <div class="col-gl-7 col-md-7 col-sm-12 detail-row">
                            <?php echo $item->Cinema_Address?>
                        </div>
                    </div>
                     <div class="row">
                         <form method="post" action="./index.php">
                             <input type="hidden" name="route" value="DetailController/editItems/<?php echo $i?>"/>
                         <button type="submit" class="btn btn-default btn-booking">Edit</button>
                         <button type="button" class="btn btn-default btn-booking delete" value="<?php echo $i?>">Delete</button>
                         <?php $i++; ?>
                         </form>
                     </div>
                <?php endforeach; ?>

                 <!--Begin of Design part -->

                </div>

                <div class="col-lg-4 col-sm-12 col-md-4">
                    <h2>ORDER SUMMARY</h2>
                    <table class="table booking-table">
                        <thead>
                            <tr>
                                <th>Movie Ticket</th>
                            </tr>
                        </thead>

                        <tbody id="orderTable">
                        <?php $i=0; $grandPrice="";?>
                        <?php foreach($cart->shoppingCart->data as $item):?>
                        <?php  $i++;?>
                        <?php $grandPrice+= $item->TotalPrice;?>

                            <tr>
                                <td>Item Number:</td>
                                <td><?php echo $i?></td>
                            </tr>
                            <tr>
                                <td>Ticket Cost(s)</td>
                                <td>$<?php echo $item->Price?></td>
                            </tr>
                            
                            <tr >
                                <td>Service Tax</td>
                                <td>$<?php echo $item->Tax?></td>
                            </tr>
                            
                              <tr id="total">
                                <td>Total</td>
                                <td>$<?php echo $item->TotalPrice?></td>
                              </tr>

                        <?php endforeach?>
                              <tr>
                                  <td>GRAND TOTAL</td>
                                  <td>$<?php echo $grandPrice?></td>
                              </tr>

                                <tr>
                                    <td colspan="2">
                                        <a href="./index.php">ADD OTHER FILMS</a>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <a href="./index.php?route=DetailController/sessionExpired">CANCEL</a>
                                    </td>
                                </tr>

                        </tbody>

                        
                    </table>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo \Project\Payment\Payment::stripeButton() ?>
                        </div>
                    </div>
                </div>
            </div>
             <div class="timer timer-pay"></div>
         </section>

    </main>
    <?php require_once "../Assets/html/footer.php"?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="../Assets/js/booking/confirm.js"></script>
    </body>
</html> 