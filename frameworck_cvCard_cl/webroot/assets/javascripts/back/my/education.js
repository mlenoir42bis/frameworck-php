function getEd()
{
  let type = "POST";
  let url = "/education/get/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('#education #sortable').empty();
    for (x in ret) {
          let html = "<li class='ui-state-default'>";
              html += "<div class='row'>";

              html += "<div class='col-xs-1'>";
              html += "<span class='order'>" + ret[x].myOrder;
              html += "</span></div>";

              html += "<div class='col-xs-8' style='border-left: 1px solid #428bca'>";
              html += ret[x].titleEducation + "</br></br>";
              html += "Date Start : " + ret[x].obtaining;
              html += "</div>";

              html += "<div class='col-xs-3 console'>";
              html += "<button class='btn btn-warning update'>Update</button>";
              html += "<button class='btn btn-danger delete'>Delete</button>";
              html += "<span class='hide'>" + ret[x].id + "</span>";
              html += "</div>";
              html += "</div></li>";

          $('#education #sortable').append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getEdById(id)
{
  let type = "POST";
  let url = "/education/getById/"
  let data = {id: id};
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    $("#lvl").val(ret.lvl);
    $('#obtaining option[value='+ret.obtaining+']').attr("selected", true);
    $("#titleEducation").val(ret.titleEducation);
    tinymce.get("descriptionEducation").setContent(ret.descriptionEducation);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function updEd(post) {
  let type = "POST";
  let url = "/education/update/"
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function insertEd(post) {
  let type = "POST";
  let url = "/education/insert/"
  let data = post;
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      console.log("je get");
      getEd();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function deletEd(id, tag) {
  let type = "POST";
  let url = "/education/delete/"
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret) {
      tag.remove();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function order(id, order) {
  let type = "POST";
  let url = "/education/order/"
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

  $("#formEducation #createEducation").hide();

  $('#education #sortable').on('click', '.update', function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    $("#isUpdate").attr("update", true);
    $("#isUpdate").html(id);
    getEdById(id);
    $("#formEducation #createEducation").show();
  });
  $('#education #sortable').on('click', '.delete',function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent().parent();
    deletEd(id , tag);
  });
  $('#createEducation').on('click', function(e) {
    event.preventDefault();
    $("#msg").empty();
    $("#formEducation #createEducation").hide();
    $("#lvl").val("");
    $('#obtaining option').attr("selected", false);
    $("#titleEducation").val("");
    $("#descriptionEducation").val("");
    $("#isUpdate").attr("update", false);
    $("#isUpdate").html("");
  });
  $( "#formEducation").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let data = new FormData(this);
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();

    data.append('descriptionEducation', tinymce.get("descriptionEducation").getContent())
    if (update == 'true') {
      data.append("id", id);
      updEd(data);
    }
    else {
      let order = $("#sortable .console").length
      data.append("myOrder", order);
      insertEd(data);
    }

    $("#formEducation #createEducation").hide();
    $("#lvl").val("");
    $('#obtaining option').attr("selected", false);
    $("#titleEducation").val("");
    tinymce.get("descriptionEducation").SetContent('')
    $("#isUpdate").attr("update", false);
    $("#isUpdate").html("");
  });
  $( "#sortable" ).sortable({
    placeholder: "ui-state-highlight",
    update: function( event, ui ) {
      var i = 0;
      $( "#sortable .order" ).each(function() {
        let id = $(this).parents().parents().children('.console').children('span').html();
        order(id, i);
        $(this).html(i);
        i++;
      });
    }
  });
  $( "#sortable" ).disableSelection();

});
