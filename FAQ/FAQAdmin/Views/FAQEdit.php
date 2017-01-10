<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 10:41 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FAQ</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/faq/FAQ.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="/FAQ/FAQAdmin/ckeditor/ckeditor.js"></script>


</head>

<body>
<div id="main" class="container">
    <h2>FAQ Admin</h2>
    <form role="form" method="post" action="faq" enctype="multipart/form-data" id="createFAQ">
        <input type="hidden" name="route" value ="FAQAdminController/EditFAQPost"/>
        <input type="hidden" name="clickrate" value="<?php echo $fileInfo[1]?>"/>
        <div class="form-horizontal">
            <?php echo $editFAQForm ?>
            <div class="form-group">
                <label>Edit Answer:</label>
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                        <?php echo $fileInfo[0]?>
                </textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'editor1' );
                </script>
            </div>

            <div class="col-md-12">
                <input type="submit" value="Save" class="btn btn-default">
                <a href="./faq" class="btn btn-default">Cancel</a>
            </div>
        </div>
        <span class="field-validation-valid text-danger" id="error"><?php echo $error?></span>
    </form>

</div>
<div class="container">

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Assets/js/faq/FaqAdminEdit.js"></script>
</body>

</html>
























