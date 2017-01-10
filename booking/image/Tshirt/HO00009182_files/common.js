/**
 * 
 */

function showerror(){
	alert("Oops,Something Went Wrong.Please try again");
}

/**
 * Timer
 * @param step
 * @param timecount
 */
function startTimer(timecount){
	if(timecount>0){
		$("#timer").fadeIn();
		CreateTimer("timer",timecount);	
	}
	
}


function resetTimer(timecount1){
	if(timecount1>0){
		TotalSeconds = timecount1;
	}
	
}


//for timer
var Timer;
var TotalSeconds;
function CreateTimer(TimerID,Time) {
Timer = document.getElementById(TimerID);
TotalSeconds = Time;

UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function Tick() {
TotalSeconds -= 1;
UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
	if(TotalSeconds==0)
	{
		alert("Session Expired.Try again");
		gotoPage('/');
	
	}
	else{
		var min = TotalSeconds/60;
		var sec = TotalSeconds%60;
		if(sec>=0 && sec<10){
			Timer.innerHTML = Math.floor(min) +':0'+sec + ' Mins';
		}
		else{
			Timer.innerHTML = Math.floor(min) +':'+sec + ' Mins';	
		}
	}
}

/**
 * 
 */

$(document).ready( function(){ 
	//No Back
	/*if (window.history && window.history.pushState) {

	    window.history.pushState('forward', null, './#forward');

	    $(window).on('popstate', function() {
	      alert('Back button was pressed.');
	    });

	  }*/
	
	//number for textbox
	 $("#dcnum-re-text,#dcpin-re-text,#dcamt-re-text,#goldamt,#blackamt,#mobi-cc-cardcvv,#mobi-cc-cardyy,#mobi-cc-cardnum,#cc-cardcvv,#cc-cardyy,#cc-cardnum,#mm-card, #mm-pin, #ks-code, #gcnum-text, #gcpin-text, #dcnum-text, #dcpin-text, #mc-card-num, #mc-mobile-num, #admobile").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	         e.preventDefault();
	               return false;
	    }
	   });
	
});

//format time in AMPM
function formatAMPM(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'PM' : 'AM';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  hours = hours < 10 ? '0'+hours : hours;
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes + ' ' + ampm;
	  return strTime;
	}