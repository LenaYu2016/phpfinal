<?php
use Project\Classes\DB\DB;
//require_once '../../../autoloader.php';
require_once '../../autoloader.php';
require_once '../../Rating_System/Model/Ratings.php';
require_once '../../Rating_System/database.php';
$db = Database::getDB();
$rating_id = $_POST['rating_id'];     // Get the product data
$updateRating = new Ratings();
$editRatings = $updateRating->editRating($rating_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>
    <title> Edit Ratings Form</title>
</head>
<body>
<div class="container">
    <form action="/admin/editedRating" method="post">
        <fieldset class="form-group">
            <input type="hidden" name="rating_id" value="<?php echo $rating_id; ?>">
        </fieldset>

        <fieldset class="form-group">
            <label>Total Votes :</label>
            <input type="input" name="total_votes" value="<?php echo $editRatings['total_votes']; ?>" />
        </fieldset>

        <fieldset class="form-group">
            <label>Total Ratings :</label>
            <input type="input" name="total_value" value="<?php echo $editRatings['total_value']; ?>"/>
        </fieldset>

        <fieldset class="form-group">
            <label>Used IP :</label>
            <input type="input" name="used_ips" value="<?php echo $editRatings['used_ips']; ?>" />
        </fieldset>

        <fieldset class="form-group">
            <label>Date :</label>
            <input type="input" name="date" value="<?php echo $editRatings['date']; ?>" /><span style="color:red">Date Formate : YYYY-MM-DD</span>
        </fieldset>
        <p>
            <br />
        <fieldset class="form-group">
            <label>&nbsp;</label>
            <input type="submit" value="Update Rating" class="btn btn-primary" />
        </fieldset>
        <br />
    </form>
</div>
</body>
</html>