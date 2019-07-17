function insertMember(post) {
  let type = "POST";
  let url = "/laboratory/insertMember/";
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      getMember();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function updMember(post, id) {
  let type = "POST";
  let url = "/laboratory/updMember/";
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    getMember();
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function getMember() {
  let type = "POST";
  let url = "/laboratory/getMember/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#laboratoryMember").empty();
    for (x in ret) {
      let html = "<div class='row block'>";
      html += "<div class='col-md-4'>";
      html += "<img src='../../webroot/upload/"+ ret[x].pic + "'>";
      html += "</div>";
      html += "<div class='col-md-6'>";
      html += "<h4>"+ ret[x].name +"</h4></br>" + ret[x].fonction;
      html += "</div>";
      html += "<div class='col-md-2'>";
      html += "<button class='btn btn-warning update'>Update</button>";
      html += "<button class='btn btn-danger delete'>Delete</button>";
      html += "<span class='hide'>" + ret[x].id + "</span>";
      html += "</div></div>";
      $("#laboratoryMember").append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function delet(id, tag) {
  let type = "POST";
  let url = "/laboratory/delete/";
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
  let url = "/laboratory/updDesc/";
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
function getById(id) {
  let type = "POST";
  let url = "/laboratory/getMemberById/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#name").val(ret.name);
    $("#fonction").val(ret.fonction);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
$(document).ready(function(){
  $("#formLaboratoryMember #createLaboratory").hide();

  $('#createLaboratory').on('click', function(e) {
    event.preventDefault();
    $('#msg').empty();
    $("#formLaboratoryMember span").attr("update", false);
    $("#formLaboratoryMember span").html("");
    $("#file").val("");
    $("#fonction").val("");
    $("#name").val("");
    $("#createLaboratory").hide();
  });
  $('#laboratoryMember').on('click', '.delete',function(e) {
    $('#msg').empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent();
    delet(id, tag);
  });
  $('#laboratoryMember').on('click', '.update', function(e) {
    $('#msg').empty();
    let id = $(this).parent().children("span").html();
    $("#formLaboratoryMember span").attr("update", true);
    $("#formLaboratoryMember span").html(id);
    getById(id);
    $("#createLaboratory").show();
  });
  $( "#formLaboratoryMember").submit(function(event) {
    event.preventDefault();
    $('#msg').empty();
    let update = $("#formLaboratoryMember span").attr("update");
    let id = $("#formLaboratoryMember span").html();
    let data = new FormData(this);
    if (update == 'true') {
      data.append("id", id);
      updMember(data, id);
    }
    else {
      insertMember(data);
    }
  });
  $( "#formLaboratoryDesc").submit(function(event) {
    event.preventDefault();
    let description = $("#description").val();
    updDesc(description);
  });

});
