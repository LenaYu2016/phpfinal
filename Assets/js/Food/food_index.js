$(document).ready(
    function () {
        display();

        $('button.dropdown').hover(function() {
            alert("123");
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
        $.getJSON("Food Management/food_init.php")
            .done(function (data) {
                var pages = Math.ceil(Object.keys(data).length / 12);
                console.log(pages);
                var rest = Object.keys(data).length % 12;

                $.each(data,function(index,value){

                    $('#listchosen').append('<option value="'+value.Food_Name+'"></option>');

                });

                if($(".menu nav li").last().prev().attr("class")=="active"){
                    $(".menu nav li").last().addClass("disabled");

                }else{
                    $(".menu nav li").last().removeClass("disabled");
                }
               $(".menu nav li").last().on("click",function(){
if($(this).attr("class")!="disabled"){
    $(".menu .row").empty();
    $.each(data, function (key, value) {


        $html = '<div class="col-xs-12 col-sm-6 col-md-3">' +
            '<form action="Food Management/index.php" method="get">'+
            '<div href="#" class="thumbnail">' +
            '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
            '<button type="button" class="btn btn-default plus btn-sm">' +
            '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
            '</button>' +
            '<p class="food_title">' + value.Food_Name + '</p>'+
            '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

            + '</div>' +
            '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

            '</div>';

        if (key>=((pages-1)*12)) {
            $(".menu .row").append($html);

            display();

        }


    });
    addtocart();
    $(".menu nav li").removeClass("active");
    $(this).prev().addClass("active");
    $(".menu nav li").first().removeClass("disabled");

}
               });

                $(".menu nav li").first().on("click",function(){
                    if($(this).attr("class")!="disabled"){
                        $(".menu .row").empty();
                        $.each(data, function (key, value) {


                            $html = '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                '<form action="Food Management/index.php" method="get">'+
                                '<div href="#" class="thumbnail">' +
                                '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                '<button type="button" class="btn btn-default plus btn-sm">' +
                                '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                '</button>' +
                                '<p class="food_title">' + value.Food_Name + '</p>'+
                                '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                + '</div>' +
                                '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                '</div>';

                            if (key<12) {
                                $(".menu .row").append($html);

                                display();

                            }

                        });
                        addtocart();
                        $(".menu nav li").removeClass("active");
                        $(this).next().addClass("active");
                        $(".menu nav li").last().removeClass("disabled");
                        $(this).addClass("disabled");

                    }

                });

                $(".pagination li").on("click", function () {
                    if ($(this).find("span span").html() == "(current)") {
                        $(".pagination li").removeClass("active");
                        $(this).addClass("active");
                        $(".menu .row").empty();

                        if ($(this).clone().find("span span").remove().end().find("span").text() != "1") {
                            $(".pagination li").first().removeClass("disabled");
                        } else {
                            $(".pagination li").first().addClass("disabled");
                        }
                        var x = ($(this).clone().find("span span").remove().end().find("span").text() - 1) * 12;

                        $.each(data, function (key, value) {


                            $html =  '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                '<form action="Food Management/index.php" method="get">'+
                                '<div href="#" class="thumbnail">' +
                                '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                '<button type="button" class="btn btn-default plus btn-sm">' +
                                '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                '</button>' +
                                '<p class="food_title">' + value.Food_Name + '</p>'+
                                '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                + '</div>' +
                                '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                '</div>';

                            if (key >= x && key < (x + 12)) {
                                $(".menu .row").append($html);

                                display();

                            }
                        });
                        addtocart();
                    }
                    if($(".menu nav li").last().prev().attr("class")=="active"){
                        $(".menu nav li").last().addClass("disabled");

                    }else{
                        $(".menu nav li").last().removeClass("disabled");
                    }

                });
            });
        $("#MainMenu a").click(
            function (e) {
                e.preventDefault();
                $(".menu .row").html("");
                $(".menu nav").remove();

                $.getJSON('index.php', {page: $(this).attr("id")})
                    .done(function (data) {
                        var pages = Math.ceil(Object.keys(data).length / 12);

                        var rest = Object.keys(data).length % 12;
                        if($(".menu nav").find("li[class='active']").clone().
                            find("span span").remove().end().find("span").text()==pages){
                            $(".menu nav li").last().addClass("disabled");
                        }else{
                            $(".menu nav li").last().removeClass("disabled");
                        }

                        $html2 = '<nav class="col-md-offset-4 col-sm-offset-4 col-xs-offset-12 col-md-10 col-sm-8">' +
                            '<ul class="pagination">' +
                            '<li class="disabled">' +
                            '<span>' +
                            '<span aria-hidden="true">&laquo;</span>' +
                            '</span>' +
                            '</li>' + '<li>' +
                            '<span>' +
                            '<span aria-hidden="true">&raquo;</span>' +
                            '</span>' +
                            '</li>' +
                            '</ul>' +
                            '</nav>';
                        $.each(data, function (index, value) {
                            $html = '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                    '<form action="Food Management/index.php" method="get">'+
                                '<div href="#" class="thumbnail">' +
                                '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                '<button type="button" class="btn btn-default plus btn-sm">' +
                                '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                '</button>' +
                                '<p class="food_title">' + value.Food_Name + '</p>'+
                                '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                + '</div>' +
                            '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                '</div>';
                            if (index < 12) {
                                $(".menu .row").append($html);

                            }

                            display();

                        });
                        addtocart();
                        $(".menu").append($html2);
                        for (var i = pages; i > 0; i--) {
                            if (i == 1) {
                                $(".menu nav ul li").first().after('<li class="active">' +
                                    '<span>' + i + '<span class="sr-only">(current)</span>' + '</span>' +
                                    '</li>');
                            } else {
                                $(".menu nav ul li").first().after('<li class="">' +
                                    '<span>' + i + '<span class="sr-only">(current)</span>' + '</span>' +
                                    '</li>');
                            }
                        }
                        if($(".menu nav li").last().prev().attr("class")=="active"){
                            $(".menu nav li").last().addClass("disabled");

                        }else{
                            $(".menu nav li").last().removeClass("disabled");
                        }
                        $(".menu nav li").last().on("click",function(){
                            if($(this).attr("class")!="disabled"){
                                $(".menu .row").empty();
                                $.each(data, function (key, value) {


                                    $html =  '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                        '<form action="Food Management/index.php" method="get">'+
                                        '<div href="#" class="thumbnail">' +
                                        '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                        '<button type="button" class="btn btn-default plus btn-sm">' +
                                        '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                        '</button>' +
                                        '<p class="food_title">' + value.Food_Name + '</p>'+
                                        '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                        + '</div>' +
                                        '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                        '</div>';

                                    if (key>=((pages-1)*12)) {
                                        $(".menu .row").append($html);

                                        display();

                                    }

                                });
                                addtocart();
                                $(".menu nav li").removeClass("active");
                                $(this).prev().addClass("active");
                                $(".menu nav li").first().removeClass("disabled");

                            }
                        });
                        $(".menu nav li").first().on("click",function(){
                            if($(this).attr("class")!="disabled"){
                                $(".menu .row").empty();
                                $.each(data, function (key, value) {


                                    $html = '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                        '<form action="Food Management/index.php" method="get">'+
                                        '<div href="#" class="thumbnail">' +
                                        '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                        '<button type="button" class="btn btn-default plus btn-sm">' +
                                        '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                        '</button>' +
                                        '<p class="food_title">' + value.Food_Name + '</p>'+
                                        '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                        + '</div>' +
                                        '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                        '</div>';

                                    if (key<12) {
                                        $(".menu .row").append($html);

                                        display();

                                    }

                                });
                                addtocart();
                                $(".menu nav li").removeClass("active");
                                $(this).next().addClass("active");
                                $(".menu nav li").last().removeClass("disabled");
                                $(this).addClass("disabled");
                            }
                        });
                        $(".pagination li").on("click", function () {
                            if ($(this).find("span span").html() == "(current)") {
                                $(".menu .row").empty();
                                $(".pagination li").removeClass("active");
                                $(this).addClass("active");

                                if ($(this).clone().find("span span").remove().end().find("span").text() != "1") {
                                    $(".pagination li").first().removeClass("disabled");
                                } else {
                                    $(".pagination li").first().addClass("disabled");
                                }
                                var x = ($(this).clone().find("span span").remove().end().find("span").text() - 1) * 12;

                                $.each(data, function (key, value) {
                                    $html = '<div class="col-xs-12 col-sm-6 col-md-3">' +
                                        '<form action="Food Management/index.php" method="get">'+
                                        '<div href="#" class="thumbnail">' +
                                        '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                                        '<button type="button" class="btn btn-default plus btn-sm">' +
                                        '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                                        '</button>' +
                                        '<p class="food_title">' + value.Food_Name + '</p>'+
                                        '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                                        + '</div>' +
                                        '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                                        '</div>';
                                    if (key >= x && key < (x + 12)) {
                                        $(".menu .row").append($html);

                                        display();

                                    }
                                });
                                addtocart();
                            }
                                if($(".menu nav li").last().prev().attr("class")=="active"){
                                    $(".menu nav li").last().addClass("disabled");

                                }else{
                                    $(".menu nav li").last().removeClass("disabled");
                                }
                            if($(this).clone().find("span span").remove().end().find("span").text() == pages){
                                $(this).next().addClass("disabled");
                            }
                        }
                        );

                    });
            }
        );
    $('#search').keydown(function(e){
        var key = e.which;
        if(key==13) {
            e.preventDefault();
            $.getJSON("index.php", {search:$(this).val()},function (data) {
                $(".menu .row").empty();
                $('.menu nav').remove();

                if(Object.keys(data).length==0){

                    $(".menu .row").append('<p style="font-weight: 800;font-size:20px;">'+$('#search').val()+" is not found.</p>");
                }else{
                $.each(data, function (key, value) {
                    $html =  '<div class="col-xs-12 col-sm-6 col-md-3">' +
                        '<form action="Food Management/index.php" method="get">'+
                        '<div href="#" class="thumbnail">' +
                        '<img src="../Assets/image/food/' + value.Food_Image + '" alt="..." class="">' +
                        '<button type="button" class="btn btn-default plus btn-sm">' +
                        '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                        '</button>' +
                        '<p class="food_title">' + value.Food_Name + '</p>'+
                        '<button type="submit" class="btn btn-default btn-sm view">View Detail</button>'

                        + '</div>' +
                        '<input type="hidden" name="id" value="'+value.Food_id+'"/>'+'</form>'+

                        '</div>';

                    $(".menu .row").append($html);

                    display();

                 }); addtocart();
                    }

            });
        }
    });
        addtocart();
        $('#goorder').click(function(e){
            e.preventDefault();

            $.get("index.php",{action:"userlogin"},function(data){

                if(data==false){

                    window.login.show();
                }else{
                    window.location.href="order_management/index.php";
                }
            });
        });
        $('#goshop').click(function(e){
            e.preventDefault();

            $.get("index.php",{action:"userlogin"},function(data){

                if(data==false){

                    window.login.show();
                }else{
                    window.location.href="FoodShoppingcartManagement/index.php";
                }
            });
        });
function addtocart(){

    $('button.plus').click(function(){


        var id=$(this).parent().next().val();
        console.log($(this).parent().next().val());
        $.get("index.php",{foodid:id,action:"plus"},function(data){
            if(data==0){
                window.login.show();
            }else{
                alert("Add to cart successfully!");
            }
        });
    });
}
        function display() {
            $(".menu .plus").hover(
                function () {
                    $(this).prev().css('opacity', '0.5');
                    $(this).next().css("position", "absolute");
                    $(this).next().css("top", "12%");
                    $(this).next().css("left", "32%");
                    $(this).css("position", "absolute");
                    $(this).css("top", "65%");
                    $(this).css("left", "70%");
                    $(this).next().next().css("position", "absolute");
                    $(this).next().next().css("top", "40%");
                    $(this).next().next().css("left", "35%");
                }, function () {
                }
            );
            $(".menu .food_title").hover(
                function () {
                    $(this).prev().prev().css('opacity', '0.5');
                    $(this).css("position", "absolute");
                    $(this).css("top", "12%");
                    $(this).css("left", "32%");
                    $(this).prev().css("position", "absolute");
                    $(this).prev().css("top", "65%");
                    $(this).prev().css("left", "70%");
                    $(this).next().css("position", "absolute");
                    $(this).next().css("top", "40%");
                    $(this).next().css("left", "35%");
                }, function () {
                }
            );
            $(".menu img").hover(
                function () {
                    $(this).css('opacity', '0.5');
                    $(this).next().css("position", "absolute");
                    $(this).next().css("top", "65%");
                    $(this).next().css("left", "70%");
                    $(this).next().next().next().css("position", "absolute");
                    $(this).next().next().next().css("top", "40%");
                    $(this).next().next().next().css("left", "35%");

                }, function () {
                    $(this).css('opacity', '1');
                    $(this).next().css("position", "absolute");
                    $(this).next().css("top", "-10000");
                    $(this).next().next().next().css("position", "absolute");
                    $(this).next().next().next().css("top", "-10000");
                }
            );
            $(".menu img").hover(
                function () {
                    $(this).next().next().css("position", "absolute");
                    $(this).next().next().css("top", "12%");
                    $(this).next().next().css("left", "32%");
                },
                function () {
                    $(this).next().next().css("position", "absolute");
                    $(this).next().next().css("top", "-10000");
                }
            );
            $('.glyphicon-plus').hover(
                function () {
                    $(this).parent().css("position", "absolute");
                    $(this).parent().css("top", "65%");
                    $(this).parent().css("left", "70%");
                    $(this).parent().next().css("position", "absolute");
                    $(this).parent().next().css("top", "12%");
                    $(this).parent().next().css("left", "32%");
                }
            );
            $('.view').hover(
                function () {
                    $(this).css("position", "absolute");
                    $(this).css("top", "40%");
                    $(this).css("left", "35%");
                    $(this).prev().prev().prev().css('opacity', '0.5');
                    $(this).prev().prev().css("position", "absolute");
                    $(this).prev().prev().css("top", "65%");
                    $(this).prev().prev().css("left", "70%");
                    $(this).prev().css("position", "absolute");
                    $(this).prev().css("top", "12%");
                    $(this).prev().css("left", "32%");
                }
            );
        }

    }
);
