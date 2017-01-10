$(document).ready(
    function(){
        repeat();
 function repeat(){
     $('#checkall').click(function(){
         $('.check').prop("checked",$('#checkall').prop("checked"));
         var checks= $('input:checkbox').not(this).parent().parent().toArray();
         if($(this).prop('checked')==true){
             console.log(checks);
             var total=0;
             $.each(checks,function(index,value){

                 total+= (+$(this).find('.amount span').text());
             });
             $('.navbar-text').find('span').text((total).toFixed(2));
         }else{
             $('.navbar-text').find('span').text((0.00).toFixed(2));
         }
         var x=true;
         $('input:checked').not('#checkall').each(function(){
             var date= $(this).parent().parent().find('td.deliverytime input').val();

             var time= $(this).parent().parent().find('div.timeinput input').val();
             if((!date) || (!time)){
                 x=false;
             }
         });
         if((+$('p.navbar-text span').html()).toFixed(2)=="0.00" || x==false){
             $('#checkout').addClass("disabled");
             $('#checkout').prop('disabled', true);
             $('#checkout').css("background-color","gray");

         }else{
             $('#checkout').removeClass("disabled");
             $('#checkout').prop('disabled', false);
             $('#checkout').css("background-color","salmon");

         }
     });
     /*  function Instock() {

      $.get("../../Food/Food Management/Instock.php",function(){
      $('#foods').html("");
      var phpdoc=$(this);
      $('#foods').append(phpdoc);
      },"php");
      }*!/
      */
     $(".p").click(function(){
         var instock=$(this).next().val();

         if(Math.floor($(this).prev().val()) == $(this).prev().val()&&$.isNumeric($(this).prev().val())
             &&$(this).prev().val()<(+instock)) {

             $(this).prev().val(+$(this).prev().val() + (+1));
         }else{
             $(this).prev().val(1);
         }

         if($(this).parent().parent().parent().find('td input:checkbox').prop('checked')==true) {

             $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                 (+$(this).parent().parent().parent().find('td.amount span').text()));

             $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) +
             ((+$(this).prev().val())*(+$(this).parent().parent().prev().find('div span').text()))).toFixed(2));
         }
         $(this).parent().parent().next().find('span').html("");
         $(this).parent().parent().next().find('span').text(((+$(this).parent().parent().prev().find('span').last().text())*(+$(this).prev().val())).toFixed(2));
         $.get("index.php",{quantity:$(this).prev().val(),action:"updateq",id:$(this).parent().parent().parent().find('input:checkbox').val()});
     });
     $(".m").click(function(){

         if(Math.floor($(this).next().val()) == $(this).next().val()&&$.isNumeric($(this).next().val())
             &&$(this).next().val()>1 ) {
             $(this).next().val($(this).next().val() - 1);
         }else{
             $(this).next().val(1);
         }
         if($(this).parent().parent().parent().find('td input:checkbox').prop('checked')==true) {

             $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                 (+$(this).parent().parent().parent().find('td.amount span').text()));

             $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) +
             ((+$(this).next().val())*(+$(this).parent().parent().prev().find('div span').text()))).toFixed(2));
         }
         $(this).parent().parent().next().find('span').html("");
         $(this).parent().parent().next().find('span').text(((+$(this).parent().parent().prev().find('span').last().text())*(+$(this).next().val())).toFixed(2));
         console.log($(this).next().val());
         console.log($(this).parent().parent().parent().find('input:checkbox').val());
         $.get("index.php",{quantity:$(this).next().val(),action:"updateq",id:$(this).parent().parent().parent().find('input:checkbox').val()},
         function(data){
             console.log(data);
         });
     });
     $(".enter").focusout(function(){
         var instock=$(this).next().next().val();

         if(!(Math.floor($(this).val()) == $(this).val())||!($.isNumeric($(this).val()))||
             $(this).val()>(+instock)||$(this).val()<1){
             $(this).val(1);
         }
         if($(this).parent().parent().parent().find('td input:checkbox').prop('checked')==true) {

             $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                 (+$(this).parent().parent().parent().find('td.amount span').text()));

             $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) +
             ((+$(this).val())*(+$(this).parent().parent().prev().find('div span').text()))).toFixed(2));
         }
         $(this).parent().parent().next().find('span').html("");
         $(this).parent().parent().next().find('span').text(((+$(this).parent().parent().prev().find('span').last().text())*(+$(this).val())).toFixed(2));
         $.get("index.php",{quantity:$(this).val(),action:"updateq",id:$(this).parent().parent().parent().find('input:checkbox').val()});
     });

      $('.cinemas').change(function(){
          $.get("index.php",{cinema:$(this).val(),action:"updatecinema",id:$(this).parent().parent().find('input:checkbox').val()});
      });

     $('.foodsize').change(function(){
         var original=$(this).parent().next().find('input').first().val();
         var current=$(this).parent().next().find('input').last().val();
         var quantity=$(this).parent().parent().find('input.enter').val();

         if($(this).find('option:selected').text()=="Small"){

             $.get("index.php",{size:1,action:"update",id:$(this).parent().parent().find('input:checkbox').val()});
             $(this).parent().next().find('span').first().text(round2((+original),2));
             $(this).parent().next().find('span').last().text(round2((+current),2));
             if($(this).parent().parent().find('td input:checkbox').prop('checked')==true) {

                 $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                     (+$(this).parent().parent().find('td.amount span').text()));
                 console.log($('.navbar-text').find('span').text());
                 $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) + ((+current) * (+quantity))).toFixed(2));
             }
             $(this).parent().parent().find('td.amount span').text(((+current)*(+quantity)).toFixed(2));

         }else if($(this).find('option:selected').text()=="Middle"){
             $.get("index.php",{size:2,action:"update",id:$(this).parent().parent().find('input:checkbox').val()},
             function(data){
                 console.log(data);
             });
             $(this).parent().next().find('span').first().text(round2((+original)*1.5,2));
             $(this).parent().next().find('span').last().text(round2((+current)*1.5,2));
             if($(this).parent().parent().find('td input:checkbox').prop('checked')==true) {

                 $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                     (+$(this).parent().parent().find('td.amount span').text()));
                 console.log($('.navbar-text').find('span').text());
                 $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) + ((+current) * (+quantity)*1.5)).toFixed(2));
             }
             $(this).parent().parent().find('td.amount span').text(((+current)*(+quantity)*1.5).toFixed(2));

         }else if($(this).find('option:selected').text()=="Large"){
             $.get("index.php",{size:3,action:"update",id:$(this).parent().parent().find('input:checkbox').val()});
             $(this).parent().next().find('span').first().text(round2((+original)*2,2));
             $(this).parent().next().find('span').last().text(round2((+current)*2,2));
             if($(this).parent().parent().find('td input:checkbox').prop('checked')==true) {

                 $('.navbar-text').find('span').text((+$('.navbar-text').find('span').text())-
                     (+$(this).parent().parent().find('td.amount span').text()));
                 console.log($('.navbar-text').find('span').text());
                 $('.navbar-text').find('span').text(((+$('.navbar-text').find('span').text()) + ((+current) * (+quantity)*2)).toFixed(2));
             }
             $(this).parent().parent().find('td.amount span').text(((+current)*(+quantity)*2).toFixed(2));

         }


     });
     function round2(number,fractiondigits){
         with(Math){
             return round(number*pow(10,fractiondigits))/pow(10,fractiondigits);
         }
     }
     $('input:checkbox').not('#checkall').click(
         function(){


             if($(this).prop("checked")==true){

                 $('.navbar-text').find('span').text( ((+$('.navbar-text').find('span').text())+
                 (+$(this).parent().parent().find('.amount span').text())).toFixed(2));
             }else{
                 $('#checkall').prop("checked",false);
                 $('.navbar-text').find('span').text( ((+$('.navbar-text').find('span').text())-
                 (+$(this).parent().parent().find('.amount span').text())).toFixed(2));
             }
             var x=true;
             $('input:checked').not('#checkall').each(function(){
                 var date= $(this).parent().parent().find('td.deliverytime input').val();

                 var time= $(this).parent().parent().find('div.timeinput input').val();
                 if((!date) || (!time)){
                     x=false;
                 }
             });
             console.log($('p.navbar-text span').html());
             if((+$('p.navbar-text span').html()).toFixed(2)=="0.00"|| x==false){
                 $('#checkout').addClass("disabled");
                 $('#checkout').prop('disabled', true);
                 $('#checkout').css("background-color","gray");
             }else{
                 $('#checkout').removeClass("disabled");
                 $('#checkout').prop('disabled', false);
                 $('#checkout').css("background-color","salmon");
             }
         }
     );

     $("[name='delete']").click(
         function(e){
             e.preventDefault();


             $.post("index.php",{action:"delete",id:$(this).prev().val()});
             if($(this).parent().parent().find('.check').prop("checked")==true) {
                 $('.navbar-text span').text(
                     ((+$('.navbar-text span').text()) -
                     (+$(this).parent().parent().find('.amount span').text())).toFixed(2));
             }

             $(this).parent().parent().remove();
         }
     );

 }
    $('#lowstock').click(
        function(e){

            e.preventDefault();
            $('#checkout').addClass("disabled");
            $('#checkout').css("background-color","gray");
            $('div.menu ul.nav li').removeClass('active');
            $(this).addClass('active');
           $('#foods table').remove();
            $('div p.navbar-text span').html((0).toFixed(2));
            $.get("index.php",{action:"stock"},function(data){
               $('#foods').html(data);
                repeat();

                dateandtime();
        });
}
);
        $('#selectall').click(
            function(e){

                e.preventDefault();
                $('#checkout').addClass("disabled");
                $('#checkout').css("background-color","gray");
                $('div.menu ul.nav li').removeClass('active');
                $(this).addClass('active');
                $('#foods table').remove();
                $('div p.navbar-text span').html((0).toFixed(2));
                $.get("index.php",{action:"all"},function(data){
                    $('#foods').html(data);

                    repeat();

                    dateandtime();
                });
            }
        );
        $('#reduction').click(
            function(e){

                e.preventDefault();
                $('#checkout').addClass("disabled");
                $('#checkout').css("background-color","gray");
                $('div.menu ul.nav li').removeClass('active');
                $(this).addClass('active');
                $('#foods table').remove();
                $('div p.navbar-text span').html((0).toFixed(2));
                $.get("index.php",{action:"reduction"},function(data){
                    $('#foods').html(data);

                    repeat();

                    dateandtime();
                });
            }
        );
        $('#history').click(function(e){


            $('.navbottom li').removeClass("active");
            $(this).addClass("active");
            $('#bottomcontent').empty();
            $.get("index.php",{action:"history"},function(data){
                console.log(data);
                $('#bottomcontent').html(data);
            });
        });
        $('#guess').click(function(e){


            $('.navbottom li').removeClass("active");
            $(this).addClass("active");
            $('#bottomcontent').empty();
            $.get("index.php",{action:"guess"},function(data){

                $('#bottomcontent').html(data);
            });
        });

            $('#checkout').addClass("disabled");
        $('#checkout').prop('disabled', true);
        $('#checkout').css("background-color","gray");
        $('#checkout').click(
            function(e){
                e.preventDefault();

                var orders=[];
    var x=true;
                $('input:checked').not('#checkall').each(function(){


                    console.log($(this).val());
                   var date= $(this).parent().parent().find('td.deliverytime input').val();
                    console.log(date);
                    var time= $(this).parent().parent().find('div.timeinput input').val();
                    var amount= (+$(this).parent().parent().find('td.amount span').text());
                    var price=(+$(this).parent().parent().find('td .current span').text());
                    console.log(price);

                    if((!date) || (!time)){
                        x=false;
                        return false;
                    }else{
                    var order=[$(this).val(),date,time,amount,price];
                    orders.push(order);
                }});

                if(x==true) {
                    $.post("../order_management/index.php", {
                        check: "checkout",
                        info: orders,
                        total: (+$('div p.navbar-text span').html())
                    }).done(function () {
                        window.location.href = "../order_management/index.php";
                    });
                }
            }
        );

dateandtime();
        function dateandtime(){
            $('input[type="date"]').bind("change",function(){
                var x=true;

                $('input:checked').not('#checkall').each(function(){
                    var date= $(this).parent().parent().find('td.deliverytime input').val();

                    var time= $(this).parent().parent().find('div.timeinput input').val();

                    if((!date) || (!time)){
                        x=false;
                    }
                });
                console.log(x);
                console.log($(this).parent().parent().find('input:checkbox').is(':checked'));
                if(x==false||!($(this).parent().parent().find('input:checkbox').is(':checked'))){
                    $('#checkout').addClass("disabled");
                    $('#checkout').prop('disabled', true);
                    $('#checkout').css("background-color","gray");
                }else{
                    $('#checkout').removeClass("disabled");
                    $('#checkout').prop('disabled', false);
                    $('#checkout').css("background-color","salmon");
                }

            });
            $('input[type="time"]').bind("change",function(){
                var x=true;
                $('input:checked').not('#checkall').each(function(){
                    var date= $(this).parent().parent().find('td.deliverytime input').val();
                    console.log(!date);
                    var time= $(this).parent().parent().find('div.timeinput input').val();
                    console.log(!time);
                    if((!date) || (!time)){
                        x=false;
                    }
                });
                console.log(x);
                console.log($(this).parent().parent().find('input:checkbox'));
                if(x==false ||!($(this).parent().parent().parent().find('input:checkbox').is(':checked'))){
                    $('#checkout').addClass("disabled");
                    $('#checkout').prop('disabled', true);
                    $('#checkout').css("background-color","gray");
                }else{
                    $('#checkout').removeClass("disabled");
                    $('#checkout').prop('disabled', false);
                    $('#checkout').css("background-color","salmon");
                }

            });
        }
}
);