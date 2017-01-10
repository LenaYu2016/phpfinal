$(document).ready(

    function(){

        $("ul li").click(function(event) {
                event.preventDefault();
                $(".table-responsive").empty();
               $("ul li").removeClass("active");
            $(this).addClass("active");
                $.get(
                    'index.php',
            {action:$(this).attr("id")})
            .done(function(data){


         $(".table-responsive").html(data);
            });

        }

        );


    });


