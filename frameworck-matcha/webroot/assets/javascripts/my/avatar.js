function getAvatarDropzone(ret) {
  ret = JSON.parse(ret);
  let img = "<img src='/assets/images/profil-default.png' class='img-responsive'>";
  if (!ret.any) {
    let url = ret.dir + ret[0].name;
    img = "<img class='img-responsive' attr-id='" + ret[0].id + "' attr-status='" + ret[0].status + "' alt='" + ret[0].name + "' src='" + url + "'>";
  }
  $("#myAvatar").html(img);
}

function getAvatarSidebar(ret) {
  ret = JSON.parse(ret);
  let img = "<img src='/assets/images/profil-default.png' class='img-responsive'>";
  if (!ret.any) {
    let url = ret.dir + ret[0].name;
    img = "<img class='img-responsive' attr-id='" + ret[0].id + "' attr-status='" + ret[0].status + "' alt='" + ret[0].name + "' src='" + url + "'>";
  }
  $(".profile-userpic").html(img);
}

function getAvatar(fRes) {
  let type = "POST";
  let url = "/avatar/getAvatar/"
  let data = {};
  function fErr(ret) {
    console.log("Fret : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

function displayAvatar() {
  getAvatar(getAvatarSidebar);
  getAvatar(getAvatarDropzone);
}
$(document).ready(function(){
  displayAvatar();
});
