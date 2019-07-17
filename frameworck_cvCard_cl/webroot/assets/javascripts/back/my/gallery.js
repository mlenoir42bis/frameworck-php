function insert(post) {
  let type = "POST";
  let url = "/gallery/insert/";
  let data = post;
  function fRes(ret) {
    console.log(ret);
    get();
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxUpload(type, url, data, fRes, fErr);
}
function get() {
  let type = "POST";
  let url = "/gallery/get/";
  let data = {};
  function fRes(ret) {
    ret = JSON.parse(ret);
    $("#myGallery").empty();
    for (x in ret) {
      let html = "";
      html += "<div class='col-md-3' style='padding: 10px;'>"
      html += "<div class='block'>";
      html += "<img src='../../../webroot/upload/gallery/" + ret[x].picture + "'>";
      html += "<button class='btn btn-danger delete'>Delete</button>";
      html += "<span class='hide idPict'>"+ ret[x].id +"</span>";
      html += "<span class='hide namePict'>"+ ret[x].picture +"</span>";
      html += "</div>";
      html += "</div>";
      $("#myGallery").append(html);
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}
function delet(id, name, tag) {
  console.log(id);
  let type = "POST";
  let url = "/gallery/delete/"
  let data = {id: id, name: name};
  function fRes(ret) {
    ret = JSON.parse(ret);
    if (ret) {
      tag.empty();
    }
  }
  function fErr(ret) {
    console.log("Ferr : \n" + ret);
  }
  myAjaxWCP(type, url, data, fRes, fErr);
}
$(document).ready(function(){

  console.log("wtf");

  $('#myGallery').on('click', '.delete', function(e) {
    let id = $(this).parent().children("span")[0].textContent;
    let name = $(this).parent().children("span")[1].textContent;
    let tag = $(this).parent().parent();
    delet(id, name, tag);
  });

  $( "#formGallery").submit(function(event) {
    event.preventDefault();
    let data = new FormData(this);
    insert(data);
  });

});
