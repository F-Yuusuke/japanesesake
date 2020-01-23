@extends('layouts.app_owner')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">酒蔵マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- ログインした酒蔵の情報表示 --}}
            <div>
               {{-- @foreach ($owners as $owner) --}}
                 <div class="m-4 p-4 border border-primary">
                    <h1>{{ $owner->name }}</h1>
                    <p>{{ $owner->zipcode }}</p>
                    <p>{{ $owner->address }}</p>
                    <p>{{ $owner->email }}</p>
                    <p>{{ $owner->tel }}</p>
                    <p>{{ $owner->description }}</p>
                    <p>{{ $owner->picture_path }}</p>
                    {{-- <p>{{ $hoge }}</p> --}}
                 </div>
                {{-- @endforeach --}}
            </div>

            {{-- ログインした酒蔵のイベント表示 --}}
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
                  <button class="btn btn-danger">削除</button>
                  <a class="btn btn-success" href="{{ route('event.edit', ['id' => $event->id]) }}" method="post" class="d-inline">編集</a>
                </form>
            </div>
            @endforeach
            <a href="{{ route('event.create') }}" class="btn btn-primary btn-block">イベント新規登録</a>

        </div>
    </div>
</div>
@endsection
