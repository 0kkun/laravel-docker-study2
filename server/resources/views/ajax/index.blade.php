<html>

<head>
  <title>ajax sample</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<head>

<body>
<script src="{{ asset('/js/ajax/ajax.js') }}"></script>
<h1>This is ajax sample</h1>


  <p>{{ $msg }}</p>
  <p>{{ $test }}</p>
  <div id="example">【 以下、ajax_getの結果 】</div>
  

  <script>
    window.laravel = {};
    window.laravel.msg = @json($msg);

  </script>
</body>

</html>