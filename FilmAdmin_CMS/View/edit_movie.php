<?php
use Project\Classes\DB\DB;
//require_once '../Model/Filmadmin.php';
require_once '../../FilmAdmin_CMS/Model/Filmadmin.php';
include '../../autoloader.php';
$db = DB::getDB();
$film_id = $_POST['film_id'];       // Get the product data
$updateMovie = new Filmadmin();
$editMovies = $updateMovie->editMovie($film_id);
?>
<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="/Assets/css/style.css"/>-->

    <title> Edit Movie Form</title>
</head>
  <boby>
    <div class="container">
        <form action="/FilmAdmin_CMS/controller/update_movie.php" method="post" enctype="multipart/form-data">
            <fieldset class="form-group">
            <input type="hidden" name="film_id" value="<?php echo $film_id; ?>">
            </fieldset>

            <fieldset class="form-group">
            <label>Title :</label>
            <input type="input" name="title" value="<?php echo $editMovies['title']; ?>" />
            </fieldset>

            <fieldset class="form-group">
            <label>Release Date :</label>
            <input type="input" name="releaseDate" value="<?php echo $editMovies['releaseDate']; ?>"/> <span style="color:red">Date Formate : YYYY-MM-DD</span>
            </fieldset>

            <fieldset class="form-group">
            <label>Director :</label>
            <input type="input" name="director" value="<?php echo $editMovies['director']; ?>" />
            </fieldset>

            <fieldset class="form-group">
            <label>Stars: :</label>
            <textarea  name="cast" > <?php echo $editMovies['cast']; ?> </textarea>
            </fieldset>

            <br />
            <fieldset class="form-group">
            <img src = "<?php echo $editMovies['img']; ?>" /><br/><p>
            <label>Image :</label>
            <input type="file" name="img1" id = "image" />
            </fieldset>
            <p>
                <p>
            <br />
            <fieldset class="form-group">
            <label>&nbsp;</label>
            <input type="submit" value="Update Movie" class="btn btn-primary" />
            </fieldset>
            <br />
        </form>
    </div>
  </boby>
</html>
