/**
 * New node file
 */
function closeLogin() {
	$("#collapseTwo").removeClass('in');
}

function showreg() {
	$("#signup-here").fadeIn();
	$("#register-name").focus();
//	$("#signup-opt").hide();
	$("#or-facebook").fadeIn();
	$("#login-here").hide();
}

function openlogin(e){
	  e.stopPropagation();
	  
	  if($( window ).width() < 1025) {
		  $('.navbar-toggle').trigger('click');
		   $('html,body').animate({scrollTop: '360px'}, 1000);
		 }
	  else
		  {
		  $('html, body').animate({scrollTop: 0}, 1000);  
		  }
	  $('#login-sp').find('[data-toggle=dropdown]').dropdown('toggle');
	  $("#login-email").focus();
	  return false; 
	 }


/**
 * 
 */
var click_height = 0;
function loginIsSuccessfull(data){
	$("#bs-example-navbar-collapse-1").removeClass('in');
	$('html, body').animate({
		scrollTop : 0
	}, 1000);
	userid = data.output.userid;
	$("#login-username").html(data.output.username+' <span class="caret"></span>');
	$("#login-sp").hide();
	$("#logined-user").fadeIn();
	if ($('#citrusform').length > 0) {
		document.forms["citrusform"]["firstName"].value = data.output.username;
		document.forms["citrusform"]["email"].value = data.output.email;
		document.forms["citrusform"]["phoneNumber"].value = data.output.mobile;
		$("#loginsubmit").remove();
		$("#loginname").attr("readonly","readonly");
		$("#loginmobile").attr("readonly","readonly");
		$("#loginemail").attr("readonly","readonly");
		$("#loginname").attr("value",data.output.username);
		$("#loginmobile").attr("value",data.output.mobile);
		$("#loginemail").attr("value",data.output.email);
	}
	$("#remi-email").val(data.output.email);
	
}

/**
 * switches
 */
function forgotPassSwitch() {
	$("#login-here").hide();
	$("#forgot-pass").fadeIn();
	$("#pass_email_mob").focus();
	$("#change-pass").hide();
	$("#otp-fb").hide();
	$("#or-facebook").hide();
}

function loginswitch() {
	$("#login-here").fadeIn();
	$("#login-email").focus();
	$("#forgot-pass").hide();
	$("#change-pass").hide();
	$("#otp-fb").hide();
	$("#signup-here").hide();
//	$("#or-facebook").hide();
}



/**
 * login
 * @param type
 * @returns {Boolean}
 */
function login_user() {
//	var email_mobile = '';
//	var password = '';
	var email = $("#login-email").val().trim();
	var mobile = $("#login-mobile").val().trim();
	var password = $("#login-pass").val();
//	email_mobile = email_mobile.trim();
	/*if (email_mobile == null || email_mobile == "") {
		alert("Please provide email/mobile.");
		return false;
	}*/	
	if (email == null || email == "") {
		alert("Please provide email.");
		return false;
	}
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		alert("Please provide valid email id.");
		return false;
	}
	var regemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!email.match(regemail)) {
		alert("Please provide valid email id.");
		return false;
	}
	if (mobile == null || mobile == "") {
		alert("Please provide mobile.");
		return false;
	}
	if (mobile.length != 10 || isNaN(mobile)) {
		alert("Enter 10 digit mobile number.");
		return false;
	}
//	password = password.trim();
	if (password == null || password == "") {
		alert("Please provide password.");
		return false;
	}
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.login(email,mobile, password, {
		callback : loginSuccess,
		errorHandler : loginError
	})
}
function loginSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 1) {
			loginIsSuccessfull(data);
		} else if (data.output.resultcode == 2) {
			alert(data.output.msg);
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

function loginError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}




/**
 * register user
 * @returns {Boolean}
 */
function register_user() {
	var username = $("#register-name").val().trim();
	var mobile = $("#register-mobile").val().trim();
	var email = $("#register-email").val().trim();
	var password = $("#register-pass").val().trim();
	var con_password = $("#register-cpass").val().trim();
	if (username == null || username == "") {
		alert("Please provide name");
		return false;
	}
	if (mobile == null || mobile == "") {
		alert("Please provide mobile.");
		return false;
	}
	if (mobile.length != 10 || isNaN(mobile)) {
		alert("Enter 10 digit mobile number.");
		return false;
	}
	if (email == null || email == "") {
		alert("Please provide email.");
		return false;
	}
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		alert("Please provide valid email id.");
		return false;
	}
	
	var regemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!email.match(regemail)) {
		alert("Please provide valid email id.");
		return false;
	}
	if (password == null || password == "") {
		alert("Please provide password");
		return false;
	}
	if (con_password == null || con_password == "") {
		alert("Please provide confirm password");
		return false;
	}
	var ck_password = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/;
	if (!ck_password.test(password)) {
		alert("Password should have a min 6 characters including 1 numeric and 1 symbol.");
		return false;
	}
	if (password !== con_password) {
		alert("Password and Confirm Password should be same");
		return false;
	}

	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.register(username, mobile, email, password, {
		callback : registerSuccess,
		errorHandler : registerError
	})
}
function registerSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 1) {
			loginIsSuccessfull(data);
		} else if (data.output.resultcode == 2) {
			alert(data.output.msg);
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

function registerError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}


//forgot pass
var pass_email = "";
var pass_mob = "";
function forgotPass() {
	pass_mob = $("#pass_mob").val().trim();
	pass_email = $("#pass_email").val().trim();
	/*if (pass_email_mob == "") {
		alert("Enter Email/phone");
		return false;
	}*/
	if (pass_email == null || pass_email == "") {
		alert("Please provide email.");
		return false;
	}
	var atpos = pass_email.indexOf("@");
	var dotpos = pass_email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= pass_email.length) {
		alert("Please provide valid email id.");
		return false;
	}
	
	var regemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!pass_email.match(regemail)) {
		alert("Please provide valid email id.");
		return false;
	}
	if (pass_mob == null || pass_mob == "") {
		alert("Please provide mobile.");
		return false;
	}
	if (pass_mob.length != 10 || isNaN(pass_mob)) {
		alert("Enter 10 digit mobile number.");
		return false;
	}
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.forgotPass(pass_email,pass_mob, {
		callback : forgotPassSuccess,
		errorHandler : forgotPassError
	})
}

function forgotPassSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 0) {
			alert(data.output.msg);
			$("#login-here").hide();
			$("#forgot-pass").hide();
			$("#change-pass").fadeIn();
			$("#cp-otp").focus();
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}
function forgotPassError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

/**
 * Change pass
 * @returns {Boolean}
 */
function change_Password() {
	var authcode = $("#cp-otp").val().trim();
	var password = $("#cp-pass").val().trim();
	var con_password = $("#cp-confirm-pass").val().trim();
	if (authcode == null || authcode == "") {
		alert("Please provide OTP");
		return false;
	}
	if (password == null || password == "") {
		alert("Please provide password");
		return false;
	}
	if (con_password == null || con_password == "") {
		alert("Please provide confirm password");
		return false;
	}
	if (password !== con_password) {
		alert("Password and Confirm Password should be same");
		return false;
	}

	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.changePass(pass_email,pass_mob, authcode, password, {
		callback : changePassSuccess,
		errorHandler : changePassError
	})
}
function changePassSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 1) {
			loginIsSuccessfull(data);
		} else if (data.output.resultcode == 2) {
			alert(data.output.msg);
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}
function changePassError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

/**
 * fblogin
 */
var fb_called = false;
function fblogin() {
	if (fb_called) {
		fb_name = $("#fb-name").val().trim();
		fb_mobile = $("#fb-mobile").val().trim();
		fb_email = $("#fb-email").val().trim();
		if (fb_name == null || fb_name == "") {
			alert("Please provide name");
			return false;
		}
		if (fb_mobile == null || fb_mobile == "") {
			alert("Please provide mobile.");
			return false;
		}
		if (fb_mobile.length != 10 || isNaN(fb_mobile)) {
			alert("Enter 10 digit mobile number.");
			return false;
		}
		if (fb_email == null || fb_email == "") {
			alert("Please provide mobile.");
			return false;
		}
		var atpos = fb_email.indexOf("@");
		var dotpos = fb_email.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= fb_email.length) {
			alert("Please provide valid email id.");
			return false;
		}
		
		var regemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!fb_email.match(regemail)) {
			alert("Please provide valid email id.");
			return false;
		}
	}
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.facebookLogin(fb_email, fb_name, fb_mobile, fb_id, fb_gender,
			fb_dob, {
				callback : facebookLoginSuccess,
				errorHandler : facebookLoginError
			})
}

function facebookLoginSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 1) {
			loginIsSuccessfull(data);
		} else if (data.output.resultcode == 2) {
			alert(data.output.msg);
			fb_called = true;
			$("#fb-signup-here").fadeIn();
			$("#signup-here").hide();
			$("#fb-name").val(fb_name);
			$("#fb-mobile").val(fb_mobile);
			$("#fb-mobile").focus();
			$("#fb-email").val(fb_email);
		} else if (data.output.resultcode == 0) {
			alert(data.output.msg);
			$("#otp-fb").fadeIn();
			$("#otp-fb").focus();
			$("#login-here").hide();
			$("#forgot-pass").hide();
			$("#change-pass").hide();
//			$("#or-facebook").hide();			
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

function facebookLoginError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

/**
 * fb otp 
 * @returns {Boolean}
 */
function faceBookOtp() {
	var otp_fb = $("#otp-fb-1").val().trim();
	if (otp_fb == null || otp_fb == "") {
		alert("Please provide otp");
		return false;
	}
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.facebookOtp(otp_fb, fb_id, {
		callback : facebookOtpSuccess,
		errorHandler : facebookOtpError
	})
}

function facebookOtpSuccess(data) {
	if (data.result == "success") {
		if (data.output.resultcode == 1) {
			loginIsSuccessfull(data);
		}
	} else {
		alert(data.msg);
	}
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

function facebookOtpError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}

function callLogin() {
	$(".login-plz").trigger('click');
}



/**
 *logout 
 */
function logout() {
	$("#please-wait").css("display", "block");
	$("body").css("overflow", "hidden");
	dwrService.logout({
		callback : logoutSuccess,
		errorHandler : logoutError
	})
}

function logoutSuccess(data) {
	gotoPage('/');
}
function logoutError() {
	alert("error");
	$("#please-wait").css("display", "none");
	$("body").css("overflow", "auto");
}