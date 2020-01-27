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
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/owner/login">酒蔵の方はこちら</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" action="{{ route('event.search') }}"><!-- アクションの書き方はこれがマスト 意味は検索がクリックされたらルートevent.searchに行く -->
      <input class="form-control mr-sm-2" name="keyword" value="{{ old('keyword') }}" type="search" placeholder="気になるワード" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>



  </div>
</nav>

    @foreach ($events as $event)
        <div class="m-4 p-4 border border-primary">
            <h1>{{ $event->name }}</h1>
            <p>{{ $event->description }}</p>
            <p>{{ $event->date }}</p>
            <p>{{ $event->place }}</p>
            <p>{{ $event->price }}</p>
            <img height="100px" src="{{ $event->picture_path }}" >
            <p>{{ $event->owner_id }}</p>
            <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <a class="btn btn-success" href="{{ route('event.apply', ['id' => $event->id]) }}" method="post" class="d-inline">Reed more／Booking</a>
            </form>

            {{-- <form action="{{ route('event.applydestroy', ['id' => $event_users->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger">申込取り消し</button>
            </form> --}}

        </div>
    @endforeach

</body>
</html>
