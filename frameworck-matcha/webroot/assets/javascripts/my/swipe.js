function displayMsgSwipe(tag, bool, msg) {
  if (bool != true) {
    tag.html("<div class='alert alert-danger error_info_message'>"+msg+"</div>");
  }
  else {
    tag.html("<div class='alert alert-success error_info_message'> Success process </div>");
  }
}

function getGeoGmap() {

  if (navigator.geolocation) {

    function success(position) {
      var locCurrent = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'latLng': locCurrent }, function (results, status) {
          results = _.values(results[0]);
          var country = "";
          var postal = "";
          var state = ""
          if (results[0].length > 6) {
            state = results[0][4].long_name;
            country = results[0][5].long_name;
            postal = results[0][6].long_name;
          }
          else {
            state = results[0][3].long_name;
            country = results[0][4].long_name;
            postal = results[0][5].long_name;
          }
          var myData = {
                      city    : results[0][2].long_name,
                      state   : state,
                      country : country,
                      postal  : postal,
                      adresse  : results[1],
                      lat     : position.coords.latitude,
                      lng     : position.coords.longitude
                    };
          setGeolocation(myData);
        });
    };

    function error(err) {
      switch(error.code)
      {
          case error.PERMISSION_DENIED: console.log("user did not share geolocation data");
          break;

          case error.POSITION_UNAVAILABLE: console.log("could not detect current position");
          break;

          case error.TIMEOUT: console.log("retrieving position timed out");
          break;

          default: console.log("unknown error");
          break;
      }
    };

    navigator.geolocation.getCurrentPosition(success, error, {timeout:10000});
  }
}

function swipeChoice(idLiked, status, geo) {
  let type = "POST";
  let url = "/like/setLike/"
  let data = {idLiked: idLiked, status: status};
  function fRes(ret) {
    console.log("like => " + ret);
    getSwipe(geo.lat, geo.lng);
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function getSwipe(lat, lng) {
  let type = "POST";
  let url = "/swipe/getSwipe/"
  let data = {lat: lat, lng: lng};
  function fRes(ret) {
    console.log("getSwipe => " + ret);
    ret = JSON.parse(ret);
    $("#swipePict .carousel-indicators").empty();
    $("#swipePict .carousel-inner").empty();
    $("#swipe-id-profil").empty();
    if (ret.err == false) {
      for (nb in ret.data) {
        let html = "";
        if (nb == 0) {
          $("#swipe-id-profil").html(ret.data[nb].id_user);
          $("#swipePict .carousel-indicators").append("<li data-slide-to='" + nb + "' class='active'></li>");
          html = "<div class='item active'>";
        }
        else {
          $("#swipePict .carousel-indicators").append("<li< data-slide-to='" + nb + "' class=''></li>");
          html = "<div class='item'>";
        }
        html += "<div class='carousel-pict'><img src='/upload/" + ret.data[nb].email + "." + ret.data[nb].id_user + "/" + ret.data[nb].name + "' class='img-responsive' alt=''></div>";
        html += "</div><div class='carousel-caption'><h2></h2></div></div>";
        $("#swipePict .carousel-inner").append(html);
      }
    }
    else {
      $("#swipePict .carousel-indicators").append("<li data-slide-to='" + 0 + "' class='active'></li>");
      let html = "<div class='item active'>";
      html += "<div class='carousel-pict'><img src='/assets/images/no-more-profil.png' class='img-responsive' alt=''></div>";
      html += "</div><div class='carousel-caption'><h2></h2></div></div>";
      $("#swipePict .carousel-inner").append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function setFeature(geo) {
  $("#blocPage").hide();

  getSwipe(geo.lat, geo.lng);

  $("#like").on("click", function(e) {
      console.log("clik like");
      let idLiked = $("#swipe-id-profil").html();
      swipeChoice(idLiked, 1, geo);
  });
  $("#dislike").on("click", function(e) {
      console.log("clik dislike");
      let idLiked = $("#swipe-id-profil").html();
      swipeChoice(idLiked, 0, geo);
  });

}

function setGeolocation(geo) {
  let type = "POST";
  let url = "/geolocation/setGeolocation/"
  let data = {data: geo};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (ret == true) {
      setFeature(geo);
    }
    else {
      displayMsgSwipe($("#msg"), false, "Error in retrieving your geolocation data")
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

function getGeolocation() {
  let type = "POST";
  let url = "/geolocation/getGeolocation/"
  let data = {};
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    console.log(ret);
    if (ret.data <= 0) {
      console.log("geo uncknow");
      getGeoGmap();
    }
    else {
      console.log("geo already");
      setFeature(ret.data[0]);
    }
  }
  function fErr(ret) {
    console.log("Ferr: \n" + JSON.stringify(ret));
  }
  myAjax(type, url, data, fRes, fErr);
}

$(document).ready(function(){

  getGeolocation();
  $("#blocPageBtn").on("click", function(e) {
    getGeoGmap();
  });

});
