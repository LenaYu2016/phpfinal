$(document).ready(

    function(){

        $("ul li").click(function(event) {
                event.preventDefault();
                $(".table-responsive").empty();
               $("ul li").removeClass("active");
            $(this).addClass("active");
                $.get(
                    'index.php',
            {action:$(this).attr("id")})
            .done(function(data){


         $(".table-responsive").html(data);
            });

        }

        );
      $('.pay').click(function(){
          var orderid=(+$(this).parent().parent().find('td.order span').text());

      });

        $('a.deleteitem').click(function(e){
            e.preventDefault();

            var id=(+$(this).parent().parent().find('td.order span').text());
            console.log(id);
            $.post("index.php",{action:"delete",id:id},function(data){


            });
            $(this).parent().parent().remove();

$('.idhide').each(function(){
    if((+$(this).val())==id){
        $(this).parent().parent().remove();
    }
});


        });

        $('[name="payment"]').click(function(e){

            var phone=$(this).parent().parent().find('[name="phone"]').val();
            var total=$(this).parent().parent().find('[name="pricetotal"]').text();
            var id=(+$(this).parent().parent().find('.order span').text());

            var pattern=/\d{10,}/;

            if(phone.length==0){
                alert("Please enter your phone number!");
                e.preventDefault();
            }else if(!pattern.test(phone)){
                alert("Please enter a valid phone number!");
                e.preventDefault();
            }
        });
    });


