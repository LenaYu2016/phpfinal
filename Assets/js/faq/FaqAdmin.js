/**
 * Created by ran on 4/24/2016.
 */
function init(){
    formValidation();
    //getEditText();
}

/**
 * Create Faq Form validation
 *
 *
 */

function formValidation(){
    $("form").submit(
        function(event){
          if($("#questions").val()=="" ||$("#category").val() =="" || $("#upfile").val()=="") {
              $("#error").html("all fields are required !!!");
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