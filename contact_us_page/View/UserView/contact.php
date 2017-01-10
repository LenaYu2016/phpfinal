<?php
use Project\Classes\DB\DB;
include '../../../autoloader.php';
require_once '../../Model/Contactus.php';
require '../../Model/PHP_Mailer/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $Email = htmlspecialchars($_POST['Email']);
    $Message =htmlspecialchars($_POST['Message']);
    $Message = trim($Message);

//===validate the input=========

    $validate = new Contactus();
    $error = $validate->validFname($first_name);

    $error .= $validate->validLastname($last_name);
    $error .= $validate->validEmail($Email);
    $error .= $validate->validMessagebox($Message);

// ====Validation End here=====

//After submitting form redirect user to main page
if(empty($error))
{
    $success = "Your message has been submitted successfully.";
    //header("Location:contact.php?msg=success");

    $storeUservalue = new Contactus();

    $storeUservalue ->contactProcess();

    // Call the GMail file to sent an Email

    include '../../controller/sentToGmail.php';
}

}

?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>
    <link rel="stylesheet" href="/Assets/css/contactUS.css">
    <title>Contact US</title>
</head>


<body>
<div class="container">
    <?php include '../../../Assets/html/header.php'?>
    <div class="row">
        <div class="col-md-12">
            <img src="/Assets/image/HomePage/contact_slider.jpg" style="height: 290px;">
        </div>
    </div>
  <div class="row">
    <div class="col-md-8">
        <div class="well well-sm">
            <form action="" method="post" name ="contactus" class="form-horizontal">
                <fieldset style="padding-left: 10%;">
                    <legend class="text-center header" style="color: #36A0FF;font-size: 27px;padding: 10px;">Contact Us</legend>

                    <fieldset class="form-group">
                       <!-- <span class="col-md-1 col-md-offset-2 text-center"></span>-->
                        <div class="col-md-8" >
                            <span><?php if(isset($error)) echo $error; ?></span>
                        <label  for ="fname" style ="color:#895fa9;font-size:20px;">First name:</label>
                         <input type="text" name="first_name"  value="<?php if(isset($_POST['first_name'])) echo $first_name; ?>" placeholder="FirstName" class="form-control">
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                    <!--    <span class="col-md-1 col-md-offset-2 text-center"></i></span> -->
                        <div class="col-md-8" >
                            <label  for ="lname" style ="color:#895fa9;font-size:20px;">Last name:</label>
                            <input type="text" name="last_name"  value="<?php if(isset($_POST['last_name'])) echo $last_name; ?>" placeholder="LastName" class="form-control">
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                     <!--   <span class="col-md-1 col-md-offset-2 text-center"></i></span> -->
                        <div class="col-md-8" >
                            <label  for ="email" style ="color:#895fa9;font-size:20px;">Email:</label>
                            <input type="email" name="Email"  value="<?php if(isset($_POST['Email'])) echo $Email; ?>" placeholder="Email" class="form-control">
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                      <!--  <span class="col-md-1 col-md-offset-2 text-center"></i></span> -->
                        <div class="col-md-8">
                            <label  for ="message" style ="color:#895fa9;font-size:20px;">Message:</label>
                            <textarea class="form-control" id="message" name="Message"  placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7">
                                <?php if(isset($_POST['Message'])) echo $Message; ?>
                            </textarea>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">

                        <div class="col-md-8 text-center submit">
                             <input type="submit" name="submit" value="submit" class="btn btn-primary">
                        </div>
                    </fieldset>
                    <br>
                    <div class="col-md-9 text-center">
                    <?php
                    if(isset($success))
                    {
                        echo "<h3 style='color: green;'>".$success."</h3>";

                    }

                    ?>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>

      <div class="col-md-4" style="text-align: center">
          <div class="well well-sm">
             <p style="font-size: 27px;color:#36A0FF;padding: 10px">Address:</p>
             <p>Humber Cinema House</p>
             <p>259 Richmond St W,</p>
             <p> Toronto, ON M5V 3M6</p>
              <p>Phone : 416-222-4444</p>
              <br>
              <div id="map" style="width: 345px;height: 400px;"></div>
          </div>
      </div>
  </div>

</div>
<script type="text/javascript" src="/Assets/js/contactUS.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0AWAWu3zYkpyiw5rCit3F-GwzYRnMb_M&libraries=places&callback=initMap">
</script>


</body>
</html>
