
$(function(){
　$.ajaxSetup({
  　　headers: {
  　　　'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  　　}
  　});
  $.ajax({
    type: 'post', // GETかPOST。getはユーザの入力とかを得たい時。postはサーバーからの情報を出力したい時。
    datatype: 'json', //
    contentType: "application/json; charset=utf-8",
    url: '/ajaxtest', // postのレスポンス先
    data: window.laravel.msg,
  })
  .done(function(data){ //ajaxの通信に成功した場合
    alert("success!");
    $("#example").append('<p>status : ' + data['status'] + '</p>');
    $("#example").append('<p>message : ' + data['message'] + '</p>');
    console.log(data['status']);
    console.log(data['message']);
  })
  .fail(function(jqXHR,textStatus,errorThrown){ //ajaxの通信に失敗した場合
    console.log("ajax通信に失敗しました!")
    console.log(jqXHR.status);
    console.log(textStatus);
    console.log(errorThrown.message);
  });
});