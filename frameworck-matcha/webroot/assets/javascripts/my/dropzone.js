Dropzone.autoDiscover = false;

function displayMsgDropzone(tag, bool, msg) {
  if (bool != true) {
    tag.html("<div class='alert alert-danger error_info_message'>"+msg+"</div>");
  }
  else {
    tag.html("<div class='alert alert-success error_info_message'> Success process </div>");
  }
}

function displayFile(name, url, id, status) {
  let html = "<div class='dropzoneFile'>";
  html += "<img attr-id='" + id + "' attr-status='" + status + "' alt='" + name + "' src='" + url + "'>";
  html += "<div class='dropzoneFileHover'>";
  html += "<span class='glyphicon glyphicon-remove remove'></span>";
  html += "<span class='glyphicon glyphicon-ok select'></span>";
  html += "</div>";
  html += "</div>";
  $("#dropzoneAlready").append(html);
  $(".dropzoneFileHover").hide();
}

function getFile() {
  let type = "POST";
  let url = "/dropzone/getFile/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (ret != false) {
      $("#dropzoneAlready").empty();
      for (var elem in ret) {
        if (typeof ret[elem] === 'object') {
          displayFile(ret[elem].name, ret.dir + ret[elem].name, ret[elem].id, ret[elem].status);
        }
      }
    }
  }
  function fErr(ret) {
    console.log("Fret : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function updateStatusFile(id) {
  let type = "POST";
  let url = "/dropzone/updateStatusFile/"
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (!ret) {
      displayMsgDropzone($("#mydropAlreadyMsg"), false, ret);
    }
    else {
      getAvatar(getAvatarSidebar);
      displayMsgDropzone($("#mydropAlreadyMsg"), true, null);
    }
  }
  function fErr(ret) {
    console.log("Fret : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function deleteFile(id) {
  let type = "POST";
  let url = "/dropzone/deleteFile/"
  let data = {id: id};
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    if (!ret) {
      displayMsgDropzone($("#mydropAlreadyMsg"), false, ret);
    }
    else {
      displayMsgDropzone($("#mydropAlreadyMsg"), true, null);
    }
  }
  function fErr(ret) {
    console.log("Fret : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

$(document).ready(function(){

  $("#dropzoneAlready").on("mouseenter", ".dropzoneFile", function(e) {
    $(this).children(".dropzoneFileHover").slideDown("slow");
  });
  $("#dropzoneAlready").on("mouseleave", ".dropzoneFile", function(e) {
    $(this).children(".dropzoneFileHover").slideUp("slow");
  });

  $("#dropzoneAlready").on("click", ".remove", function(e) {
    let img = $(this).parent().parent().children("img");
    let idImg = $(this).parent().parent().children("img").attr("attr-id");
    deleteFile(idImg);
    $(this).parent().parent().remove();
    displayAvatar();
  });

  $("#dropzoneAlready").on("click", ".select", function(e) {
    let img = $(this).parent().parent().children("img");
    let idImg = $(this).parent().parent().children("img").attr("attr-id");
    $("#myAvatar").empty();
    img.clone().appendTo($("#myAvatar"));
    updateStatusFile(idImg);
    displayAvatar();
  });

  $(".dropzone").dropzone({
    url : '\/dropzone/upload\/',
    acceptedFiles : 'image/jpeg, images/jpg, image/png',
    addRemoveLinks : true,
    dictDefaultMessage : 'Click to add or drop photo',
    dictResponseError : 'Could not upload this photo',
    paramName : 'file',
    maxFilesize : '10',
    maxFiles : null,
    uploadMultiple: false,
    addRemoveLinks: false,
    init: function () {
      this.on("success", function (file, ret) {
        ret = JSON.parse(ret);
        displayMsgDropzone($("#dropzoneMsg"), ret.resUpload, null);
      });
      this.on("error", function (file, ret) {
        displayMsgDropzone($("#dropzoneMsg"), ret.resUpload, ret.msg);
        $(".dz-error-message").hide();
      });
      this.on("complete", function (file, ret) {
        getFile();
      });
    }
  });
});
