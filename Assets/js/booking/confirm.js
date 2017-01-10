/**
 * Created by ran on 3/18/2016.
 */

var validNavigation = false;

/**
 *  countdown Clock in comfirm page
 * when click count to 0 clean the session
 *
 */
function init(){
    paymentButton();
    var endTime = new Date();
    endTime.setMinutes(endTime.getMinutes() + 8);
    //console.log(endTime);
    //getTimeRemaining(endTime);
    var timeinterval = setInterval(function(){
       var timer = getTimeRemaining(endTime);
        //console.log(timer);
        $(".timer").html(timer.minutes+":"+timer.seconds+" Mins");
        if(timer.seconds<10){
            $(".timer").html(timer.minutes+":0"+timer.seconds+" Mins");
        }
        if(timer.total<=0){

            alert("Session Expired");
            var url="./index.php?route=DetailController/sessionExpired";
            //console.log(url);
            $.get(url, function(data, status){
                window.onbeforeunload=null;
                window.location.replace("./index.php");
            })
            clearInterval(timeinterval);
        }
    },1000);
    deleteItem();
    //closeBrowerEmtpyShoppingCart();
    //wireUpEvents();
}
/**
 * ajax call to delete item
 *
 */
function deleteItem(){
    $(".ticket-booking").on("click",".delete",function(){
        var item_id =$(this).attr("value");
        //console.log(item_id);
        var url="./index.php?route=DetailController/deleteItems/"+item_id;
        console.log(url);
        $.get(url, function(data, status){

            var obj = JSON.parse(data);

            createBills(obj);
        })
    });

}
/**
 * create bill html and css
 *
 *
 * @param obj
 */

function createBills(obj){
console.log(obj);
    var grandPrice=0;
    var strDetail="<h2>TICKET BOOKING DETAIL</h2>";
    var strSummary="";
    for(var i=0;i<obj.length; i++){
        var id=i+1;
        // Movie Name:
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Movie Name<span>:</span>"
        +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Film_Name+"</div></div>";

        // Cinema Name:
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Cinema<span>:</span>"
            +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Cinema+"</div></div>";

        //Room Name:
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Room<span>:</span>"
            +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Room+"</div></div>";

        //Seats Name:
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Seat(s)<span>:</span>"
            +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Seats+"</div></div>";

        //Date & Show Time:
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Date & Show Time<span>:</span>"
            +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Run_Time+"</div></div>";

        //Cinema Address
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<div class="+"'"+"col-gl-5 col-md-5 col-sm-12 detail-row"+"'"+">" + "Cinema Address<span>:</span>"
            +"</div>";
        strDetail+="<div class="+"'"+"col-gl-5 col-gl-7 col-md-7 col-sm-12 detail-row"+"'"+">"+obj[i].Cinema_Address+"</div></div>";
        //console.log(str);

        //Buttons
        strDetail+="<div class="+"'"+"row"+"'"+">"+"<form method='post' action='./index.php'>"+"<input type='hidden' name='route' value="+"'"+"DetailController/editItems/"+i+"'"+">"
            +"<button type="+"'"+"submit"+"'"+" class="+"'"+"btn btn-default btn-booking"+"'"+">Edit"+"</button>"
        +"<button type="+"'"+"button"+"'"+" class="+"'"+"btn btn-default btn-booking delete"+"'"+" value="+"'"+i+"'"+">"+"Delete"+"</button></form></div>";

        //Item Id:
        strSummary+="<tr><td>Item Number:</td>"+"<td>"+id+"</td>"+"</tr>";

        //ticket cost:
        strSummary+="<tr><td>Ticket Cost(s):</td>"+"<td>$ "+obj[i].Price+"</td>"+"</tr>";

        //Item Tax:
        strSummary+="<tr><td>Service Tax:</td>"+"<td>"+obj[i].Tax+"</td>"+"</tr>";

        //Item Total:
        strSummary+="<tr id="+"'"+"total"+"'"+"><td>Total:</td>"+"<td>"+obj[i].TotalPrice+"</td>"+"</tr>";
        grandPrice+=obj[i].TotalPrice;
        console.log(strDetail);
    }
    //Add film button


        strSummary+="<tr><td>GRAND TOTAL</td><td>$"+grandPrice+"</td><tr/>";
        strSummary+="<tr><td colspan='2'><a href='./index.php'>ADD OTHER FILMS</a></td></tr>";
        strSummary+="<tr><td colspan='2'><a href='./index.php?route=DetailController/sessionExpired'>CANCEL</a></td></tr>";
    //Add pay button
    //strSummary+="<tr><td colspan='2'><a href='./index.php'>PAY NOW</a></td></tr>";

    $(".ticket-booking").html(strDetail);
    $(".booking-table").html(strSummary);
}


//////////////////////////////
/**
 * get remain time for count down clock
 *
 * @param endTime
 * @returns {{total: number, minutes: number, seconds: number}}
 */
function getTimeRemaining(endTime){
    var d =new Date();
    var t = Date.parse(endTime) - Date.parse(d);
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );

    return {
        'total': t,
        'minutes': minutes,
        'seconds': seconds
    };
}

function paymentButton(){
    $(".stripe-button-el").addClass("btn-payment");
}
//
//function closeBrowerEmtpyShoppingCart(){
//
//    //$(window).on('beforeunload ',function() {
//    //    alert('');
//
//    //});
//
//    window.onunload=function(){
//            alert('');
//            var url="./index.php?route=DetailController/sessionExpired";
//            $.get(url, function(data, success){
//                alert("shopping cart empty");
//            })};
//
//}



//////////////////////////////////////////

var validNavigation = false;

function wireUpEvents() {
    /**
     * For a list of events that triggers onbeforeunload on IE
     * check http://msdn.microsoft.com/en-us/library/ms536907(VS.85).aspx
     *
     * onbeforeunload for IE and chrome
     * check http://stackoverflow.com/questions/1802930/setting-onbeforeunload-on-body-element-in-chrome-and-ie-using-jquery
     */
    var dont_confirm_leave = 0; //set dont_confirm_leave to 1 when you want the user to be able to leave without confirmation
    var leave_message = 'You sure you want to leave?'
    function goodbye(e) {
        if (!validNavigation) {
            endSession();
            if (dont_confirm_leave!==0) {
                if(!e) e = window.event;
                //e.cancelBubble is supported by IE - this will kill the bubbling process.
                e.cancelBubble = true;

                e.returnValue = leave_message;
                console.log(e);
                if(e.defaultPrevented ==true){
                    console.log(e.defaultPrevented);
                }else{

                }
                //e.stopPropagation works in Firefox.
                if (e.stopPropagation) {
                    e.stopPropagation();
                    e.preventDefault();

                }
                //return works for Chrome and Safari
                //return leave_message;
            }
        }
    }
    window.onbeforeunload=goodbye;

    // Attach the event keypress to exclude the F5 refresh
    $(document).bind('keypress', function(e) {
        if (e.keyCode == 116){
            validNavigation = true;
        }
    });

    // Attach the event click for all links in the page
    $("a").bind("click", function() {
        validNavigation = true;
    });

    // Attach the event submit for all forms in the page
    $("form").bind("submit", function() {
        validNavigation = true;
    });

    // Attach the event click for all inputs in the page
    $("input[type=submit]").bind("click", function() {
        validNavigation = true;
    });

}


function endSession() {
    // Browser or broswer tab is closed
    // Do sth here ...
        var url="./index.php?route=DetailController/sessionExpired";
        $.get(url, function(data, success){
            alert("shopping cart empty");
        })
}
init();