<html>

<?php

// todo: login firefox, header style


include_once $_SERVER['DOCUMENT_ROOT'] . '/autoloader.php';
?>
<head>
  
  <link href="Assets/css/homepage.css" type="text/css" rel="stylesheet">
  <script src="/Assets/js/homepage.js"></script>

</head>

<body>
<main id="screen">
  <nav>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Assets/html/header.php'; ?>
  </nav>
  <div id="moveText">
    <p>Watch:</p>
    <p><span id="target"></span><span id="cursor">|</span></p>
    <div class="text-center">
      <a href="/booking"><button class="btn btn-primary">Book Ticket</button></a>
    </div>
  </div>
  <div id="movePlaceholder"></div>
</main>

</body>


</html>

