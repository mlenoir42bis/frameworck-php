function setLike(id) {
  let type = "POST";
  let url = "/like/setLike/"
  let data = {idLiked: id, status: 1};
  function fRes(ret) {
    console.log("like => " + ret);
    ret = JSON.parse(ret);
    if (ret == true) {
      console.log('its true');
      $("#viewsProfilMsgLike").empty();
      $("#viewsProfilMsgLike").html('<div class="alert alert-success error_info_message">This profil is Liked</div>');
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function setUnlike(id) {
  let type = "POST";
  let url = "/like/setLike/"
  let data = {idLiked: id, status: 0};
  function fRes(ret) {
    console.log("dislike => " + ret);
    ret = JSON.parse(ret);
    if (ret == true) {
      console.log('its true');
      $("#viewsProfilMsgLike").empty();
      $("#viewsProfilMsgLike").html('<div class="alert alert-danger error_info_message">This profil is disliked</div>');
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function setReport(id) {
  let type = "POST";
  let url = "/badaccount/setReport/"
  let data = {idBad: id};
  function fRes(ret) {
    console.log("report => " + ret);
    ret = JSON.parse(ret);
    if (ret == true) {
      console.log('its true');
      $("#viewsProfilMsgBadAccount").empty();
      $("#viewsProfilMsgBadAccount").html('<div class="alert alert-danger error_info_message">This profil is reported as a bad account</div>');
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function setBlock(id) {
  let type = "POST";
  let url = "/blockaccount/setBlock/"
  let data = {idBlocked: id};
  function fRes(ret) {
    console.log("block => " + ret);
    ret = JSON.parse(ret);
    if (ret == true) {
      console.log('its true');
      $("#viewsProfilMsgBlocked").empty();
      $("#viewsProfilMsgBlocked").html('<div class="alert alert-danger error_info_message">This profil is reported as a bad account</div>');
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

$(document).ready(function(){

  $("#viewsProfilLike").on("click", function(e) {
      console.log("clik like");
      let idLiked = $("#idViewsProfil").html();
      setLike(idLiked);
  });
  $("#viewsProfilDislike").on("click", function(e) {
      console.log("clik dislike");
      let idLiked = $("#idViewsProfil").html();
      setUnlike(idLiked);
  });
  $("#viewsProfilBadAccount").on("click", function(e) {
      console.log("clik badAccount");
      let idLiked = $("#idViewsProfil").html();
      setReport(idLiked);
  });
  $("#viewsProfilBlockAccount").on("click", function(e) {
      console.log("clik badAccount");
      let idLiked = $("#idViewsProfil").html();
      setBlock(idLiked);
  });
});
