/*function Instock(){

}*/
$(document).ready(

function(){
    $('#checkall').click(function(){
        $('.check').prop("checked",$('#checkall').prop("checked"));
    });
    function Instock() {

        $.get("../../Food/Food Management/Instock.php",function(){
            $('#foods').html("");
            var phpdoc=$(this);
            $('#foods').append(phpdoc);
        },"php");
    }
}
);