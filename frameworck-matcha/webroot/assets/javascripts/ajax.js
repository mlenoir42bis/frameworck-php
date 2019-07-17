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

function displayMsg(tag, ret) {
  if (ret != true) {
    $(tag).html("<div class='alert alert-danger error_info_message'>"+ret+"</div>");
  }
  else {
    $(tag).html("<div class='alert alert-success error_info_message'> Success process </div>");
  }
}
