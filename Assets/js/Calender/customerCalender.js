/**
 * Created by ran on 3/23/2016.
 */

function init(){
    chooseCalender();
    findEnglishMovie();
    findChineseMovie();
    findAllMovie();
    checkedRadioButton();
}

/**
 * when customer choose films get the information
 *
 */
function chooseCalender(){
    $(".list-unstyled").on("click","label", function(){
        $(this).toggleClass("unchecked");
        $(this).prev().prop("checked", !$(this).prev().prop("checked"));
    });
}

/**
 * ajax call find chinese movie
 *
 */
function findChineseMovie(){
    $("#ChineseMovies").click(function(){
        url="../MovieCalender/index.php?route=CustomerCalender/showChineseMovies";
        $.get(url,function(data,status){
            data = JSON.parse(data);
            //console.log(data);
            createList(data);
        })
    });
}

/**
 * change all unchecked buttons to checked
 *
 */
function checkedRadioButton(){
    console.log($("input:checkbox:not(:checked)"));
    $("input:checkbox:not(:checked)").prop("checked", true);
}

/**
 * ajax call find all movie
 *
 */
function findAllMovie(){
    $("#allMovies").click(function(){
        url="../MovieCalender/index.php?route=CustomerCalender/showAllMovies";
        $.get(url,function(data,status){
            data = JSON.parse(data);
            console.log(data);
            createList(data);
        })
    })
}

/**
 * ajax call find Chinese movie
 *
 */

function findEnglishMovie(){
    $("#EnglishMovies").click(function(){
        url="../MovieCalender/index.php?route=CustomerCalender/showEnglishMovies";
        $.get(url, function(data,status){
                data = JSON.parse(data);
                //console.log(data);
                createList(data);
        })
    });
}

//function warningGoBack(){
//    window.onbeforeunload = function() { return "You work will be lost."; };
//}

/**
 *
 * Create movie list
 * @param data
 */

function createList(data){
   var str="";

    for(var i=0; i<data.length; i++){
        var moive =data[i].Film_Name+'/'+data[i].Run_Date+'/'+data[i].Run_Time+'/'+data[i].Film_Id;
        str+= "<li class='movieList'>";
        str+="<input type='checkbox' name="+"'"+moive+"'"+"class='film-list' value="+"'"+data[i].Film_Id+"'"+" checked/>";
        str+="<label for='' class='checked'>"+data[i].Film_Name+"</label>";
        str+="<small>["+data[i].Run_Date+"]</small><span class='time-float'>"+data[i].Run_Time+"</span></li>";
    }
    $("#filmList").html(str);
}
init();