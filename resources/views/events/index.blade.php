<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>一覧表示画面</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="＃">About This Site</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/event">Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">酒蔵の方はこちら</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{url('/')}}">
      <input class="form-control mr-sm-2" type="search" placeholder="気になるワード" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>  

    <!--↓↓ 検索フォーム ↓↓-->
<!-- <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
<form class="form-inline" action="{{url('/crud')}}">
  <div class="form-group">
  <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="名前を入力してください">
  </div>
  <input type="submit" value="検索" class="btn btn-info">
</form>
</div> -->
<!--↑↑ 検索フォーム ↑↑-->

  </div>
</nav>

    @foreach ($events as $event)
        <div class="m-4 p-4 border border-primary">
            <h1>{{ $event->name }}</h1>
            <p>{{ $event->description }}</p>
            <p>{{ $event->date }}</p>
            <p>{{ $event->place }}</p>
            <p>{{ $event->price }}</p>
            <p>{{ $event->picture_path }}</p>
            <p>{{ $event->owner_id }}</p>
            <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger">削除</button>
            </form>
        </div>
    @endforeach


</body>
</html>