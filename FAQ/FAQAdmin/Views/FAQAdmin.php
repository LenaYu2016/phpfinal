<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 1:34 PM
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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php require_once "../../Assets/html/header.php"?>
<div id="main" class="container">
    <h2>FAQ Admin</h2>
    <form role="form" method="get" action="">
        <div class="form-group">
            <input type="hidden" class="form-control" name="route" value="FAQAdminController/CreateFAQ">
            <button type="submit" class="btn btn-default">Create New FAQ</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <?php echo $QuestionTableTitles?>
        </tr>
        </thead>
        <tbody>
            <?php echo $allRows?>
        </tbody>
    </table>

</div>

<?php require_once "../../Assets/html/footer.php"?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../Assets/js/faq/FaqAdminPage.js"></script>
</body>

</html>
