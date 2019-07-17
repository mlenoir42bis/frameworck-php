function myAjaxUpload(type, url, data, fRes, fErr){
  $.ajax({
      type: type,
      url: url,
      data: data,
      contentType: false,
      processData: false
      })
      .done(function(response) {
        fRes(response);
      })
      .fail(function(response) {
        fErr(response);
      });
}
function myAjax(type, url, data, fRes, fErr){
  $.ajax({
      type: type,
      url: url,
      data: data
      })
      .done(function(response) {
        fRes(response);
      })
      .fail(function(response) {
        fErr(response);
      });
}
function myAjaxJson(type, url, data, fRes, fErr){
  $.ajax({
      type: type,
      url: url,
      dataType: "application/json; charset=utf-8",
      cache: false,
      data: JSON.stringify(data)
      })
      .done(function(response) {
        fRes(response);
      })
      .fail(function(response) {
        fErr(response);
      });
}
function myAjaxWCP(type, url, data, fRes, fErr){
  $.ajax({
      type: type,
      url: url,
      data: data
      })
      .done(function(response) {
        fRes(response);
      })
      .fail(function(response) {
        fErr(response);
      });
}
function displayMsg(tag, ret) {
  if (ret != true) {
    $(tag).html("<div class='alert alert-danger error_info_message'>"+ret+"</div>");
  }
  else {
    $(tag).html("<div class='alert alert-success error_info_message' style='text-align:center!important;'> Success process </div>");
  }
}
