$(document).ready(function(){
  $('.slick-test').slick({
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  prevArrow: $('.slick-prev'),
  nextArrow: $('.slick-next'),	  
  });
});
