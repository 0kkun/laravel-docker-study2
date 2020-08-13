<html>

<head>
  <title>hello</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<head>

<body>
<h1>Hello</h1>

  @foreach($items as $item)
    {{ $item->name }}
  @endforeach

</body>

</html>