function getHonor()
{
  let type = "POST";
  let url = "/honor/get/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('#honor #sortable').empty();
    for (x in ret) {
      let html = "<li class='ui-state-default'>";
          html += "<div class='row'>";

          html += "<div class='col-xs-1'>";
          html += "<span class='order'>" + ret[x].myOrder;
          html += "</span></div>";

          html += "<div class='col-xs-8' style='border-left: 1px solid #428bca;'>";
          html += ret[x].title + "</br></br>";
          html += "Obtaining: " + ret[x].dateObt;
          html += "</div>";

          html += "<div class='col-xs-3 console'>";
          html += "<button class='btn btn-warning update'>Update</button>";
          html += "<button class='btn btn-danger delete'>Delete</button>";
          html += "<span class='hide'>" + ret[x].id + "</span>";
          html += "</div>";
          html += "</div></li>";

      $('#honor #sortable').append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getByIdHonor(id)
{
  let type = "POST";
  let url = "/honor/getById/"
  let data = {id: id};
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    $("#dateObt").val(ret.dateObt);
    $("#titleHonor").val(ret.title);
    tinymce.get("descriptionHonor").setContent(ret.description);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function updHonor(post) {
  let type = "POST";
  let url = "/honor/update/"
  let data = {post};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function insertHonor(post) {
  let type = "POST";
  let url = "/honor/insert/"
  let data = {post};
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      getHonor();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function deletHonor(id, tag) {
  console.log(id);
  let type = "POST";
  let url = "/honor/delete/"
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
  myAjax(type, url, data, fRes, fErr);
}

function order(id, order) {
  let type = "POST";
  let url = "/honor/order/"
  let data = {id: id, order: order};
  function fRes(ret) {
    console.log(ret)
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

$(document).ready(function(){

  $("#formHonor #createHonor").hide();
  $('#honor #sortable').on('click', '.update', function(e) {
    $('#msg').empty();
    let id = $(this).parent().children("span").html();
    $("#isUpdate").attr("update", true);
    $("#isUpdate").html(id);
    $("#formHonor #createHonor").show();
    getByIdHonor(id);
  });
  $('#honor #sortable').on('click', '.delete', function(e) {
    $('#msg').empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent();
    deletHonor(id , tag);
  });
  $('#createHonor').on('click', function(e) {
    event.preventDefault();
    $('#msg').empty();
    $("#isUpdate").attr("update", false);
    $("#isUpdate").html("");
    $("#dateObt").val(" ");
    $("#titleHonor").val("");
    $("#descriptionHonor").val("");
    $("#formHonor #createHonor").hide();
  });
  $( "#formHonor").submit(function(event) {
    event.preventDefault();
    $('#msg').empty();
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();
    let data = new FormData(this);
    data.append('description', tinymce.get("descriptionHonor").getContent());
    if (update == 'true') {
      data.append("id", id);
      updHonor(data);
    }
    else {
      let order = $("#sortable .console").length;
      data.append("myOrder", order);
      insertHonor(data);
    }
  });
  $( "#sortable" ).sortable({
    placeholder: "ui-state-highlight",
    update: function( event, ui ) {
      var i = 0;
      $( "#sortable .order" ).each(function() {
        let id = $(this).parents().parents().children('.console').children('span').html();
        //console.log("i : " + i + " id : " + id);
        order(id, i);
        $(this).html(i);
        i++;
      });
    }
  });
  $( "#sortable" ).disableSelection();

});
