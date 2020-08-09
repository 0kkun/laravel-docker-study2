
$(function(){
　$.ajaxSetup({
  　　headers: {
  　　　'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  　　}
  　});
  $.ajax({
    type: 'post', // GETかPOST。getはユーザの入力とかを得たい時。postはサーバーからの情報を出力したい時。
    datatype: 'json',
    url: '/ajaxtest/ajax_post', // postのレスポンス先
    data: window.laravel.response, // サーバー側(コントローラ)が受け取るリクエストパラメータ
  })
  .done(function(data){ //ajax通信に成功(コントローラに無事データをpost)した場合
    alert("ajax connection is success!");
    $("#ajax-data").append('<p>status : ' + data['status'] + '</p>');
    $("#ajax-data").append('<p>message : ' + data['message'] + '</p>');
    console.log('JS時点 : ' + data['status']);
    console.log('JS時点 : ' + data['message']);
  })
  .fail(function(jqXHR,textStatus,errorThrown){ //ajaxの通信に失敗した場合
    console.log("ajax通信に失敗しました!")
    console.log(jqXHR.status);
    console.log(textStatus);
    console.log(errorThrown.message);
  });
});
