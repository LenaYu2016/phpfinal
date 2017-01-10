/**
 * Created by ran on 3/11/2016.
 */
function init() {
    //get seats

    seatMap();
    getRooms();
    getDate();
    getRuntime();
    selectSeats();
    updateSeats();
   forceLogin();
}
/**
 * create seat map
 */
function seatMap(){
    $(document).on("click", ".btn-time",

        function(){
           // console.log($("#Date"));
            var showTime = $.trim($(this).text());
            var CinemaID =$(".cinemaNum").val();
            var roomId = $("#Rooms").val();
            var roomName = $( "#Rooms option:selected" ).text();
            var showDate = $( "#Date option:selected" ).text();
            var Time = showDate+' '+showTime+':00';
            var url = "./index.php?route=BookingController/chooseSeats/"+roomId+'/'+Time+'/'+CinemaID;
            console.log(url);
            $.get(url,function(data, status){

                var obj = JSON.parse(data);
                var address = obj.pop();
                console.log(obj);
                console.log(address);
                var filmName = $("#film-title").text();
                var CinemaName = $( ".cinemaNum option:selected" ).text();
                var address = address[0];
                createSeatMap(filmName, CinemaName, address,obj,Time,roomName,showDate,showTime)

            });
            var $seat = $("#seat");

            $seat.show().animate({top:"10px"}, "fast", function(){
                $(".shadow").animate({opacity:"0.4"},"slow");
            });
        }
    );

    $(".concal").click(
        function(){
            var $seat = $("#seat");
            $seat.animate({top:"-1000px"}, "fast", function(){
                $(".shadow").animate({opacity:"1"},"slow");
                $("#choosen_seats").html('');
                $("#price").html('');
                $("#seatsJson").html('');
            });
        }
    );
}
/*
get room id when dropdownList make a change.
 */

function getRooms(){

    $(".cinemaNum").change(function(){
        var cinemaId = $(this).val();
        var filmId = $("#filmId").val();
        var url = "/booking/index.php?route=BookingController/chooseRoom/"+filmId+'/'+cinemaId;
        console.log(url);
        $.get(url,function(data, status){
            console.log(data);
           var obj = JSON.parse(data);
            createDropDownListRoom(obj);

        });

    });
}
/*
get the film data;
 */
function getDate(){

    $("#Rooms").change(function(){

        var cinemaId = $(".cinemaNum").val();
        var roomId = $(this).val();
        var filmId = $("#filmId").val();
        var url = "./index.php?route=BookingController/chooseDate/"+filmId+'/'+cinemaId+'/'+roomId;
        console.log(url);
        $.get(url,function(data, status){
            // console.log(data);
            var obj = JSON.parse(data);
            createDropDownListDate(obj);

        });

    });
}

/**
 *
 * get film run time
 */

function getRuntime(){

    $("#Date").change(function(){

        var cinemaId = $(".cinemaNum").val();
        var roomId = $(this).val();
        var filmId = $("#filmId").val();
        var runDate = $("#Date option:selected").text();
        var url = "./index.php?route=BookingController/chooseTime/"+filmId+'/'+cinemaId+'/'+roomId+'/'+runDate;
        console.log(url);
        $.get(url,function(data, status){
             console.log(data);
             var obj = JSON.parse(data);
            createButtonListShowTime(obj);

        });

    });
}

/**
 * create Room Drop Down List
 *
 * @param obj
 */

function createDropDownListRoom(obj){
    var strRoom="<option value="+'"'+"defualt"+'"'+">"+"select an option"+"</option>";
    var strDate="<option value="+'"'+"defualt"+'"'+">"+"select an option"+"</option>";
   // console.log(obj);
    for(var i=0; i<obj.length; i++){
        console.log(obj[i]);
        strRoom+="<option value="+'"'+obj[i].Room_ID+'"'+">"+obj[i].Room_Name+"</option>";
    }
   // console.log(str);
    $("#Rooms").html(strRoom);
    $("#Date").html(strDate);
    $('#showTime').html('');
}

/*
Create DropDownList for Date
 */
function createDropDownListDate(obj){
    var str="<option value="+'"'+"defualt"+'"'+">"+"select an option"+"</option>";
    //console.log(obj);
    for(var i=0; i<obj.length; i++){
        console.log(obj[i]);
        str+="<option value="+'"'+obj[i].Room_ID+'"'+">"+obj[i].RunDate+"</option>";
    }
    //console.log(str);
    $("#Date").html(str);
    $('#showTime').html('');

}

/*
Create show time button in booking page.
 */

function createButtonListShowTime(obj){
    var strButton="";
    //console.log(obj);
    for(var i=0; i<obj.length; i++){
        console.log(obj[i]);
            strButton += "<button type=" + '"' + "button" + '"' + " class=" + '"' + 'btn' + ' btn-time ' +obj[i].seatsRate+'"' + ">" + obj[i].RunTime + "</button>";

    }
   // console.log(strButton);
    $("#showTime").html(strButton);
   // console.log($("#booking"));
}

/*
    createSeatMap
 */
function createSeatMap(filmName, CinemaName,address,obj,Time,roomName,showDate,showTime){

    var roomId = $("#Rooms").val();
    var orderInfo = Time +'| '+filmName+"| "+CinemaName+"| "+roomName+"| "+address.Cinema_Address;
    var order = Time +'| '+filmName+"| "+CinemaName+"| "+roomName+"| "+address.Cinema_Address+"| "+roomId+"| "+showDate+"| "+showTime;
    console.log(order);
    $("#bookingInfo").val(order);

    $("#OrderInfo").html(orderInfo);
    //get rows
    if($("#seatsJson").html()=='') {
        var rows = [];
        for (var i = 0; i < obj.length; i++) {
            var reg = /\D*/;

            console.log(obj[i]);
            var str = obj[i].Seat_Name;
            str = reg.exec(str);
            rows[i] = str[0];
        }
    }else {
        obj = JSON.parse( $("#seatsJson").html());
        console.log(obj);
        var rows = [];
        for (var i = 0; i < obj.length; i++) {
            var reg = /\D*/;

            console.log(obj[i]);
            var str = obj[i].Seat_Name;
            str = reg.exec(str);
            rows[i] = str[0];
        }
    }
    //console.log(rows);
    var row=[];
    $.each(rows, function(i, el){
        if($.inArray(el, row) === -1) row.push(el);
    });
    var colNum =5;
     createSeats(row,colNum,obj);


}
/**
 * create seats by row colMum and seats info
 *
 *
 * @param rows
 * @param colNum
 * @param obj
 */
function createSeats(rows,colNum, obj){
    var j=0;
    var str="";
    var seatsEdit = $('#seatsEdit').html();
    seatsEdit = $.trim(seatsEdit);
    for(var i=0; i<rows.length; i++){
        str+="<tr id="+"'"+rows[i]+"'"+">"+
                "<td><em>"+rows[i]+"</em></td>"


        for(var k=j; k<colNum; k++){
            console.log(seatsEdit);
            //console.log(obj[k].Seat_Name);
            //console.log(seatsEdit.indexOf(obj[k].Seat_Name));
            if(obj[k].available==='Y'){
                str+="<td class="+"'"+"avalible"+"'"+">" +"<span class="+"'"+"seat"+"'"+">"
                +"<input type="+"'"+"checkbox"+"'"+" id="+"'"+obj[k].Seat_Name+"'"+">"
                +"<label for="+"'"+obj[k].Seat_Name+"'"+">"+"</label>"
                +"</span>"
                +"</td>";
            }

            if(obj[k].available==='N'){
                str+="<td class="+"'"+"disable"+"'"+">" +"<span class="+"'"+"seat"+"'"+">"
                    +"<input type="+"'"+"checkbox"+"'"+" id="+"'"+obj[k].Seat_Name+"'"+" disabled>"
                    +"<label for="+"'"+obj[k].Seat_Name+"'"+">"+"</label>"
                    +"</span>"
                    +"</td>";
            }

        }
        j=colNum;
        colNum+=colNum;
        str+="</tr>";
    }

    $("#seatsMap").html(str);
}

/**
 * when customer choose seats change css in booking page
 *
 */

function selectSeats(){
    //var $selector = $(".seat").children("input[type=checkbox]");
    //$selector.click();
    $("#seatsMap").on("click","input:checkbox", function(){

        $(this).parent().parent().toggleClass("current");
        var idArr = $("#seatsMap").find('input[type="checkbox"]:checked').map(function(i, el) { return $(el).attr("id"); }).get();
        var seatsNum=$("#seatsMap").find('input[type="checkbox"]:checked').length;

        //console.log($("#seatsMap").find('input[type="checkbox"]:checked'));
       var seatsID = idArr.join(" ");
        console.log(seatsID);
        var price=$("#ticket-price").val();
        var totalPrice = price*seatsNum;
        $('#price').html(totalPrice);
        $('#choosen_seats').html(seatsID);
        $('#seatsNums').val(seatsID);
        $('#total-price').val(totalPrice);
    });

}
/**
 * trigger seats map animation when change the order
 *
 */
function updateSeats(){
    $("#selected").trigger('click');
}

/**
 * check user login or not when user go to booking page.
 *
 */

function forceLogin(){
    //console.log($(".selected").find("button").first());
    $.getJSON('/Auth/getLogin').then(function(res) {
        if(!res.success) {
            console.log('show');
            window.login.show();
        }
    });

}
init();

