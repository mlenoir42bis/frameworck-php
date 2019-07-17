$(document).ready(function(){

  let widthSwipe = $("#swipePict").outerWidth(true);
  if (widthSwipe < 360) {
    resizeTag($("#swipePict img"), $("#swipePict"));
  }
  $( window ).resize(function() {
    if (widthSwipe < 360) {
      resizeTag($("#swipePict img"), $("#swipePict"));
    }
  });
  function resizeTag(tag, parentTag) {
    let widthParent = parentTag.outerWidth(true);
    tag.css({
      width : widthParent - 20,
      height : widthParent - 20,
    });
  }

  function setLike(idliked, status) {
    let type = "POST";
    let url = "/like/setLike/";
    let data = {idliked: idliked, status:status};
    function fRes(ret) {
      if (ret.err == true) {
        displayMsg($("#swipeMsg"), "Error on script - try refresh page");
      }
      else {
        getPict();
      }
    }
    function fErr(ret) {
      console.log("Ferr: \n" + JSON.stringify(ret));
    }
    myAjax(type, url, data, fRes, fErr);
  }

  function getPict() {
    let type = "POST";
    let url = "/like/getPict/"
    let data = {};
    function fRes(ret) {
      ret = JSON.parse(ret);
      if (ret.err == true) {
        let html = "";
        html += "../../../../webroot/upload/gallery/";
        html += ret.pict;
        $( "#swipePict img" ).attr( 'src', html );
        $( "#swipePict span" ).html("");
      }
      else {
        for(nb in ret.pict) {
          if (ret.pict[nb] != false) {
            let html = "";
            html += "../../../../webroot/upload/gallery/";
            html += ret.pict[nb].pict;
            $( "#swipePict span" ).html( ret.pict[nb].id );
            $( "#swipePict img" ).attr( 'src', html );
            return false;
          }
        }
      }
    }
    function fErr(ret) {
      console.log("Ferr: \n" + JSON.stringify(ret));
    }
    myAjax(type, url, data, fRes, fErr);
  }

  getPict();

  var idpict = 0;
  $('#swipeConsole #dislike').on('click', function(e) {
    $('#swipeMsg').empty();
    idpict = $("#swipePict span").html();
    if (idpict !== "") {
      setLike(idpict, 0);
    }
  });
  $('#swipeConsole #like').on('click', function(e) {
    $('#swipeMsg').empty();
    idpict = $("#swipePict span").html();
    if (idpict !== "") {
      setLike(idpict, 1);
    }
  });

});
