<?php
use Project\Classes\DB\DB;
include '../../autoloader.php';
//require_once '../Model/Contactus.php';
require_once '../../contact_us_page/Model/Contactus.php';
$sel_record = $_POST['sel_record'];
$editValues = new Contactus();
$editResult = $editValues->editForm($sel_record);
?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>

    <title> Modified contacts</title>
</head>
    <boby>
        <div class="container">
                <form method ="post" action ="/admin/editedContact">
                    <fieldset class="form-group">
                    <input type ="hidden" name = "id" value=" <?php echo $sel_record; ?> "/>
                    </fieldset>
                    <fieldset class="form-group">
                        <div>
                            <label for ="firstname">First name</label>
                            <input type='text' name ="firstname" value =" <?php echo $editResult['first_name']; ?> "/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div>
                            <label for ="lastname">Last name</label>
                            <input type='text' name ="lastname" value ="<?php echo $editResult['last_name']; ?> "/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div>
                            <label for ="email">Email</label>
                            <input type='text' name ="email" value ="<?php echo $editResult['Email']; ?> "/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div>
                            <label for ="message">Message</label>
                            <textarea class="form-control"  name ="message" rows="3" style="width: 25%;">
                                <?php echo $editResult['Message']; ?>
                            </textarea>
                        </div>
                    </fieldset>
                        <br/>

                        <div id ="mysubmit">
                            <input type ="submit" name = "submit" value ="Modify record"  class="btn btn-primary"/>
                        </div>
                </form>
        </div>

    </boby>
</html>

