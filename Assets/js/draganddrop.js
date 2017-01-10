var globalVar ={
    $logoElement : "",
    $position:""
}
/*
    copy a logo in T-Shirt;
*/

function copyElement(){
   
   $(".logo-list .dragImage").click(
        function(){
            globalVar.$logoElement=$(this).clone();
            globalVar.$logoElement.addClass("ImageResize").appendTo(".Tshirt"); 
            
        }
    );
}
/*
get Image position
*/
function getPosition(element){
    globalVar.$position = element.position();
    console.log(globalVar.$position.left);
    console.log(globalVar.$position.top);
}

/*
get Mouse position
*/

function draggableImage() {
    $(".Tshirt").on('mousedown', ".ImageResize",
        function () {
            $(this).addClass('draggable').parents().on('mousemove', function (e) {
                $('.draggable').offset({
                    top: e.pageY - $('.draggable').outerHeight() / 2,
                    left: e.pageX - $('.draggable').outerWidth() / 2
                }).on('mouseup', function () {
                    $(this).removeClass('draggable');
                });
            });
            //e.preventDefault();
        }).on('mouseup', function () {
        $('.draggable').removeClass('draggable');
    });
}

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

copyElement();
draggableImage();
clear();
changeTshirt();




