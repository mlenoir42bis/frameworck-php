  function updateSettingData(name, firstname, email) {
    let type = "POST";
    let url = "/setting/updateSettingData/"
    let data = {name: name, firstname: firstname, email: email};
    function fRes(ret) {
      ret = JSON.parse(ret);
      displayMsg("#msg", ret);
      $(".profile-usertitle-name").html(firstname + " " + name);
    }
    function fErr(ret) {
      console.log("Ferr : \n" + ret);
    }
    myAjax(type, url, data, fRes, fErr);
  }

  function updateSettingPassword(currentPass, newsPass) {
    let type = "POST";
    let url = "/setting/updateSettingPassword/"
    let data = {currentPass: currentPass, newsPass: newsPass};
    function fRes(ret) {
      ret = JSON.parse(ret);
      displayMsg("#msg", ret);
      console.log("Fret : \n" + ret);
    }
    function fErr(ret) {
      console.log("Ferr : \n" + ret);
    }
    myAjax(type, url, data, fRes, fErr);
  }

$( document ).ready(function() {

  $( "#settingData" ).submit(function(event) {
    event.preventDefault();
    $("#msg"). html("");
    let name = $("#settingData #name").val();
    let firstname = $("#settingData #firstname").val();
    let email = $("#settingData #email").val();
    updateSettingData(name, firstname, email);
  });
  $( "#settingPassword" ).submit(function(event) {
    event.preventDefault();
    $("#msg"). html("");
    let currentPass = $("#settingPassword #currentPassword").val();
    let newsPass = $("#settingPassword #newsPassword").val();
    updateSettingPassword(currentPass, newsPass);
  });

});
