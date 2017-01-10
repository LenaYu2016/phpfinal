//LAB 11 - LOCATION OBJECT & ROUTING


//#### CONTENT FOR HOME PAGE ====
var contentHome = "bbbb";
contentHome += "dd";
//==== END OF CONTENT FOR HOME PAGE ####

//#### CONTENT FOR PRODUCTS PAGE ==== 
var contentProducts = "Our company";
contentProducts += "xWorking actors perform in live theater productions, at theme parks, in commercials and on television shows. As actors start their careers, many work multiple jobs, such as working as extras in films or TV, to support themselves financially.While many actors live in large metropolitan areas, such as Los Angeles or New York, production companies all over the U.S. hire actors on a regular basis. Travel is often necessary, and competition for acting positions is extremely high. Acting can be a tiring career, both physically and emotionally; actors often spend hours at a time at repetitive auditions and rehearsals. Rejection is constant for new actors starting their careers.";
//==== END OF CONTENT FOR PRODUCTS PAGE #### 

//#### CONTENT FOR ABOUT US PAGE ====
var contentAbout = "bbbbb";
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