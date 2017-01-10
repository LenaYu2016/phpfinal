
$(document).ready(
    function(){

        var oprice=parseFloat(+$('#op').text());
        var save=parseFloat(+$('#save').text());
        var dp=parseFloat(+$('#dp').text());

        $('#small').click(
            function(){
                $('#op').text(round2(oprice,2));
                $('#save').text(round2(save,2));
                $('#dp').text(round2(dp,2));
            }
        );
        $('#middle').click(
            function(){


                $('#op').text(round2(oprice*1.5,2));
                $('#save').text(round2(save*1.5,2));
                $('#dp').text(round2(dp*1.5,2));
            }
        );
        $('#large').click(
            function(){
                $('#op').text(round2(oprice*2,2));
                $('#save').text(round2(save*2,2));
                $('#dp').text(round2(dp*2,2));
            }
        );
        function round2(number,fractiondigits){
            with(Math){
                return round(number*pow(10,fractiondigits))/pow(10,fractiondigits);
            }
        }
        $("#p").click(function(){
            console.log($('#stock').text());

            if(Math.floor($('#enter').val()) == $('#enter').val()&&$.isNumeric($('#enter').val())
                &&$("#enter").val()<(+$('#stock').text())) {

                $("#enter").val(+$("#enter").val() + (+1));
            }else{
                $("#enter").val(1);
            }
        });
        $("#m").click(function(){
            if(Math.floor($('#enter').val()) == $('#enter').val()&&$.isNumeric($('#enter').val())
                &&$("#enter").val()>1 ) {
                $("#enter").val($("#enter").val() - 1);
            }else{
                $("#enter").val(1);
            }
        });
        $("#enter").focusout(function(){


            if(!(Math.floor($('#enter').val()) == $('#enter').val())||!($.isNumeric($('#enter').val()))||
                $("#enter").val()>(+$('#stock').text())||$("#enter").val()<1){
                $("#enter").val(1);
            }
        });
function change(value){
    if(value==1){
        return "Small";
    }else if(value==2){
        return "Middle";
    }else if(value==3){
        return "Large";
    }
}
        $.getJSON("getComment.php",{id:$('#foodId').val()})
            .done(function(data){

                $("#ac").after(Object.keys(data).length);

              if(Object.keys(data).length!=0) {
                  var good=0;
                  var soso=0;
                  var bad=0;
                  $.each(data, function (index, value) {

                      $("#usercomment").append(
                          '<div class="row" style="border-bottom: solid 1px orange;margin-bottom: 20px;padding-bottom:20px;">' +
                          '<div class="col-md-6 col-sm-8">' +
                          '<p>' + value.Comment + '</p>' +
                          '<div>' + value.Date + '</div>' +
                          '</div>' +
                          '<div class="col-md-2 col-sm-2"><p>Size:'+change(value.Size)+'</p></div>' +
                          '<div class="col-md-2 col-sm-2">Username: ' + value.username + '</div>' +
                          '</div>');

                      if(value.Evaluation=="good"){
                          good++;
                      }else if(value.Evaluation=="soso"){
                          soso++
                      }else if(value.Evaluation=="bad"){
                          bad++;
                      }

                  });
                  $('#good').next().text(good);
                  $('#soso').next().text(soso);
                  $('#bad').next().text(bad);
              }else{

                  $("#usercomment").append("<p><h4>No comment.</h4></p>");
                  $('#good').next().text(0);
                  $('#soso').next().text(0);
                  $('#bad').next().text(0);
              }
              $('#good').on("click",function(){
                   $("#usercomment").empty();
                   $.each(data,function(index,value){

                       if(value.Evaluation=="good"){
                           $("#usercomment").append('<div class="row" style="border-bottom: solid 1px orange;margin-bottom: 20px;padding-bottom:20px;">' +
                               '<div class="col-md-6 col-sm-8">' +
                               '<p>' + value.Comment + '</p>' +
                               '<div>' + value.Date + '</div>' +
                               '</div>' +
                               '<div class="col-md-2 col-sm-2"><p>Size:'+change(value.Size)+'</p></div>' +
                               '<div class="col-md-2 col-sm-2">Username: ' + value.username + '</div>' +
                               '</div>');
                       }
                   });}
                );
                $('#soso').on("click",function(){
                    $("#usercomment").empty();
                    $.each(data,function(index,value){
                        console.log(value.Size);
                        if(value.Evaluation=="soso"){
                            $("#usercomment").append('<div class="row" style="border-bottom: solid 1px orange;margin-bottom: 20px;padding-bottom:20px;">' +
                                '<div class="col-md-6 col-sm-8">' +
                                '<p>' + value.Comment + '</p>' +
                                '<div>' + value.Date + '</div>' +
                                '</div>' +
                                '<div class="col-md-2 col-sm-2"><p>Size:'+change(value.Size)+'</p></div>' +
                                '<div class="col-md-2 col-sm-2">Username: ' + value.username + '</div>' +
                                '</div>');
                        }
                    });}
                );
                $('#bad').on("click",function(){
                    $("#usercomment").empty();
                    $.each(data,function(index,value){

                        if(value.Evaluation=="bad"){
                            $("#usercomment").append('<div class="row" style="border-bottom: solid 1px orange;margin-bottom: 20px;padding-bottom:20px;">' +
                                '<div class="col-md-6 col-sm-8">' +
                                '<p>' + value.Comment + '</p>' +
                                '<div>' + value.Date + '</div>' +
                                '</div>' +
                                '<div class="col-md-2 col-sm-2"><p>Size:'+change(value.Size)+'</p></div>' +
                                '<div class="col-md-2 col-sm-2">Username: ' + value.username + '</div>' +
                                '</div>');
                        }
                    });}
                );
                $('#all').on("click",function(){
                    $("#usercomment").empty();
                    $.each(data,function(index,value){


                            $("#usercomment").append('<div class="row" style="border-bottom: solid 1px orange;margin-bottom: 20px;padding-bottom:20px;">' +
                                '<div class="col-md-6 col-sm-8">' +
                                '<p>' + value.Comment + '</p>' +
                                '<div>' + value.Date + '</div>' +
                                '</div>' +
                                '<div class="col-md-2 col-sm-2"><p>Size:'+change(value.Size)+'</p></div>' +
                                '<div class="col-md-2 col-sm-2">Username: ' + value.username + '</div>' +
                                '</div>');

                    });}
                );
            });
     /*  $('#add').on("click",function(){
           $.post("index.php");
       });*/

                              $('#add').click(function(e){

                                  e.preventDefault();
                      console.log($('#foodId').val());
                                  console.log($("[name='cinema']").val());
                                  console.log($('#enter').val());
                                  console.log($("[name='size']:checked").val());

                                  $.post("index.php",{action:"add",foodId:$('#foodId').val(),quantity:$('#enter').val(),
                                      size:$("[name='size']:checked").val(),cinema:$("[name='cinema']").val()
                                  },function(data){

                                  });
                              });

    }
);