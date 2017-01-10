function init(){
    /*copy design logo */
   copyElement();
    /*change T-shirt */
   changeTshirt();
    /*clear selected logo*/
   clear();
    
    seatMap();
}

function copyElement(){
   
   $(".logo-list .dragImage").click(
        function(){
            var $logoElement=$(this).clone();
            
            $logoElement.addClass("ImageResize").appendTo(".Tshirt"); 
            
            $logoElement.resizable();
        }
    );
    
    getMousePosition();
}


function getMousePosition(){
    var $TshirtArea = $(".Tshirt");
    $TshirtArea.on('mousedown','.ImageResize', 
                   function(event){
                        $(this).addClass('draggable').parents().on('mousemove', function(e){
                            $('.draggable').offset({
                                    top: e.pageY - $('.draggable').outerHeight() / 2,
                                    left: e.pageX - $('.draggable').outerWidth() / 2
                            }).on('mouseup', function(){
                                $(this).removeClass('draggable');
                            });
                        });
                        event.preventDefault();
                   }).on('mouseup', function() {
        $('.draggable').removeClass('draggable');
    });
};


function clear(){
    $("#btn-concal").click(
        function(){
            //alert();
            $(".Tshirt .ImageResize").remove();
        }
    );
}

function changeTshirt(){
    $(".tshirt img").click(
        function(){ 
           var attr=$(this).attr('src');
           $(".Tshirt .TshirtImg").attr("src",attr);
        }
    );
}

function seatMap(){
    $(".click").click(
        function(){
          var $seat = $("#seat");
          $seat.show().animate({top:"10px"}, "fast", function(){
              $(".shadow").animate({opacity:"0.4"},"slow");
          });
        }
    );
    
    $(".concal").click(
        function(){
          var $seat = $("#seat");
          $seat.animate({top:"-1000px"}, "fast", function(){
              $(".shadow").animate({opacity:"1"},"slow");
          });
        }
    );
}

init();


