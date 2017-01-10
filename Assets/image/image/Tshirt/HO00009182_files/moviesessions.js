/**
 * sessions
 */

var mcode, ccode, session_id;
var transid='';
var bookingid='';
var seatselect = false;

function selectShow(fk_mcode, fk_ccode, sessionid,showtime1,cinemaname) {
	
	$(".sh").removeClass('selected');
	$("#sh_" + sessionid).addClass('selected');
	/*alert(showtime1);
	var showtime = shows[j].showtime.split(" ");
	var showtimehr = showtime[3].split(':');*/
	
	$("#date_time").html(showtime1+' | '+cinemaname);
	mcode = fk_mcode;
	ccode = fk_ccode;
	session_id = sessionid;
	seatselect=true;
	getSeatLayout();
}

function changeDay(day,sessionid) {
/*Wednesday offer alert*/
	/*if(sessionid==''){
	if (day == 'Today') {
		var tday = new Date();
		var todayday = tday.getDay();
		if (todayday == 3) {
			$('#wednesdayModal').modal('show');
		}
	} else {
		var sday = day.substring(0, 3);
		if (sday == 'Wed') {
			$('#wednesdayModal').modal('show');
		}
	}
	}*/
	/*Wednesday offer alert End*/
	selectedDay = day;
	$("#select-day").html(
			'<span class="value">' + selectedDay
					+ '</span> <span class="caret"></span>');

	var obj = JSON.parse(venueJson);
	var sessions = obj.output.movieSessionsVOs;
	var theater;
	for (var i = 0; i < sessions.length; i++) {
		if (sessions[i].date == selectedDay) {
			theater = sessions[i].theaters[0];
			break;
		}
	}

	$("#shows_id")
			.html(
					'<ul class="list-unstyled list-inline timing" id="shows_ul_id"></ul>');

	var shows = theater.showsVOs;

	for (var j = 0; j < shows.length; j++) {
		var showtime = shows[j].showtime.split(" ");
		var showtimehr = showtime[3].split(':');
		{
			if (shows[j].lapsed == true) {
				$("#shows_ul_id").append(
						'<li class="lapsed sh"><a href="javascript:void(0)">'
								+ showtime[3] + '</a></li>');
			} else {
				if (shows[j].seatStatus == 0) {
					$("#shows_ul_id").append(
							'<li class="sold-out sh"><a href="javascript:void(0)">'
									+ showtime[3] + '</a></li>');
				} else if (shows[j].seatStatus == 1) {
					$("#shows_ul_id").append(
							'<li class="filling sh" id="sh_'
									+ shows[j].sessionid
									+ '"><a id='+shows[j].sessionid+' href="javascript:void(0)"'
									+ 'onclick="selectShow(\''
									+ shows[j].fk_mcode + '\',\''
									+ shows[j].fk_ccode + '\',\''
									+ shows[j].sessionid + '\',\''
									+ shows[j].showtime + '\',\''
									+ theater.cinemaName + '\')">'
									+ showtime[3] + '</a></li>');
				} else if (shows[j].seatStatus == 2) {
					$("#shows_ul_id").append(
							'<li class="available sh" id="sh_'
									+ shows[j].sessionid
									+ '"><a id=s'+shows[j].sessionid+' href="javascript:void(0)"'
									+ 'onclick="selectShow(\''
									+ shows[j].fk_mcode + '\',\''
									+ shows[j].fk_ccode + '\',\''
									+ shows[j].sessionid + '\',\''
									+ shows[j].showtime + '\',\''
									+ theater.cinemaName + '\')">'
									+ showtime[3] + '</a></li>');
				}
			}
		}
	}
	
	if(sessionid!=''){
		$('#s'+sessionid).trigger('click');
	}
}

/**
 * Seat layout
 */
function getSeatLayout() {
	if(!seatselect){
		alert('Please select show');
		return;
	}
	
	clearModal();
	navigate();
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.getSeatlayout(ccode, session_id, {
		callback : getSeatLayoutSuccess,
		errorHandler : getSeatLayoutError
	})
}

function getSeatLayoutSuccess(data) {
	if(data.result=='success'){
		
	$('#layout').html('');
	$('#price_row').html('');
	var areas = data.output.objAreas;
	if(data.output.food){
		$('#food_chk').show();
		$('#nofood_chk').hide();
	}else{
		$('#food_chk').hide();
		$('#nofood_chk').show();
	}
	
	transid=data.output.transid;
	bookingid='';
	
	for (var i = 0; i < areas.length; i++) {
		var area = areas[i];
		$("#price_row").append('<div class="padding-th color-'+area.colorCode+'">' + area.strAreaDesc
				+ '(<i class="fa fa-inr"></i> ' + area.lngPrice / 100 + ')</div>');
		$('#layout').append('<tr class="color-'+area.colorCode+'">'+
				'<td class="disable"><table width="100%" cellspacing="0"'+
				'		cellpadding="0" border="0" >'+
				'		<tbody id="area-'+area.strAreaNum+'">'+
				'		</tbody>'+
				'	</table></td>'+
				'</tr>');
				
		for (var r = 0; r < area.colRows.length; r++) {
			var row = area.colRows[r];
			$('#area-'+area.strAreaNum).append('<tr id="' + row.strRowPhyID + '"></tr>');
			$('#' + row.strRowPhyID).append(
					'<td><em>' + row.strRowPhyID + '</em></td>');
			for (var co = 0; co <= data.output.totalcols; co++) {
				var seatAdded = false;
				for (var s = 0; s < row.colSeats.length; s++) {
					var seat = row.colSeats[s];
					if (co == seat.intSeatXPos) {
						if (seat.strSeatStatus == 0) {
							$('#' + row.strRowPhyID).append(
									'<td><span class="seat"><input type="checkbox" id="'
											+ row.strRowPhyID
											+ seat.strSeatNumber
											+ '" onchange="setSeat(\''+row.strRowPhyID+seat.strSeatNumber+'\',\''+area.colorCode+'\',\''+area.strTtypecode+'\',\''+area.lngPrice+'\',\''+area.strAreaCode+'\',\''+area.strAreaNum+'\',\''+row.intGridRowID+'\',\''+seat.intGridSeatNum+'\')"><label for="'
											+ row.strRowPhyID
											+ seat.strSeatNumber
											+ '"></label></span></td>');
						} else {
							$('#' + row.strRowPhyID)
									.append(
											'<td  class="disable"><span class="seat"><input type="checkbox" id="'
													+ row.strRowPhyID
													+ seat.strSeatNumber
													+ '" disabled="disabled"><label for="'
													+ row.strRowPhyID
													+ seat.strSeatNumber
													+ '"></label></span></td>');
						}

						seatAdded = true;
					}
				}
				if (!seatAdded) {
					$('#' + row.strRowPhyID).append(
							'<td><span class="seat"></span></td>');
				}
			}
		}

	}
	 $('#seatlayout').modal({
		    backdrop: 'static',
		    keyboard: false
	});

	}else{
		alert(data.msg);
	}

	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
	

}
function getSeatLayoutError() {
	alert('System error');
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}