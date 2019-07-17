
var socket = io.connect('https://127.0.0.1:8080', {secure: true});

function getInfoUser() {
  let type = "POST";
  let url = "/chat/getInfo/"
  let data = {};
  function fRes(ret) {
    console.log("ret ajax : " + ret);
    socket.emit('myConnect', ret );
  }
  function fErr(ret) {
    console.log("Fret : \n" + ret);
  }
  myAjax(type, url, data, fRes, fErr);
}

$(document).ready(function(){
  console.log("hello chat");
  getInfoUser();
});
