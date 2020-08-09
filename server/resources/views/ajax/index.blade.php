<html>

<head>
  <title>ajax sample</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<head>

<body>
<script src="{{ asset('/js/ajax/ajax.js') }}"></script>
<h1>Sample</h1>

  <p>{{ $msg }}</p>

  <div id="ajax-data">【 以下、ajax_postの結果 】</div>
  
  <script>
    // グローバル変数を定義し、その中にコントローラから受け取った変数を格納し、JSに送る
    window.laravel = {};
    window.laravel.response = @json($send_to_ajax);
    console.log('ビュー時点 : ' + laravel.response['status']);
    console.log('ビュー時点 : ' + laravel.response['message']);
  </script>
</body>

</html>