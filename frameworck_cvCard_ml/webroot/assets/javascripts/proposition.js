$(document).ready(function(){

console.log("g-proposition");

    var map;
    var markers = [];

    initMap();

    resizeWithTagOnResize('#map', "#mapSection");
    
    function initMap() {
        var paris = { lat: 48.862725, lng: 2.287592 };
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: paris
        });

        google.maps.event.addListener(map, 'click', function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            $("#lat").html(lat);
            $("#lng").html(lng);
            
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            
            var marker = new google.maps.Marker({
                position: event.latLng,
                map: map,
                title: 'Click to zoom'
            });
            markers.push(marker);
        });
    }
  
    $("#btn-map").on('click', function(e) {
        e.preventDefault();

        let country = $('#country').val();
        let adress = $('#adress').val();
        let cp = $('#cp').val();

        let completAdress = adress + ', ' + cp + ', ' + country;
        completAdress = completAdress.replace(/\s/g, '+');

        let url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + completAdress+ "&key=AIzaSyCZrOArua5Xw1y2LZYquB6sg05_oKXOkh0";
        let type = "POST";
        let data = [];        
        function fRes(ret) {
            if (ret.status == "OK") {
                let myLatLng = {lat: ret.results[0].geometry.location.lat, lng: ret.results[0].geometry.location.lng};
                
                $("#lat").html(ret.results[0].geometry.location.lat);
                $("#lng").html(ret.results[0].geometry.location.lng);

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: myLatLng
                  });
                
                let marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Click to zoom'
                  });
                markers.push(marker);
                displayMsg($("#msgMap"), true)
            }
            else {
                displayMsg($("#msgMap"), "Adresse non trouvée")
            }
        }
        function fErr(ret) {
            console.log("Ferr : \n" + ret);
        }
        myAjax(type, url, data, fRes, fErr);

    });

    function changeDisplayListGroupMulti() {
        exist = 0;
        noExist = 0;
        $(".list-group-multi li").each(function( index ) {
            if ($(this).hasClass("active") && $(this).hasClass("no-exist")) {
                noExist += 1;
            }
            if ($(this).hasClass("active") && $(this).hasClass("exist")) {
                exist += 1;
            }
        });

        if(exist > 0) {
            $(".wm-exist").show();
        } else {
            $(".wm-exist").hide();
        }
        if(noExist > 0) {
            $(".wm-no-exist").show();
        } else {
            $(".wm-no-exist").hide();
        }
    }
    changeDisplayListGroupMulti();
    $(".list-group-multi").on('click', ".list-group-item-multi", function(e){
        changeDisplayListGroupMulti();
    });

    changeActive();
    changeActiveMulti();

    $(".presentation").hide();  
    $(".multiLanguage").hide();
    $(".infoDesign").hide();
    $("#dateEndProject").hide();
    listGroupBoolShowOnActive("#entreprise", ".presentation");
    listGroupBoolShowOnActive("#multiple", ".multiLanguage");
    listGroupBoolShowOnActive("#designBoolTrue", ".infoDesign");
    listGroupBoolShowOnActive("#dateEndProjectBoolTrue", "#dateEndProject");

    function appendFormFunctionnality(parentTag, tag, lvlIndex) {
        let html = "";
        html += "<div class='container form-group-multiple-g form-group-multiple-g-" + lvlIndex + "'>";
            html += "<div class='col-md-12'>";
                html += "<label for='nameFunctionnality" + tag  + "'>Nom fonctionnalité</label>";
                html += "<input type='text' name='nameFunctionnality" + tag + "[]' class='form-control form-input nameFunctionnality'>";
            html += "</div>";
            html += "<div class='col-md-12'>";
                html += "<label for='descriptionFunctionnality" + tag + "'>Description fonctionnalitées</label>";
                html += "<textarea name='descriptionFunctionnality" + tag + "[]' class='form-control form-textarea form-textarea descriptionFunctionnality' rows='4'></textarea>";
            html += "</div>";
            html += "<button class='btn btn-sm btn-blue pull-right deleteFunctionnality" + tag + " delete'>Supprimer</button>";   
        html += "</div>";
        $(parentTag).append(html);
    }
    function appendFormPage() {
        let html = "";
        html += "<div class='container form-group-multiple-g form-group-multiple-g-3'>";
            html += "<div class='col-md-12'>";
                html += "<button 'type='button' class='btn btn-sm btn-blue pull-right delete deletePage'>Supprimer</button>";
                html += "<span class='hide nbPage'></span>";
            html += "</div>";
            
            html += "<div class='col-md-12'>";
                html += "<div class='form-group-g form-group form-group-form-proposition'>";
                    html += "<label for='namePage'>Nom page</label>";
                    html += "<input type='text' name='namePage[]' class='form-control form-input namePage'>";
                html += "</div>";
            html += "</div>";

            html += "<div class='col-md-12'>";
                html += "<div class='form-group-g form-group form-group-form-proposition'>";
                    html += "<label for='descriptionPage'>Description page</label>";
                    html += "<textarea name='descriptionPage[]' class='form-control form-textarea descriptionPage' rows='4'></textarea>";
                html += "</div>";
            html += "</div>";

            html += "<div class='col-md-12'>";
                html += "<div class='form-group-g form-group form-group-form-proposition'>";
                    html += "<label for='contentStaticPage'>Contenu statique</label>";
                    html += "<textarea name='contentStaticPage[]' class='form-control form-textarea contentStaticPage' rows='4'></textarea>";
                html += "</div>";
            html += "</div>";

            html += "<div class='col-md-12'>";
                html += "<div class='form-group-g form-group form-group-form-proposition'>";
                    html += "<label for='contentDynamicPage'>Contenu dynamique</label>";
                    html += "<textarea name='contentDynamicPage[]' class='form-control form-textarea contentDynamicPage' rows='4'></textarea>";
                html += "</div>";
            html += "</div>";

            html += "<div class='col-md-12'>";
                html += "<div class='form-group-g form-group form-group-form-proposition'>";
                    html += "<label for='filePage'>Fichiers associé (format file)(format file multiple) ( format fichier Accepted: 'jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf' )</label>";
                    html += "<input type='file' name='filePage[]' class='form-g-upload form-g-upload-multpile form-control filePage' multiple>";
                html += "</div>";
            html += "</div>";

            html += "<div class='col-md-12 functionnality-page'>";
                html += "<label for='form-proposition'>Fonctionnalitées de la page</label>";
                html += "<div class='col-md-12'>";    
                    html += "<button type='button' class='btn btn-sm btn-blue more moreFunctionnalityPage'>+</button>";
                html += "</div>";
                html += "<div class='col-md-12 functionnality-page'>";
                html += "</div>";
            html += "</div>";

        html += "</div>";
        $("#proposition-page").append(html);
    }

    function formatPage(tag) {
        let i = 0;
        tag.each(function(index) {
            $(this).children().children(".nbPage").html(i);
            let name = $(this).children('.functionnality-page').children('.functionnality-page').children('.container').children('.col-md-12').children('.nameFunctionnality');
            name.each(function(index) {
                $(this).attr('name', "nameFunctionnalityPage[" + i + "][]");
            });
            let description = $(this).children('.functionnality-page').children('.functionnality-page').children('.container').children('.col-md-12').children('.descriptionFunctionnality');
            description.each(function(index) {
                $(this).attr('name', "descriptionFunctionnalityPage[" + i + "][]");
            });
            let filePage = $(this).children().children('.form-group-g').children(".filePage");
            filePage.attr('name', "filePage[" + i + "][]");
            i++;
        });
    }

    $("#moreFunctionnality").on('click', function(e) {
        appendFormFunctionnality("#group-proposition-functionnality", "", "3");
    });
    $("#group-proposition-functionnality").on('click', ".deleteFunctionnality", function(e) {
        $(this).parent('.form-group-multiple-g').remove();
    });

    $("#morePage").on('click', function(e) {
        appendFormPage();
        let tag = $(this).parent().next().children('#proposition-page').children('.form-group-multiple-g');
        formatPage(tag);
    });
    $("#proposition-page").on('click', '.deletePage',function(e) {
        let tag = $(this).parent().parent('.form-group-multiple-g').parent('#proposition-page');
        $(this).parent().parent('.form-group-multiple-g').remove();
        tag = tag.children('.form-group-multiple-g');
        formatPage(tag);
    });

    $("#proposition-page").on('click', '.moreFunctionnalityPage',function(e) {
        appendFormFunctionnality($(this).parent().next('.functionnality-page'), "Page", "4");
        formatPage($(this).parent().parent().parent().parent().children('.form-group-multiple-g'))
    });
    $("#proposition-page").on('click', '.deleteFunctionnalityPage',function(e) {
        let tag = $(this).parent().parent().parent().parent().parent().children('.form-group-multiple-g');
        $(this).parent('.form-group-multiple-g').remove();
        formatPage(tag);
    });

    $(".proposition").on("submit", "#formProposition", function(e) {
        e.preventDefault();
        console.log("submit");

        let data = new FormData(this);

        let statusLegal = $('#statusLegal').children('.active').attr('id');
        let language = $('#language').children('.active').attr('id');
        let dateEndProjectBool = $('#dateEndProjectBool').children('.active').attr('value');
        let npApp = $('#nbApp').children('.active').attr('id');
        let designBool = $('#designBool').children('.active').attr('value');
        let quotation = $('#quotation').children('.active').attr('value');
        let registration = $('#registration').children('.active').attr('value');
        let lat = $('#mapSection').children('.form-group').children('#lat').html();
        let lng = $('#mapSection').children('.form-group').children('#lng').html();
        
        let typeAppAll = $('#typeApp').children('.active');
        let typeApp = [];
        let i = 0;
        typeAppAll.each(function( index ) {
            typeApp[i] = $(this).attr('id');
            i++;
        });

        data.append('lat', lat);
        data.append('lng', lng);
        data.append('statusLegal', statusLegal);
        data.append('typeApp', typeApp);
        data.append('language', language);
        data.append('dateEndProjectBool', dateEndProjectBool);
        data.append('designBool', designBool);
        data.append('quotation', quotation);
        data.append('registration', registration);

        let type = "POST";
        let url = "/proposition/setProposition/";
        function fRes(ret) {
            
            ret = JSON.parse(ret);
            console.log(ret);
            if (ret.error == true) {
                displayMsg($("#msg"), ret.dataError.message)
            }
            else {
                displayMsg($("#msg"), true)
            }
            $('html, body').animate({ scrollTop: $('#msg').offset().top }, 'slow');
            
        }
        
        function fErr(ret) {
            console.log("Ferr : \n" + ret);
        }
        myAjaxUpload(type, url, data, fRes, fErr);

    });

});
  