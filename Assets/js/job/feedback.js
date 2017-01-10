"use strict"
window.onload = function(){
    var formHandle = document.forms[0]
	console.log(formHandle);
	
	formHandle.onsubmit = processForm;
	
	function processForm(){
        var msgs = document.getElementById("output");
        var users = document.getElementById("username").value;
        var passid = document.getElementById("password").value;

		var myPass = '12345';//12345
        var myPassMD5 = CryptoJS.MD5(myPass);//My secret password.
        var myid='bin'

        if (users ==="") {
         msgs.innerHTML='No userid';
          return false;
    }
		
       if( users !==myid ){
        msgs.innerHTML='Invalid userid';
        return false;
    }

        if (passid ==="") {
        msgs.innerHTML='No password';
        return false;
    }
 
        
        
      if( passid !== myPass){
        msgs.innerHTML='Invalid password';
           return false;
        
    }else{
     msgs.innerHTML='Sucess login';
           return false;
    }
         return false; 
    }

    
    
};  