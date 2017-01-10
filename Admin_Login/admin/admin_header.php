
        <div class="row" id ="header">
                <div class="col-md-10" style="text-align: center;padding:10px;" class="logo">
                        <a href="#" id="headText">Welcome to admin page</a>
                </div>
                <div class="col-md-2">
                        <div id="login"></div>
                        <script src="/Assets/js/adminButton.js"></script>

                </div>
        </div>
        <div class="row">
                <div class="col-md-2" id="sidebar">
                        <?php use Project\Classes\Router\Nav;
                        Nav::drawMenu('admin'); ?>
                        <script>
                                $(document).ready(function() {
                                        $(window).resize(function() {
                                                var bodyheight = $(this).height();
                                                $("#sidebar").height(bodyheight);
                                        }).resize();
                                });
                        </script>
                </div>

