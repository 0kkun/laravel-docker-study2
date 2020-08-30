@extends('layout')

@section('content')
  <div class="container">
    <h1>Sample Page</h1>
    <form action="{{ url('/search')}}" method="post">
      {{ csrf_field()}}
      {{ method_field('get') }}
      <div class="h4">入力フォーム</div>
      <div class="form-group col-md-9 mb-5">
        <input type="text" class="form-control" placeholder="検索したい名前を入力してください" name="name">
      </div>
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary">検索</button>
      </div>
    </form>

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


    <div>
      <h1>30歳以上の人</h1>
      @foreach ($over_age_lists as $list)
      <ul>
        <li>{{$list->name}}</li>
      </ul>
      @endforeach


    </div>



  </div>
@endsection
