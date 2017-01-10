$(document).ready(
    function(){
        $('.rating > span').css("cursor","pointer");
        var mark;
        $('.rating > span').click(function(){
            $('.rating > span').removeClass('changed');

            $(this).addClass('changed');
            $(this).nextAll().addClass('changed');

            mark=5-$(this).index();
        });
        $('form').submit(function(e){
            e.preventDefault();
            var action=$(this).prev().val();
            var id=$(this).prev().prev().val();
            var orderitemid=$(this).prev().prev().prev().val();
            var file=$('[type="file"]').val();
            var satisfaction=$('[name="satisfaction"]').val();
            var comment=$('[name="comment"]').val();
            console.log(satisfaction);
            console.log(mark);
            if(satisfaction==null||mark ==null){
                alert("Please choose Mark or Satisfaction!");
            }else {
                $.post("index.php", {
                        mark: mark,
                        orderitemid: orderitemid,
                        action: action,
                        foodid: id,
                        file: file,
                        satisfaction: satisfaction,
                        comment: comment
                    },
                    function (data) {
                        $(this).unbind('submit').submit();
                        //  window.location.href="../order_management/index.php";
                    });

                 /*$.ajax({
                 url: "index.php", // Url to which the request is send
                 type: "POST",             // Type of request to be send, called as method
                 data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                 contentType: false,       // The content type used when sending data to the server.
                 cache: false,             // To unable request pages to be cached
                 processData:false,        // To send DOMDocument or non processed data file it is set to false
                 success: function(data)   // A function to be called if request succeeds
                 {
                 alert("suceess");
                 }
                 });*/


            }
        });

    }
);
