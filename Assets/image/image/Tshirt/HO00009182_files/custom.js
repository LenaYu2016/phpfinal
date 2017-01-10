// JavaScript Document
$(window).on("scroll", function() {
 if ($(window).width() > 1024)
{
  if ($(document).scrollTop() > 150) {
    $(".navbar .container-fluid").addClass("fixed");
  } else {
    $(".navbar .container-fluid").removeClass("fixed");
  }
}
});
$(document).ready(function(){
	$('ul.dropdown-menu.login-dd').click(function(e) {
        e.stopPropagation();
    });
	$('.card-cont:first').show();
	$('.pv-card a').click(function(){
		$('.pv-card a').removeClass('active');
		$(this).addClass('active');
		var currentTab = $(this).attr('href');
			$('.card-cont').hide();
			$(currentTab).fadeIn();
			return false;
	});
	$("#nogift").click(function()
	{
		$("#ngift").show();
		$("#ygift").hide();
	});
	$("#yesgift").click(function()
	{
		$("#ygift").show();
		$("#ngift").hide();
	});
	// acc faq
	$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().find(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
})
$('.collapse').on('hidden.bs.collapse', function(){
$(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
});
	
	$("#rad5").click(function()
		{
			$("#check").show();
			$("#reload").hide();
		});
		$("#rad6").click(function()
		{
			$("#reload").show();
			$("#check").hide();
		});
	/*
	 * $(".edit").click(function() { $(this).css("display" , "none");
	 * $(".change").css("display" , "none");
	 * $(".edit-prof").css("display","block"); $(".my-prof").hide();
	 * $(".conf-pass").hide(); })
	 */
	/*
	 * $(".click-can").click(function() { $(".edit").css("display" ,
	 * "inline-block"); $(".change").css("display" , "inline-block");
	 * $(".edit-prof").hide(); $(".my-prof").show(); $(".conf-pass").hide(); })
	 */
	/*
	 * $(".change").click(function() { $(".conf-pass").show();
	 * $(".edit-prof").hide(); $(".my-prof").hide(); })
	 */
	/*
	 * $(".click-up").click(function() { $(".edit-prof").hide();
	 * $(".otp-box").show(); });
	 */
	
	
	// seat-dining
			
	$(".menuclick").click(function()
	{
		$("#menumodal").addClass("pop-up")
		$('body').addClass("menu-open")
		$(".content-box").show();
		  $(".book-popup").hide();
	})
	$(".close-btn").click(function()
	{
		$("#menumodal").removeClass("pop-up")
		$('body').removeClass("menu-open")
	})
	$("#carousel-menu").carousel(
	{
		interval:false
	});
	
	
	$(".menu-click").click(function()
			 {
			  $("#menumodal").removeClass("pop-up")
			  $('body').removeClass("menu-open")
			 })
			/* $(".menu-click").click(function()
			 {
			  $(this).parents(".content-box").hide();
			  $(".book-popup").show();
			 })*/
	
	
		// check food
	$(".chk input[type=checkbox]").click(function()
	{
		$(this).is(':checked');
		$(this).next('label').toggleClass("checked");
	});
	
		// promotional carousel
		
	$('#carousel-main').carousel({interval:4000});
	$('#carousel-promotional').carousel({interval:4000});
	
 	
 // movieform radio button
 
 	
	$(".rad input[type=radio]").on("click" , function()
 	{
		 $(this).parent(".rad").find('label').removeClass('checked');
	 	 $(this).next().addClass('checked');
 	});
 	$(".rad2 input[type=radio]").on("click" , function()
 	{
		 $('.rad2').find('label').removeClass('checked');
	 	$(this).next().addClass('checked');
 	});
	
 // dropdown bookticket
 	
 	
 	$(".dropdown .dropdown-menu li a").click(function(){
		var currentValue = $(this).text();
		$(this).parents(".dropdown").find(".value").text(currentValue);
 	});
 	
 	$(".dropdown2 .dropdown-menu li a").click(function(){
		var currentValue = $(this).text();
		if(currentValue.length>35){
			currentValue = currentValue.substring(0, 35)+'...';
		}
		$(this).parents(".dropdown").find(".value").text(currentValue);
});
	
	// Seat Checks
     $('.seat input').change(function () {
         $(this).parent().children('label').toggleClass('checked')
	  });
     $('td').has('input[type=checkbox]:disabled').addClass('disable');

	$(".pay-tab li a").click(function()
	{
		$(".chk input[type=checkbox]").click(function()
		{
			$(this).is(':checked');
			$(this).next('label').toggleClass("checked");
		});
	});
	// datepicker
	$('.date').datepicker({
		   autoclose: true,
		   todayHighlight:true
		  });
	
	// autoclose datepicker
	
	$('.custdate').datepicker().on('changeDate', function(ev){$('.custdate').datepicker('hide');
	});
});
// nicescroll menu
	if ($(window).width() > 767)
	{
		// seat-layout scroll
		$("#movie-seat").click(function()
		{
		$(".seat-layout-cont").niceScroll();
		});
		$("#seatlayout .modal-header h4 span a").click(function()
		{
		$(".seat-layout-cont").getNiceScroll().remove();
		});
		// food-scroll
		$(".scrol-table").niceScroll();
		$("#headingTwo").click(function()
		{
			$(".scrol-table").niceScroll();
		});
		// food-tab click event scroll recall
		$(".meal-tab li a").click(function()
		{
			$(".scrol-table").getNiceScroll().remove();
			$(".scrol-table").niceScroll();
		})
		// ticket-book accordion click
		$("#headingOne").click(function()
		{
			$(".scrol-table").getNiceScroll().remove();
		})
		$("#seatlayout a").click(function()
		{
			$(".scrol-table").getNiceScroll().remove;
		});
		
	}


