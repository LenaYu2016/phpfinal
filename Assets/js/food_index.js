$(document).ready(
  function(){
      $(".menu .plus").hover(
          function(){
              $(this).prev().css('opacity','0.5');
              $(this).next().css("position","absolute");
              $(this).next().css("top","30%");
              $(this).next().css("left","42%");
              $(this).css("position","absolute");
              $(this).css("top","70%");
              $(this).css("left","75%");
              $(this).next().next().css("position","absolute");
              $(this).next().next().css("top","40%");
              $(this).next().next().css("left","35%");
          },function(){


          }
      );
      $(".menu .food_title").hover(
          function(){
              $(this).prev().prev().css('opacity','0.5');
              $(this).css("position","absolute");
              $(this).css("top","25%");
              $(this).css("left","32%");

              $(this).prev().css("position","absolute");
              $(this).prev().css("top","70%");
              $(this).prev().css("left","75%");
              $(this).next().css("position", "absolute");
              $(this).next().css("top","40%");
              $(this).next().css("left","35%");
          },function(){


          }
      );
      $(".menu img").hover(
          function(){
              $(this).css('opacity','0.5');
              $(this).next().css("position","absolute");
              $(this).next().css("top","70%");
              $(this).next().css("left","75%");
              $(this).next().next().next().css("position","absolute");
              $(this).next().next().next().css("top","40%");
              $(this).next().next().next().css("left","35%");

          },function(){
              $(this).css('opacity','1');
              $(this).next().css("position","absolute");
              $(this).next().css("top","-10000");
              $(this).next().next().next().css("position","absolute");
              $(this).next().next().next().css("top","-10000");
          }
      );
      $(".menu img").hover(
          function(){
              $(this).next().next().css("position","absolute");
           $(this).next().next().css("top","25%");
              $(this).next().next().css("left","32%");
          },
          function(){
              $(this).next().next().css("position","absolute");
              $(this).next().next().css("top","-10000");

          }
      );
      $('.glyphicon-plus').hover(
          function(){
              $(this).parent().css("position","absolute");
              $(this).parent().css("top","70%");
              $(this).parent().css("left","75%");

          }
      );
      $('.view').hover(
          function() {
              $(this).css("position", "absolute");
              $(this).css("top","40%");
              $(this).css("left","35%");
              $(this).prev().prev().prev().css('opacity','0.5');
              $(this).prev().prev().css("position","absolute");
              $(this).prev().prev().css("top","70%");
              $(this).prev().prev().css("left","75%");
              $(this).prev().css("position","absolute");
              $(this).prev().css("top","25%");
              $(this).prev().css("left","32%");

          }
      );


  }
);


