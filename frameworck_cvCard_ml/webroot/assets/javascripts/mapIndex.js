
$( document ).ready(function() {
  var map;

  modal();
  initMap();
  
  resizeWithTagOnResize('#map', "#mapSection")
  
  function submitFormModal (lat, lng) {
    $( "#myFormPost" ).submit(function(event) {
      event.preventDefault();

      let data = new FormData(this);
      data.append("lat", lat);
      data.append("lng", lng);
      let type = "POST";
      let url = "/post/postMap/";

      function fRes(ret) {
        ret = JSON.parse(ret);
        console.log(ret);
        displayMsg("#msgPost", ret.msg);
        if (ret.err == false) {
          let dataMarker = {
            lng : lng,
            lat : lat,
            mydate : Date.now(),
            pict : ret.img,
            subject : ret.subject
          }
          initMap();
        }
      }
      function fErr(ret) {
        console.log("Ferr : \n" + ret);
      }
      myAjaxUpload(type, url, data, fRes, fErr);
    });
  }
  function modal() {
    var modal = document.getElementById('myModal');
    $('.closeModal').on('click', function(e) {
      modal.style.display = "none";
    });
    $( "#map" ).dblclick(function() {
      modal.style.display = "block";
    });
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    $('#mapPosition').on('click', function(e) {
      
      var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      };
      
      function success(pos) {
        var crd = pos.coords;
      
        console.log('Votre position actuelle est :');
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude: ${crd.longitude}`);
        console.log(`Plus ou moins ${crd.accuracy} mètres.`);

        $("#lat").html(crd.latitude);
        $("#lng").html(crd.longitude);
        $("#msgPost").html("");
        $("#subjectPost").val('');
        $("#pictPost").val('');

        modal.style.display = "block";
        submitFormModal (crd.latitude, crd.longitude);
      };
      
      function error(err) {
        alert(`ERROR(${err.code}): ${err.message}`);
      };
      
      navigator.geolocation.getCurrentPosition(success, error, options);

    });
  }

  function setMarkers(map, data){
    latlngset = new google.maps.LatLng(data.lat, data.lng);
    var marker = new google.maps.Marker({
      map: map, position: latlngset
    });

    let content = "<div>";
        content += "<img src='../../../../webroot/upload/postMap/" + data.pict + "' alt='pict' width='150' height='150'>";
        content += "<p style='color:black;width: 200px;margin:0 auto;white-space: initial;overflow: hidden;'>" + data.subject + "</p>";
        content += "</div>";

    document.getElementById('myModal').style.display = "none";
    var infowindow = new google.maps.InfoWindow();

    google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ return function() {
        infowindow.setContent(content);
        infowindow.open(map,marker);
      };
    })(marker,content,infowindow));
  }

  function getMarker(map){
    let type = "POST";
    let url = "/post/getPostMap/";
    let data = {};
    function fRes(ret) {
      ret = JSON.parse(ret);
      for (x in ret) {
        setMarkers(map, ret[x]);
      }
    }
    function fErr(ret) {
      console.log("Ferr : \n" + ret);
    }
    myAjax(type, url, data, fRes, fErr);
  }

  function initMap() {
    var paris = { lat: 48.862725, lng: 2.287592 };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: paris
    });

    getMarker(map);

    google.maps.event.addListener(map, 'dblclick', function(event) {
      var lat = event.latLng.lat();
      var lng = event.latLng.lng();

      $("#lat").html(lat);
      $("#lng").html(lng);
      $("#msgPost").html("");
      $("#subjectPost").val('');
      $("#pictPost").val('');

      submitFormModal(lat, lng);
    });
  }

});
