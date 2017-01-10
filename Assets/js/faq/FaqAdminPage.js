/**
 * Created by ran on 4/24/2016.
 */
function init(){
    alertDelete();
}

/**
 * FAQ Admin page delete alert
 *
 */

function alertDelete(){
    $(".delete").click(function(event){
        var check = confirm("are you sure you want to delete?");
        if(check==false){
            event.preventDefault();
        }
    });
}

init();