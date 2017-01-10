
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
        <div class="col-lg-12">
            <img alt="pic" src="/booking/image/slide.jpg" class="img-responsive image-center"/>
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
                <p class="none-step">STEP-3</p>

            </div>
        </div>
            <form method="post" action="./index.php">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <p>Please select your preferred movie languages and we will create your personalized movie calendar.</p>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <ul class="list-unstyled">
                            <li><button id="allMovies" class="btn btn-default btn-calender" type="button">ALL MOVIES</button></li>
                            <li><button id="EnglishMovies" class="btn btn-default btn-calender" type="button">ENGLISH</button></li>
                            <li><button id="ChineseMovies" class="btn btn-default btn-calender" type="button">CHINESE</button></li>
                        </ul>
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9">

                            <input type="hidden" name="route" value="SendCalender/index">
                            <div class="movieName nicescroll-cursors">
                            <ul id="filmList" class="list-unstyled">
                                <?php foreach($calender as $filmCalender):?>
                                <li class="movieList">

                                    <input type="checkbox" name="<?php echo "$filmCalender->Film_Name/$filmCalender->Run_Date/$filmCalender->Run_Time/$filmCalender->Film_Id"?>" class="film-list" value="<?php echo $filmCalender->Film_Id?>" checked/>
                                    <label for="<?php echo $filmCalender->Film_Name?>" class="checked"><?php echo $filmCalender->Film_Name?></label>
                                    <small>[<?php echo $filmCalender->Run_Date?>]</small>
                                    <span class="time-float"><?php echo $filmCalender->Run_Time?></span>

                                </li>
                                <?php endforeach?>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="submit" class="moviedem-submit">Continue to next step<span><img src="/booking/image/btn-arrow.png" class="btn-arrow"/></span></button>
            </div>
        </div>
            </form>

    </div>
    </div>
</main>
<?php require_once "../Assets/html/footer.php"?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Booking/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../Assets/js/Calender/customerCalender.js"></script>
</body>
</html> 