@extends('layouts.app_owner')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="container d-flex justify-content-between">
              <h1>あなたの酒蔵の登録情報</h1>
            </div>

            {{-- ログインした酒蔵の情報表示 --}}
            <div class='container'>
               {{-- @foreach ($owners as $owner) --}}
                 <div class="m-4 p-4 border border-primary">
                    <h1 class="card-title">{{ $owner->name }}</h1>
                    <p class="card-text">{{ $owner->zipcode }}</p>
                    <p class="card-text">{{ $owner->address }}</p>
                    <p class="card-text">{{ $owner->email }}</p>
                    <p class="card-text">{{ $owner->tel }}</p>
                    <p class="card-text">{{ $owner->description }}</p>
                    <p class="card-text">{{ $owner->picture_path }}</p>
                    {{-- <p>{{ $hoge }}</p> --}}
                 </div>
                {{-- @endforeach --}}
            </div>
            <div class="container d-flex justify-content-between">
              <h1>あなたの酒蔵のイベント情報</h1>
            </div>

        <div class="container">

           <div class="row no-gutters">
                {{-- ログインした酒蔵のイベント表示 --}}
                @foreach ($owner->events as $event)
                <div class="m-4 p-4  border box10">
                  <div class="col-mb-4 rounded">
                  <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>ああああああ</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                  </div>
                  <div class="col-md-8">
                  <div class="card-body">
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
                      <button class="btn btn-danger">削除</button>
                      <a class="btn btn-success" href="{{ route('event.edit', ['id' => $event->id]) }}" method="post" class="d-inline">編集</a>
                    </form>
                    </div>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('event.create') }}" class="btn btn-block">イベント新規登録</a>
           </div>
         </div>


        </div>
    </div>
</div>
@endsection
