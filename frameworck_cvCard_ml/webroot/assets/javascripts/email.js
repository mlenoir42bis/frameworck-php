$(document).ready(function(){

  $( "#myFormContact" ).submit(function(event) {
    event.preventDefault();

    let data = new FormData(this);
    let type = "POST";
    let url = "/post/sendEmail/";

    function fRes(ret) {
      ret = JSON.parse(ret);
      console.log(ret);
      if (ret.err == false) {
        displayMsg($("#emailMsg"), true);
      }
      else {
        displayMsg($("#emailMsg"), ret.msg);
      }
      $('#myFrom').val('');
      $('#subject').val('');
    }
    function fErr(ret) {
      console.log("Ferr : \n" + ret);
    }
    myAjaxUpload(type, url, data, fRes, fErr);
  });

});
