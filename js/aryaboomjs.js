$(document).ready(function(){

// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function () {
$(window).scroll(function () {
if ($(this).scrollTop() > 100) {
$('#back-top').fadeIn();
} else {
$('#back-top').fadeOut();
}
});

// scroll body to 0px on click
$('#back-top a').click(function () {
$('body,html').animate({
scrollTop: 0
}, 800);
return false;
});
});

$(".slider").slick({
  infinite: true,
  slidesToShow: 4,
  autoplay: true,
  autoplaySpeed: 2000,
  swipeToSlide: true
      });
   $("#comment .comment-reply-link").text("پاسخ");
   $(".comment-author img").replaceWith('<i class="fa fa-user"></i>');
   $(".says").hide();
   $("#numeric-nav .navigation .next-prev:first-child a").text("قبل");
   $("#numeric-nav .navigation .next-prev:last-child a").text("بعد");
   $("#nav-post #nav #cat #down-cat .categories").contents().filter(function(){
    return this.nodeType == 3 && $.trim(this.nodeValue).length;}).wrap('<span class="new"/>');
   $("#nav-post #nav #cat #down-cat .categories .new").hide();
    $("#main #header-1 #tap-me").click(function(){
           $("#main #header-1 .col-8").slideToggle();
});  
});
