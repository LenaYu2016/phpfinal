<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TrailerApp example</title>
</head>
<body>
  <?php
  include "../../autoloader.php";
  $movieName = 'kung fu panda';
  new \Project\JsApps\MovieTrailer\MovieTrailer($movieName)
  ?>


  <!-- need jQuery -->
  <script src="/Assets/js/jquery.min.js"></script>
  <!-- trailer app js -->
  <script src="/Assets/js/trailerApp.js"></script>
</body>
</html>