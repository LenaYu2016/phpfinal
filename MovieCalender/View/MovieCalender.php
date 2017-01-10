
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
            <img alt="pic" src="../../booking/image/slide.jpg" class="img-responsive image-center"/>
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
        <div class="row bg-calender-form">
            <form method="post" action=".">
                <input type="hidden" name="route" value="CustomerCalender/index"/>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <p class="select-step">STEP-1</p>
                    <div class="form-group">
                        <input type="text" name="name" value="" placeholder="Name" class="form-control"/>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <p class="none-step">STEP-2</p>
                    <div class="form-group">
                        <input type="text" name="phone" value="" placeholder="Mobile Number" class="form-control"/>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 ">
                   <p class="none-step">STEP-3</p>
                    <div class="form-group">
                        <input type="text" name="email" value="" placeholder="Email Address" class="form-control"/>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="moviedem-submit">Continue to next step<span><img src="../../booking/image/btn-arrow.png" class="btn-arrow"/></span></button>
                    <?php if(isset($error)):?>
                        <div class="row">
                            <div class="col-lg-12 error"><?php echo $error?></div>
                        </div>
                    <?php endif?>
                </div>
            </form>
        </div>

    </div>

</main>
<?php require_once "../Assets/html/footer.php"?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

</body>
</html> 