<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/common.css">
    <title>イベント一覧表示画面</title>
</head>
<body>
  
  <ul class="nav nav-pills nav-fill py-2 mb-5 bg-dark">
  <li class="nav-item">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Longer nav link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
  <!-- <li>
    <form class="form-inline my-2 my-lg-0 search-center" action="{{ route('event.search') }}">アクションの書き方はこれがマスト 意味は検索がクリックされたらルートevent.searchに行く
      <input class="form-control mr-sm-2" name="keyword" value="{{ old('keyword') }}" type="search" placeholder="気になるワード" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>
  </li> -->
</ul>
<!-- </nav> -->

<!-- https://saruwakakun.com/html-css/reference/h-design#section2 -->
<div class="container d-flex justify-content-between">
  <h1>直近のイベント一覧</h1>
    <form class="form-inline my-2 my-lg-0 search-center" action="{{ route('event.search') }}"><!-- アクションの書き方はこれがマスト 意味は検索がクリックされたらルートevent.searchに行く -->
      <input class="form-control mr-sm-2" name="keyword" value="{{ old('keyword') }}" type="search" placeholder="気になるワード" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>
</div>

    


    <!-- https://saruwakakun.com/html-css/reference/buttons -->
  <div class="container">
  @foreach ($events as $event)
  <div class="m-4 p-4 border box10">
    <div class="row no-gutters ">
      <div class="col-md-4 rounded">
      <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>ああああああ</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
      </div>
        <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title">{{ $event->name }}</h5>
              <p class="card-text">{{ $event->description }}</p>
              <p class="card-text"><small class="text-muted">{{ $event->date }}</small></p>
              <p class="card-text">{{ $event->place }}</p>
              <p class="card-text">{{ $event->price }}</p>
              <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <a class="btn-sticky" href="{{ route('event.apply', ['id' => $event->id]) }}" method="post" class="d-inline">Reed more／Booking</a>
              </form>
          </div>
       </div>
    </div>
  </div>
@endforeach
  </div>  


  



</body>
</html>
