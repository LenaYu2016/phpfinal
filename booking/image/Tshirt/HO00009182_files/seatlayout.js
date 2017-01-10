/**
 * New node file
 */

var seatMap = {};
var forMcouponMap = {};
var seatarr = [ "", "", "", "", "", "", "", "", "", "" ];
var tckqty = 0;
var totalPrice = 0;
var ttypeMap = {};
var ttypearr = [ "", "", "", "", "", "", "", "" ];



function setSeat(rowseat, colorCode, strTtypecode, lngPrice, strAreaCode,
		strAreaNum, intGridRowID, intGridSeatNum) {
	if (document.getElementById(rowseat).checked) {
		if (tckqty != 10) {
			addSeat(rowseat + "|" + colorCode, strTtypecode, lngPrice,
					strAreaCode, strAreaNum, intGridRowID, intGridSeatNum);
			element = $('#' + rowseat);
			$(element).parent().children('label').addClass('checked');
		} else {

			alert('You can book maximum 10 seats in a transaction.');
			document.getElementById(rowseat).checked = false;
			element = $('#' + rowseat);
			$(element).parent().children('label').removeClass('checked');
		}

	} else {
		removeSeat(rowseat + "|" + colorCode, strTtypecode, lngPrice);
		element = $('#' + rowseat);
		$(element).parent().children('label').removeClass('checked');
	}
}

function addSeat(rowseat, strTtypecode, lngPrice, strAreaCode, strAreaNum,
		intGridRowID, intGridSeatNum) {
//	alert(rowseat);
	//get blank index
	var indexBlankSeat = seatarr.indexOf("");
	if (indexBlankSeat != -1) {
		tckqty += 1;
		totalPrice += parseInt(lngPrice);
		//put at blank & in map
		seatarr[indexBlankSeat] = rowseat;
		seatMap[rowseat] = strAreaCode + "|" + strAreaNum + "|"
				+ parseInt(intGridRowID) + "|" + parseInt(intGridSeatNum);
		forMcouponMap[rowseat] = strAreaCode + "|" + parseInt(lngPrice);

		//for ttype
		var ttype = ttypeMap[strTtypecode];
		if (ttype != null && ttype != "") {
			var res = ttype.split("|");
			var qty = parseInt(res[1]);
			qty = qty + 1;
			ttypeMap[strTtypecode] = strTtypecode + "|" + qty;
		} else {
			ttypeMap[strTtypecode] = strTtypecode + "|1";
		}

	} else {
		/* alert('No More');
		var rs = rowseat.split("|");
		var rst = rs[0];
		document.getElementById(rst).checked=false; */
	}

	//ttype
	var indexBlankTtype = ttypearr.indexOf(strTtypecode);
	if (indexBlankTtype == -1) {
		var indexBlankTtype = ttypearr.indexOf("");
		ttypearr[indexBlankTtype] = strTtypecode;
	}

	//for print
	var displaySeats = "";
	for (var i = 0; i < seatarr.length; i++) {
		if (seatarr[i] != "") {
			var res = seatarr[i].split("|");
			displaySeats += '<span class="seat-s">' + res[0]+ '</span>';
		}
	}
	var tcq = tckqty < 10 ? '0' + tckqty : tckqty;
	$("#seatSelected").show();
	$("#noSeatSelected").hide();
	$("#seatSelected").html('<label>Selected Seats</label>'+displaySeats);
/*	$('#tckdtl').html('<table class="table" ><tr><td>'+tcq+' Tickets</td><td><i class="fa fa-inr"></i> '+numeral(totalPrice / 100).format('0.00')+'</td></tr>'
		+'<tr class="total"><td>Total</td><td><i class="fa fa-inr"></i> '+numeral(totalPrice / 100).format('0.00')+'</td></tr></table>');*/
	$('#price_div').html('Total :<i class="fa fa-inr"></i> '+numeral(totalPrice / 100).format('0.00'));

}

function removeSeat(rowseat, strTtypecode, lngPrice) {
	//get blank index
	var indexBlankSeat = seatarr.indexOf(rowseat);
	if (indexBlankSeat != -1) {
		tckqty -= 1;
		totalPrice -= parseInt(lngPrice);
		//put at blank & in map
		seatarr[indexBlankSeat] = "";

		//for ttype
		var ttype = ttypeMap[strTtypecode];
		if (ttype != null && ttype != "") {
			var res = ttype.split("|");
			var qty = parseInt(res[1]);
			qty = qty - 1;
			if (qty == 0) {
				ttypeMap[strTtypecode] = "";
				//ttype
				var indexBlankTtype = ttypearr.indexOf(strTtypecode);
				if (indexBlankTtype != -1) {
					ttypearr[indexBlankTtype] = "";
				}
			} else {
				ttypeMap[strTtypecode] = strTtypecode + "|" + qty;
			}
		}

	}

	//for print
	var displaySeats = "";
	for (var i = 0; i < seatarr.length; i++) {
		if (seatarr[i] != "") {
			var res = seatarr[i].split("|");
			displaySeats +=  '<span class="seat-s">' + res[0]+ '</span>';
		}
	}
	var tcq = tckqty < 10 ? '0' + tckqty : tckqty;

	if (tckqty != 0) {
		$("#seatSelected").show();
		$("#noSeatSelected").hide();
		$("#seatSelected").html('<label>Selected Seats</label>'+displaySeats);
		$('#price_div').html('Total :<i class="fa fa-inr"></i> '+numeral(totalPrice / 100).format('0.00'));
		

	} else {
		$("#seatSelected").hide();
		$("#noSeatSelected").show();

		$('#price_div').html('Total :<i class="fa fa-inr"></i> '+numeral(totalPrice / 100).format('0.00'));
	}

}

function clearModal(){
	$("#seatSelected").hide();
	$("#noSeatSelected").show();
	$("#seatSelected").html('');
	$('#price_div').html('Total :<i class="fa fa-inr"></i> 0');
	for (var i = 0; i < seatarr.length; i++) {
		seatarr[i]="";
	}
	for (var i = 0; i < seatarr.length; i++) {
		ttypearr[i]="";
	}
	tckqty = 0;
	totalPrice = 0;
}

	
	function getFood(){
		if(tckqty==0){
			alert("Specify number of tickets needed.");
			return;
		}
		var ttypecode = "";
		var strtickets = "|"+tckqty+"|";
		var strformcoupon ="";
		for(var i=0;i<seatarr.length;i++){
			if(seatarr[i]!=""){
				strtickets+=seatMap[seatarr[i]]+"|";
			}
		}
		
		for(var i=0;i<seatarr.length;i++){
			if(seatarr[i]!=""){
				if(strformcoupon==""){
					strformcoupon+=forMcouponMap[seatarr[i]];
				}
				else{
					strformcoupon+=","+forMcouponMap[seatarr[i]];
				}
				
			}
		}
		
		for(var i=0;i<ttypearr.length;i++){
			if(ttypearr[i]!=""){
				if(ttypecode==""){
					ttypecode+=ttypeMap[ttypearr[i]];
				}
				else{
					ttypecode+=","+ttypeMap[ttypearr[i]];
				}
				
			}
		}
		$("#please-wait").css("display","block");
		$("body").css("overflow","hidden");
		dwrService.getFood(ccode,session_id,transid,ttypecode,tckqty,strtickets,strformcoupon,{
		     callback : getFoodSuccess,
		     errorHandler : getFoodError})
		}

	function getFoodSuccess(data) {
		$("#please-wait").css("display","none");
		$("body").css("overflow","auto");
		if(data.result=='success'){
//			msg_to_show=false;
			gotoPage('/food/'+data.output.bookingVO.moviename.toLowerCase().replace(/ /g,'-').replace(/\//g, '-'));
		}
		else{
			/*$("#errordiv").css('display','block');
			$("#errordiv").html('<span>'+data.msg+'</span>'); */
			alert(data.msg);
		}    	
		// Scroller
		$(".scroller").niceScroll({
			cursorcolor:"#616161",
			cursorwidth:"8px",
			autohidemode: true 
		});
	}

	
	function getFoodError(data) {
		alert('error');
		$("#please-wait").css("display","none");
		$("body").css("overflow","auto");
		
	}
	
	//spaynow
	function getPayOptions(e){
		if(tckqty==0){
			alert("Specify number of tickets needed.");
			return;
		}
		/*if(userid=='' || userid==0){
			openlogin(e);  
			click_height = e.pageY;
			return;
		}*/
		getSpayNow();
	}
	
	function getSpayNow(){
		var ttypecode = "";
		var strtickets = "|"+tckqty+"|";
		var strformcoupon ="";
		for(var i=0;i<seatarr.length;i++){
			if(seatarr[i]!=""){
				strtickets+=seatMap[seatarr[i]]+"|";
			}
		}
		
		for(var i=0;i<seatarr.length;i++){
			if(seatarr[i]!=""){
				if(strformcoupon==""){
					strformcoupon+=forMcouponMap[seatarr[i]];
				}
				else{
					strformcoupon+=","+forMcouponMap[seatarr[i]];
				}
				
			}
		}
		
		for(var i=0;i<ttypearr.length;i++){
			if(ttypearr[i]!=""){
				if(ttypecode==""){
					ttypecode+=ttypeMap[ttypearr[i]];
				}
				else{
					ttypecode+=","+ttypeMap[ttypearr[i]];
				}
				
			}
		}
		$("#please-wait").css("display","block");
		$("body").css("overflow","hidden");
		dwrService.getSpayNow(ccode,session_id,transid,ttypecode,tckqty,strtickets,strformcoupon,{
		     callback : getSpayNowSuccess,
		     errorHandler : getSpayNowError})
	}
	
	function getSpayNowSuccess(data){
		$("#please-wait").css("display","none");
		$("body").css("overflow","auto");
		
		if(data.result=='success'){
//			msg_to_show=false;
			gotoPage('/payment/'+data.output.payVO.bookingVO.moviename.toLowerCase().replace(/ /g,'-').replace(/\//g, '-'));
		}
		else{
			alert(data.msg);
			/*$("#errordiv").css('display','block');
			$("#errordiv").html('<span>'+data.msg+'</span>');  */  			
		}
	}
	function getSpayNowError(){
		alert('System error');
		$("#please-wait").css("display","block");
		$("body").css("overflow","hidden");
	}
	
	function closedialog()
	{
		$("#alto-popup").css("display","none");
		$("body").css("overflow","auto");
	}
	
	
