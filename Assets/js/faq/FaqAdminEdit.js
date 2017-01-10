/**
 * Created by ran on 4/25/2016.
 */
/**
 * Created by ran on 4/24/2016.
 */
function init(){
    formValidation();
    //getEditText();
}

/**
 * Edit page form validation
 *
 *
 */

function formValidation(){
    $("form").submit(
        function(event){
            if($("#questions").val()=="" ||$("#category").val() =="" ||$("#editor1").val()=="") {
                $("#error").html("question and category fields are required !!!");
                event.preventDefault();
            }
        });
}

//function getEditText(){
//    var data = $("iframe").contents().find("body");
//
//    console.log(data);
//}

init();