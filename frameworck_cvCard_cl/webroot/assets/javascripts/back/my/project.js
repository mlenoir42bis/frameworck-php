function insertProject(post) {
  let type = "POST";
  let url = "/project/insert/";
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      getProject();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function getProject() {
  let type = "POST";
  let url = "/project/getProject/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#myProject").empty();
    for (x in ret) {
      let html = "<div class='block row'>";
      html += "<div class='col-md-2'>";
      if (ret[x].pic) {
        html += "<img src='../../webroot/upload/" + ret[x].pic + "'>";
      }
      html += "</div>";
      html += "<div class='col-md-8' style='border-right: 1px solid black; min-height: 100px;'>";
      html += ret[x].title;
      html += "</div>";
      html += "<div class='col-md-2'>";
      html += "<button class='btn btn-warning update'>Update</button>";
      html += "<button class='btn btn-danger delete'>Delete</button>";
      html += "<span class='hide'>" + ret[x].id + "</span>";
      html += "</div></div>";
      $("#myProject").append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function delet(id, tag) {
  let type = "POST";
  let url = "/project/delete/";
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
function updProject(post) {
  let type = "POST";
  let url = "/project/upd/";
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function getById(id) {
  let type = "POST";
  let url = "/project/getProjectById/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#title").val(ret[0].title);
    $("#description").val(ret[0].description);
    $("#content").val(ret[0].content);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

$(document).ready(function(){

  $("#formProject #createProject").hide();

  $('#myProject').on('click', '.delete', function(e) {
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent();
    $("#msg").empty();
    delet(id , tag);
  });

  $('#myProject').on('click', '.update', function(e) {
    let id = $(this).parent().children("span").html();
    $("#isUpdate").attr("update", true);
    $("#isUpdate").html(id);
    $("#createProject").show();
    $("#msg").empty();
    getById(id);
  });

  $('#createProject').on('click', function(e) {
    $("#msg").empty();
    $("#isUpdate").attr("update", false);
    $("#isUpdate").html("");
    $("#createProject").hide();
    $("#title").val("");
    $("#description").val("");
    $("#content").val("");
    $("#file").val("");
  });

  $( "#formProject").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let update = $("#formProject span").attr("update");
    let id = $("#formProject span").html();
    let data = new FormData(this);
    if (update == 'true') {
      data.append("id", id);
      updProject(data);
    }
    else {
      insertProject(data);
    }

  });

});
