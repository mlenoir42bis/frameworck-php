function getPublication() {
  let type = "POST";
  let url = "/publication/get/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#myPublication table").empty();
    for (x in ret) {
      let html = "<tr><td width=80%>";
      html += ret[x].title + "</td>";
      html += "<td width=20%>";
      html += "<button class='btn btn-warning update'>Update</button>";
      html += "<button class='btn btn-danger delete'>Delete</button>";
      html += "<span class='hide'>" + ret[x].id + "</span>";
      html += "</td></tr>"
      $("#myPublication table").append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getById(id) {
  let type = "POST";
  let url = "/publication/getById/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('#title').val(ret.title);
    $('#author').val(ret.author);
    $('#myRelease').val(ret.myRelease);
    $('#type').val(ret.type);
    $('#obtaining option[value='+ret.type+']').attr("selected", true);
    $('#link').val(ret.link);
    $('#content').val(ret.content);
    $('#dateYear').val(ret.dateYear);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function insert(post) {
  let type = "POST";
  let url = "/publication/insert/"
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      getPublication();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}

function upd(post) {
  let type = "POST";
  let url = "/publication/update/"
  let data = post;
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);

    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function delet(id, tag) {
  let type = "POST";
  let url = "/publication/delete/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      tag.remove();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function updDesc(description) {
  let type = "POST";
  let url = "/publication/updDesc/";
  let data = {description: description};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function emptyForm()
{
  $("#formLaboratoryMember span").attr("update", false);
  $("#formLaboratoryMember span").html("");
  $('#title').val("");
  $('#author').val("");
  $('#myRelease').val("");
  $('#type').val("");
  $('#obtaining option').attr("selected", false);
  $('#link').val("");
  $('#content').val("");
  $('#dateYear').val("");
  $("#createLaboratory").hide();
}
$(document).ready(function(){

  $("#createPublication").hide();

  $('#myPublication').on('click', '.update', function(e) {
    let id = $(this).parent().children("span").html();
    $("#isUpdate").attr("update", true);
    $("#isUpdate").html(id);
    $("#msg").empty();
    getById(id);
    $("#createPublication").show();
  });
  $('#myPublication').on('click', '.delete',function(e) {
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent();
    $("#msg").empty();
    delet(id, tag);
    emptyForm();
  });
  $('#createPublication').on('click', function(e) {
    event.preventDefault();
    $("#msg").empty();
    emptyForm();
  });
  $( "#formPublication").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();
    let data = new FormData(this);
    if (update == 'true') {
      data.append("id", id);
      upd(data);
    }
    else {
      insert(data);
    }

  });
  $( "#formDescription").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let description = $("#description").val();
    updDesc(description);
  });
});
