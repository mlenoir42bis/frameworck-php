(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
  $( "#portfolio-gallery" ).hide();
  $( "#portfolio" ).on("click", function() {
    $( "#portfolio-gallery" ).slideDown( "slow" );
  });

});
