<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/common.css">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <title>Events List</title>
</head>
<body>

 {{-- ナビバー --}}
 <nav class="navbar navbar-expand-md navbar-dark mb-5">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="about">About This Site</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/event">Events List</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/mypage">Mypage</a>
                        </li>
                      </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/owner/login">酒蔵の方はこちら</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- ナビバーここまで --}}


<!-- https://saruwakakun.com/html-css/reference/h-design#section2 -->
<div class="container d-flex justify-content-between">
  <h1>Sake Events List</h1>
    <form class="form-inline my-2 my-lg-0 search-center" action="{{ route('event.search') }}"><!-- アクションの書き方はこれがマスト 意味は検索がクリックされたらルートevent.searchに行く -->
      <input class="form-control mr-sm-2" name="keyword" value="{{ old('keyword') }}" type="search" placeholder="気になるワード" aria-label="Search">
      <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>




    <!-- https://saruwakakun.com/html-css/reference/buttons -->
  <div class="container">
  @foreach ($events as $event)
  <div class="m-4 p-4 border box10">
    <div class="row no-gutters ">
      <div class="col-md-4 rounded">
      {{-- <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>ああああああ</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg> --}}
      <img height="200px" src="{{ $event->picture_path }}" >
      </div>
        <div class="col-md-8">
          <div class="card-body">
              <h4 class="card-text">{{ $event->name }}</h4>
              <p class="card-text">{{ $event->description }}</p>
              <p class="card-text"><small class="text-muted">{{ $event->date }}</small></p>
              <p class="card-text">{{ $event->place }}</p>
              <p class="card-text">{{ $event->price }}</p>
              <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <a class="btn" href="{{ route('event.apply', ['id' => $event->id]) }}" method="post" class="d-inline">Reed more／Booking</a>
              </form>
          </div>
       </div>
    </div>
  </div>
@endforeach
  </div>

    <!-- copyright -->
    <div class="footer mt-5">
            <p class="text-center py-3 m-0"><small>©2020 Japanese Sake</small></p>
        </div>
     <!-- /copyright -->

</body>
</html>
