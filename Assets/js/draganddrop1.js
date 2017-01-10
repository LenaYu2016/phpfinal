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
            getMousePosition();
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
function getMousePosition() {
        var $imageArea = $(".Tshirt");
        var $logo = globalVar.$logoElement;
        $logo.mousedown(
                function(){
                    $imageArea.on("mousemove", function () {
                        var msg = event.pageX + ", " + event.pageY;
                        console.log(msg);
                    });
                }
        );
    
        $logo.mouseup(
                function(){
                    $imageArea.off("mousemove");
                }
        );
    
}

function getClikMousePosition(){
    
}
    
copyElement();

/*
    refrashImage Position
*/

//function refrashImage(){
//    
//    globalVar.$logoId.css(
//            {
//                "top": globalVar.x,
//                "left": globalVar.y
//            }
//        );
//}





