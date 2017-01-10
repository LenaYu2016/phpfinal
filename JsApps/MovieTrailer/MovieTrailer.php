<?php

namespace Project\JsApps\MovieTrailer;


class MovieTrailer {
  public function __construct($movieName) {
    $this->name = $movieName . 'trailer';
    echo '<div id="trailerApp"></div>';
    $this->setTrailerName();
  }

  private function setTrailerName() {
    echo "
    <script>
      window.onload = function() {
        var form = document.forms['trailerSearchForm'];
        form.style.display = 'none';
        form['movieName'].value = '" . $this->name . "';
        form['submit'].click();
      }
    </script>";
  }


}