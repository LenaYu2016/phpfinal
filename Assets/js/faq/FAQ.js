function init(){
	hideAndShow();
	selectChange();
	selectSorting();
	searchQuestion();
	submitForm();
}
/**
 *
 * hide and show answer
 */
function hideAndShow(){
	$(".answer").hide();
	$("body").on('click','.question', function(){
		$(".answer").not($(this).next()).slideUp(400);
		$(this).next().slideToggle(400);
		increateClickNumber($(this));
	})
}

/**
 * make a ajax call when choose different category
 *
 *
 */
function selectChange(){
	$("#question-list").change(function() {
		var categary =$(this).val();
		var url = "./index.php?route=FAQ/selectQuestionByCategory/"+categary;
		console.log(url);
		$.get(url, function(data,success){
			var obj = JSON.parse(data);
			console.log(obj);
			selectedQuestions(obj);
		});
		}
	);
}
/**
 * make a ajax call when choose different sorting methods
 *
 *
 */
function selectSorting(){
	$("#sort-by").change(function() {
			var sort =$(this).val();
			var category =$("#question-list").val();
			var url = "./index.php?route=FAQ/sortingQuetions/"+sort+"/"+category;
			console.log(url);
			$.get(url, function(data,success){
				var obj = JSON.parse(data);
				console.log(obj);
				selectedQuestions(obj);
			});
		}
	);
}
/**
 *
 * Create question list
 * @param obj
 */
function selectedQuestions(obj){
	var html ='';
	$.each(obj, function(i,question){
		    i=i+1;
			var id ="'"+question.question_id+"'";
			html +="<div class='row question' name="+id+"><div class='col-lg-12 no-padding'><span>"+i+".</span>"+question.questions+"</div></div>";
			html +="<div class='row answer'>";
		//$.each(question.answer, function(k,para){
		//	html +="<p class='col-lg-12'>"+para+"</p>";
		//});
		html +=question.answer;
		html +="</div>";
	});
	$(".question-list").html(html);
	$(".answer").hide();
}

/**
 * users click to see questions answer make an ajax call
 *
 *
 * @param clickedQuestion
 */
function increateClickNumber(clickedQuestion){
	console.log(clickedQuestion);
	var id=clickedQuestion.attr("name");
	var url = "./index.php?route=FAQ/increaseClickNumber/"+id;
	console.log(url);
	$.get(url, function(data, success){

	});
}

/**
 * hint for searching question
 *
 *
 */

function searchQuestion(){
	$('#searchBox').keyup(function(){
		var hint='';
		var str = $(this).val();
		var orderBy = $('#sort-by').val();
		var category =$('#question-list').val();
		var url = "./index.php?route=FAQ/searchQuestion/"+str+'/'+orderBy+'/'+category;
		console.log(url);
		$.get(url, function(date){
			var obj	=JSON.parse(date);
			console.log(obj);
				selectedQuestions(obj);

		})
	})

}
/**
 * prevent sumbit search form
 *
 */
function submitForm(){
	$("#search-form").submit(
		function(event){
			event.preventDefault();
		}
	);
}

//function showTerms(){
//	$('#showTerms').on('click',function(e){
//		if ($(this).attr('href') != window.location.href)
//		{
//			e.preventDefault();
//			$("#showFAQ").parent().toggleClass("active");
//			$(this).parent().toggleClass("active");
//			var url="./index.php?route=Terms/index";
//			$.get(url, function(data,success){
//					console.log(data);
//			})
//		}
//	});
//}
init();