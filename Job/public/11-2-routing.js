//LAB 11 - LOCATION OBJECT & ROUTING


//#### CONTENT FOR HOME PAGE ====
var contentHome = "";
contentHome += "dd";
//==== END OF CONTENT FOR HOME PAGE ####

//#### CONTENT FOR PRODUCTS PAGE ==== 
var contentProducts = "Feedback";
contentProducts += "xxx";
//==== END OF CONTENT FOR PRODUCTS PAGE #### 

//#### CONTENT FOR ABOUT US PAGE ====
var contentAbout = "About us";
contentAbout += "vvv";

//==== END OF CONTENT FOR ABOUT US PAGE ####


var main = function(){
    console.log(window.location);

switch (window.location.search.trim()){
case "?home":
document.getElementById("output").innerHTML = contentHome;
            break;
case "?products":
document.getElementById("output").innerHTML = contentProducts;
            break;
case "?about":
document.getElementById("output").innerHTML = contentAbout;
            break;
default :
return;
    }
};

window.onload =main;