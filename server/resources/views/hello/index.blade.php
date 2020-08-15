<html>

<head>
  <title>hello</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <style>
    th { background-color: #999; color: fff; padding: 5px 10px; }
    td { border: solid 1px #aaa; color: #999; padding: 5px 10px; }
  </style>
<head>

<body>
<h1>Hello</h1>

  @foreach($items as $item)
    {{ $item->name }}
  @endforeach

  <table class="table">
    <tr>
      <th>id</th><th>name</th>
    </tr>
    @foreach($all_items as $item)
    <tr>
      <td>{{ $item->id }}</td><td>{{ $item->name }}</td>
    </tr>
    @endforeach
  </table>

</body>

</html>