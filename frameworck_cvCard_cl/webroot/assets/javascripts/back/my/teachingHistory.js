function updDesc(post) {
  let type = "POST";
  let url = "/teaching/description/";
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($("msg"), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function getById(id) {
  let type = "POST";
  let url = "/teaching/getById/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $('#dateEnd option[value='+ret.dateEnd+']').attr("selected", true);
    $('#dateStart option[value='+ret.dateStart+']').attr("selected", true);
    $('#title').val(ret.title);
    $('#content').val(ret.content);
    displayMsg($("msg"), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}

function get() {
  let type = "POST";
  let url = "/teaching/getHistory/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#teaching #sortable").empty();
    for (x in ret) {
      let html = "<li class='ui-state-default'>";
          html += "<div class='row'>";

          html += "<div class='col-xs-1'>";
          html += "<span class='order'>" + ret[x].myOrder;
          html += "</span></div>";

          html += "<div class='col-xs-8' style='border-left: 1px solid #428bca;'>";
          html += ret[x].title + "</br></br>";
          html += "Date Start : " + ret[x].dateStart + "</br>";
          html += "Date End : " + ret[x].dateEnd;
          html += "</div>";

          html += "<div class='col-xs-3 console'>";
          html += "<button class='btn btn-warning update'>Update</button>";
          html += "<button class='btn btn-danger delete'>Delete</button>";
          html += "<span class='hide'>" + ret[x].id + "</span>";
          html += "</div>";
          html += "</div></li>";

      $('#teaching #sortable').append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function insert(post) {
  let type = "POST";
  let url = "/teaching/insertHistory/"
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($("msg"), ret);
    if (ret == true) {
      get();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function upd(post) {
  let type = "POST";
  let url = "/teaching/update/"
  let data = post;
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($("msg"), ret);
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function delet(id, tag) {
  let type = "POST";
  let url = "/teaching/delete/";
  let data = {id: id};
  function fRes(ret) {
    ret = JSON.parse(ret);
    displayMsg($("msg"), ret);
    if (ret == true) {
      tag.remove();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
function empty()
{
  $("#isUpdate").attr("update", false);
  $("#isUpdate").html("");
  $('#dateEnd option').attr("selected", false);
  $('#dateStart option').attr("selected", false);
  $('#title').val("");
  $('#content').val("");
}
function order(id, order) {
  let type = "POST";
  let url = "/teaching/order/"
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

  $("#createTeaching").hide();
  $('#teaching #sortable').on('click', '.update', function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    $("#isUpdate").attr("update", true);
    $("#isUpdate").html(id);
    $("#createTeaching").show();
    getById(id);
  });
  $('#teaching #sortable').on('click', '.delete',function(e) {
    $("#msg").empty();
    let id = $(this).parent().children("span").html();
    let tag = $(this).parent().parent().parent();
    delet(id, tag);
    empty();
  });
  $('#createTeaching').on('click', function(e) {
    $("#msg").empty();
    event.preventDefault();
    empty();
    $("#createTeaching").hide();
  });
  $( "#formteachingDesc").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let description = $('#descriptionDesc').val();
    let data = new FormData(this);
    updDesc(data);
  });
  $( "#formTeachingHistory").submit(function(event) {
    event.preventDefault();
    $("#msg").empty();
    let update = $("#isUpdate").attr("update");
    let id = $("#isUpdate").html();
    let data = new FormData(this);
    empty();
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
        order(id, i);
        $(this).html(i);
        i++;
      });
    }
  });
  $( "#sortable" ).disableSelection();

});
