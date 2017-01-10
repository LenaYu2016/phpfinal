<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Assets/css/style.css"/>

    <title> Add Movie Form</title>
</head>
  <boby>
    <div class="container">
        <form action="/FilmAdmin_CMS/controller/add_movie.php" method="post" enctype="multipart/form-data">
            <fieldset class="form-group">
            <input type="hidden" name="film_id" value="<?php echo $film_id; ?>">
            </fieldset>

            <fieldset class="form-group">
            <label>Title :</label>
            <input type="input" name="title" />
            </fieldset>


            <fieldset class="form-group">
            <label>Release Date :</label>
            <input type="input" name="releaseDate"/> <span style="color:red">Date Formate : YYYY-MM-DD</span>
            </fieldset>


            <fieldset class="form-group">
            <label>Director :</label>
            <input type="input" name="director" />
            </fieldset>


            <fieldset class="form-group">
            <label>Stars: :</label>
            <textarea  name="cast" >  </textarea>
            </fieldset>

            <fieldset class="form-group">
            <label>Image :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?=$max_file_size;?>" />
            <input type="file" name="img1" />
            </fieldset>
            <br/>
            <label>&nbsp;</label>
            <input type="submit" value="Add Movie" name="submit" class="btn btn-primary" />
            <br />
        </form>
    </div>
  </boby>
</html>