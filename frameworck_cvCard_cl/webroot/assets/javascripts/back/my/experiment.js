function get()
{
  let type = "POST";
  let url = "/experiment/get/"
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);

    $('#experiment #sortable').empty();
    for (x in ret) {
      let html = "<li class='ui-state-default'>";
          html += "<div class='row'>";

          html += "<div class='col-xs-1'>";
          html += "<span class='order'>" + ret[x].myOrder;
          html += "</span></div>";

          html += "<div class='col-xs-8' style='border-left: 1px solid #428bca;'>";
          html += ret[x].titleExperiment + "</br></br>";
          html += "Date Start : " + ret[x].dateStart + "</br>";
          html += "Date End : " + ret[x].dateEnd;
          html += "</div>";

          html += "<div class='col-xs-3 console'>";
          html += "<button class='btn btn-warning update'>Update</button>";
          html += "<button class='btn btn-danger delete'>Delete</button>";
          html += "<span class='hide'>" + ret[x].id + "</span>";
          html += "</div>";
          html += "</div></li>";

          $('#experiment #sortable').append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getById(id)
{
  let type = "POST";
  let url = "/experiment/getById/"
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#titleExperiment").val(ret.titleExperiment);
    tinymce.get("descriptionExperiment").setContent(ret.descriptionExperiment);
     $('#dateEnd option[value='+ret.dateEnd+']').attr("selected", 'selected');
    $('#dateStart option[value='+ret.dateStart+']').attr("selected", 'selected');
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function upd(post) {
  let type = "POST";
  let url = "/experiment/update/"
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
function insert(post) {
  let type = "POST";
  let url = "/experiment/insert/"
  let data = post;
  function fRes(ret) {
    console.log(ret);
    ret = JSON.parse(ret);
    displayMsg($('#msg'), ret);
    if (ret == true) {
      get();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function delet(id, tag) {
  let type = "POST";
  let url = "/experiment/delete/"
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
  let url = "/experiment/order/"
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

  $("#formExperiment #createExperiment").hide();
  $('#experiment #sortable').on('click', '.update', function(e) {
    let id = $(this).parent().children("span").html();
    $('#msg').empty();
    $("#formExperiment span").attr("update", true);
    $("#formExperiment span").html(id);
    $("#formExperiment #createExperiment").show();
    $('#dateEnd option').attr("selected", false);
    $('#dateStart option').attr("selected", false);
    getById(id);
  });
  $('#experiment #sortable').on('click', '.delete', function(e) {
    $('#msg').empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent().parent();
    delet(id , tag);
  });
  $('#createExperiment').on('click', function(e) {
    $('#msg').empty();
    event.preventDefault();
    $("#formExperiment span").attr("update", false);
    $("#formExperiment span").html("");
    $("#titleExperiment").val("");
    $("#descriptionExperiment").val("");
    $("#formExperiment #createExperiment").hide();
  });
  $( "#formExperiment").submit(function(event) {
    $('#msg').empty();
    event.preventDefault();
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();
    let data = new FormData(this);

    let description = tinymce.get("descriptionExperiment").getContent();
    console.log(description);
    data.append('descriptionExperiment', description)
    if (update == 'true') {
      data.append("id", id);
      upd(data);
    }
    else {
      let order = $("#sortable .console").length
      data.append("myOrder", order);
      insert(data);
    }
  });

  $( "#sortable" ).sortable({
    placeholder: "ui-state-highlight",
    update: function( event, ui ) {
      var i = 0;
      $( "#sortable .order" ).each(function() {
        let id = $(this).parents().parents().children('.console').children('span').html();
        console.log("i : " + i + " id : " + id);
        order(id, i);
        $(this).html(i);
        i++;
      });
      console.log();
    }
  });
  $( "#sortable" ).disableSelection();

});
