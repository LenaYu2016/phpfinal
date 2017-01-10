window.onload = function(){ // Not finfshed
	var formHandle = document.forms[0]
	console.log(formHandle);
	
	formHandle.onsubmit = processForm;
	
	function processForm(){
		
		// Not finfshed
		
		
		
		var nameValue = document.forms[0].username;
		console.log(nameValue);
		var birthdayValue = document.forms[0].birthday;
		console.log(birthdayValue);
        var EducationalValue = document.forms[0].Educational;
		console.log(EducationalValue);
        var graduationValue = document.forms[0].graduation;
		console.log(graduationValue);
        var PhoneValue = document.forms[0].Phone;
		console.log(PhoneValue);
		var IntroductionValue = document.forms[0].Introduction;
		console.log(IntroductionValue);
		
	// Not finfshed
		
		
		
		var nameErr = document.getElementById("username");
		if(nameValue.value === "" || nameValue.value === null ){
			
			nameErr.style.background = "red";
			return false;
		}else {
				nameErr.style.background = "white";
		}
			
		var BirErr = document.getElementById("birthday");
		if(birthdayValue.value === "" || birthdayValue.value === null || !/^\d{6}$/.test(birthdayValue.value)){
			
			BirErr.style.background = "red";
			return false;
		}else {
				BirErr.style.background = "white";
		}
		
        var EduErr = document.getElementById("Educational");
		if(EducationalValue.value === "" || EducationalValue.value === null ){
			
			EduErr.style.background = "red";
			return false;
		}else {
				EduErr.style.background = "white";
		}
        
        var GraErr = document.getElementById("graduation");
		if(graduationValue.value === "" || graduationValue.value === null ){
			
			GraErr.style.background = "red";
			return false;
		}else {
				GraErr.style.background = "white";
		}
        
        var PhoneErr = document.getElementById("Phone");
		if(PhoneValue.value === "" || PhoneValue.value === null ){
			
			PhoneErr.style.background = "red";
			return false;
		}else {
				PhoneErr.style.background = "white";
		}
        
        var IntrErr = document.getElementById("Introduction");
		if(IntroductionValue.value === "" || IntroductionValue.value === null ){
			
			IntrErr.style.background = "red";
			return false;
		}else {
				IntrErr.style.background = "white";
		}
        
        

		alert("Thank you ")
	
		return false;
		
	
	}
	
}
// Not finfshed