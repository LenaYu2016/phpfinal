<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../Assets/js/jquery.min.js" ></script>
    <script src="../../Assets/js/bootstrap.min.js" ></script>
    <script src="../../Assets/js/Food/food_payment.js"></script>
    <link href="../../Assets/css/bootstrap.min.css" rel="stylesheet" />
    </head>
<p style="font-size: large;font-family: Calibri;font-weight: 700;margin: 20px;">Total price is <span><?php echo $total;?></span>. Do you want to pay?</p>
<?php
include '../../autoloader.php';
\Project\Classes\Helper::startSession();
use Project\Payment\Payment;

$total=(string)(((float)$total)*100);

            $_SESSION['grandPrice'] = $total;
            // Create a pay with stripe button on page.
            // Pass in the amount needs to be paid.
      ?>
<input type="hidden" value="<?php echo $id;?>" name="id">
<input type="hidden" value="<?php echo $phone;?>" name="phone">
<a href="index.php"><button class="btn btn-info" style="float: left;margin-right: 30px;margin-left:30px;">Back</button></a>
<a><?php echo Payment::stripeButton();?></a>