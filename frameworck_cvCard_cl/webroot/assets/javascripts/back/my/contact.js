function get() {
  let type = "POST";
  let url = "/contact/get/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#description").val(ret[0].description);;
    $("#officeNumber").val(ret[0].officeNumber);
    $("#labNumber").val(ret[0].labNumber);
    $("#firstEmail").val(ret[0].firstEmail);
    $("#secondEmail").val(ret[0].secondEmail);
    $("#skype").val(ret[0].skype);
    $("#twitter").val(ret[0].twitter);
    $("#linkedin").val(ret[0].linkedin);
    $("#descriptionOffice").val(ret[0].descriptionOffice);
    $("#descriptionWork").val(ret[0].descriptionWork);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function upd(post) {
  let type = "POST";
  let url = "/contact/update/";
  let data = post;
  function fRes(ret) {
    console.log(ret);
    get();
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
$(document).ready(function(){

  $("#formContact").submit(function(event) {
    event.preventDefault();
    let data = new FormData(this);
    upd(data);
  });

});
