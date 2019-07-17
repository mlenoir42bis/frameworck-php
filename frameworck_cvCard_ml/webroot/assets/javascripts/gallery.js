function displayMsgGallery(tag, ret) {
    if (ret != true) {
      $(tag).append("<div class='alert alert-danger error_info_message'>"+ret+"</div>");
    }
    else {
      $(tag).append("<div class='alert alert-success error_info_message' style='text-align:center!important;'> Success process </div>");
    }
}

$(document).ready(function(){

    $( "#addGallery" ).submit(function(event) {
        event.preventDefault();
    
        let data = new FormData(this);
        let type = "POST";
        let url = "/up/set/";
    
        function fRes(ret) {
            
            ret = JSON.parse(ret);
            $("#msgGallery").html("");

            if (ret.error == true) {
                displayMsgGallery($("#msgGallery"), ret.message);
            }
            else {

                $.each(ret, function( i, v ) {
                    console.log( i + ": " + v );
                    console.log(ret[i].err);
                    if (ret[i].err == false) {
                        displayMsgGallery($("#msgGallery"), true);
                    }
                    else {
                        $.each(ret[i].msg, function (j,w){
                            let fileName = ret[i].file;
                            let msg = fileName + " " + j + " " + w + "</br>";
                            displayMsgGallery($("#msgGallery"), msg);
                        });       
                    }
                
                });
            }
            
            
            console.log(ret);
        }
        function fErr(ret) {
          console.log("Ferr : \n" + ret);
        }
        myAjaxUpload(type, url, data, fRes, fErr);
    });

});