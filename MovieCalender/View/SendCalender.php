
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Assets/css/Calendar/moiveCalender.css"/>
    <title>Homepage</title>
</head>


<body>
<?php require_once "../Assets/html/header.php"?>
<section id="slider" class="container-fluid">
    <h2 class="hidden">slide show</h2>
    <div class="row">
        <div class="col-lg-12 no-padding">
            <img alt="pic" src="../../Booking/image/slide.jpg" class="img-responsive image-center"/>
        </div>
    </div>
</section>

<main id="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="moiveCalender">Moive Calender</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4>Block The Date For Your Favorite Movies!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 introduction">
                <p>Now you can block your calendar with release dates of upcoming movies and that too according to your language preference!</p>
            </div>
        </div>
        <div class="bg-calender-form">
        <div class="row bg-calender-form">
            <div class="col-lg-4 col-md-4 col-sm-4 ">

                <p class="select-step">STEP-1</p>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 ">
                <p class="select-step">STEP-2</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 ">
               <p class="select-step">STEP-3</p>
            </div>
        </div>
        <div class="row">
            <p class="col-lg-12">You've selected most Anticipated movies to be added to your personalized Movie Calendar</p>
        </div>
        <form>

        <div class="row">
            <div class="col-lg-12">

                <a class="moviedem-submit" href="./index.php?route=SendCalender/BuildMessageAndSend">Send to you by email<span><img src="../../Booking/image/btn-arrow.png" class="btn-arrow"/></span></a>
            </div>
        </div>

        </form>
    </div>

</main>
<?php require_once "../Assets/html/footer.php"?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script type="text/javascript" src="../Assets/js/Calender/sendCalender.js"></script>
</body>
</html> 