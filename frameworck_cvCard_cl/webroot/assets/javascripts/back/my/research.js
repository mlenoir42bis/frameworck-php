
function insert(interest) {
  let type = "POST";
  let url = "/research/insert/"
  let data = {interest: interest};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      getInterest();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

function upd(interest, id) {
  let type = "POST";
  let url = "/research/update/"
  let data = {interest: interest, id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

function delet(id, tag) {
  console.log(id);
  let type = "POST";
  let url = "/research/delete/"
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret) {
      tag.empty();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

function updDesc(description) {
  let type = "POST";
  let url = "/research/description/";
  let data = {description: description};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($("msg"), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function getDesc()
{
  let type = "POST";
  let url = "/research/descriptionGet/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('#description').val(ret[0].description);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getInterest()
{
  let type = "POST";
  let url = "/research/getInterest/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('table').empty();
    for (x in ret){
      let html = "<tr>";
      html += "<td width=80%>"+ ret[x].content +"</td>";
      html += "<td width=20%>";
      html += "<button class='btn btn-warning update'>Update</button>";
      html += "<button class='btn btn-danger delete'>Delete</button>";
      html += "<span class='hide'>" + ret[x].id + "</span>";
      html += "</td></tr>";
      $('table').append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getInterestById(id)
{
  let type = "POST";
  let url = "/research/getInterestById/"
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    tinymce.get("interest").setContent(ret.content);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
$(document).ready(function(){

  $("#formResearchInterest #createInterest").hide();

  $('table').on('click', '.update', function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    $("#formResearchInterest span").attr("update", true);
    $("#formResearchInterest span").html(id);
    $("#formResearchInterest #createInterest").show();
    getInterestById(id);
  });
  $('table').on('click', '.delete', function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent();
    delet(id , tag);
    $("#formResearchInterest span").attr("update", false);
    $("#formResearchInterest span").html("");
    $('#interest').val("");
  });

  $('#createInterest').on('click', function(e) {
    event.preventDefault();
    $("#msg").empty();
    $("#formResearchInterest span").attr("update", false);
    $("#formResearchInterest span").html("");
    $("#formResearchInterest #createInterest").hide();
    $('#interest').val("");
  });
  $( "#formResearchDesc").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let description = $('#description').val();
    updDesc(description);
  });
  $( "#formResearchInterest").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let interest = $('#interest').val();
    $('#interest').val(" ");
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();
    if (update == 'true') {
      upd(interest, id);
    }
    else {
      insert(interest);
    }
  });

});
