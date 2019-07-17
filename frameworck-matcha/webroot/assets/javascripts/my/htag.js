function displayMsgHtag(tag, bool, msg) {
  if (bool != true) {
    tag.html("<div class='alert alert-danger error_info_message'>"+msg+"</div>");
  }
  else {
    tag.html("<div class='alert alert-success error_info_message'> Success process </div>");
  }
}

function autoComplete(tag) {
  $("#hTagAutoComplete").empty();
  var text = tag[0].textContent;
  let type = "POST";
  let url = "/htag/autoComplete/"
  let data = {text: text};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (Array.isArray(ret)) {
        for (var elem in ret) {
          let html = "<div class='hTagAltern'>";
          html += ret[elem];
          html += "</div>";
          $("#hTagAutoComplete").append(html);
        }
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function keyEnter(tag) {
  var name = $.trim(tag[0].textContent);
  if (name != "") {
    let type = "POST";
    let url = "/htag/insert/"
    let data = {name: name};
    function fRes(ret) {
      ret = JSON.parse(ret);
      if (ret == false) {
        displayMsgHtag($("#hTagMsg"), false, "Error in process");
      }
      else {
         let html = "<div class='hTagBloc'>"
         html += "<div class='hTag' contenteditable='false'>" + name + "</div>";
         html += "<span class='glyphicon glyphicon-remove remove' aria-hidden='true' attr-id='" + ret + "'></span>";
         html += "</div>";
         $("#hTagValid").append(html);
         tag.empty();
         displayMsgHtag($("#hTagMsg"), true, null);
      }
    }
    function fErr(ret) {
      console.log("Ferr : \n" + ret);
    }
    myAjax(type, url, data, fRes, fErr);
  }else {
    tag.empty();
  }
}

function deleteHtag(id, name, elem) {
  let type = "POST";
  let url = "/htag/delete/"
  let data = {id: id, name: name};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (ret != false) {
      elem.remove();
      displayMsgHtag($("#hTagMsg"), true, null);
    }
    else {
      displayMsgHtag($("#hTagMsg"), false, ret);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}


$(document).ready(function(){

  $("#hTagValid").on("click", ".remove", function(e) {
    $("#hTagMsg").empty();
    let id = $(this).attr('attr-id');
    let name = $(this).prev(".hTag").html();
    let elem = $(this).parent();
    deleteHtag(id, name, elem);
  });

  $("#hTagAutoComplete").on("click", ".hTagAltern", function(e) {
    $("#hTagMsg").empty();
    let text = $(this).html();
    $("#hTag").html(text);
    autoComplete($("#hTag"));
  });

  $("#hTag").on("keyup",function(e) {
    $("#hTagMsg").empty();
    if (e.keyCode == 13) {
      if (e.preventDefault) {
        e.preventDefault();
      }
      keyEnter($(this));
    }
    else {
      autoComplete($(this));
    }
  });

});
