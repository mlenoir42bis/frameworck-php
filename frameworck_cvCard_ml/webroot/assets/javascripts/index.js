$(document).ready(function(){

  $(".dataToggle").hide();
  $('.block-toggle').on('mouseenter', function(e) {
    $(this).children(".dataToggle").toggle("slow");
  });
  $('.block-toggle').on('mouseleave', function(e) {
    $(this).children(".dataToggle").toggle("slow");
  });

});
