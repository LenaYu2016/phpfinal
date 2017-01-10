
 $(document).ready(function()
 {
    $('.ratings_stars').hover(

            // Handles the mouseover

            function()
            {
                $(this).prevAll().andSelf().addClass('ratings_over');

            },

            // Handles the mouseout

            function() {

                $(this).prevAll().andSelf().removeClass('ratings_over');

            }

        );
//send ajax request to rate.php when you click on any star of the movie ..bind the new class with id and make as parent class
        $('.ratings_stars').bind('click', function() {
			
			var id = $(this).parent().attr("id");
		    var numberClass = $(this).attr("class");
            var poststar="id="+id+"&stars="+numberClass;
		$.ajax({url:"/Rating_System/rate.php",cache:0,data:poststar,success:function(result){
   document.getElementById(id).innerHTML=result;}
   });	
		});

 
        });

        
