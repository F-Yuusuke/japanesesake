@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザーマイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- ログインしたユーザーの情報表示 --}}
            <div>
                 <div class="m-4 p-4 border border-primary">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->country_id }}</p>
                    <p>{{ $user->sex }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->birthday }}</p>
                 </div>
            </div>

            {{-- ログインしたユーザーの申し込んだイベント表示 --}}
            {{-- @foreach ($events as $event)
            <div class="m-4 p-4 border border-primary">
                <h1>{{ $event->name }}</h1>
                <p>{{ $event->description }}</p>
                <p>{{ $event->date }}</p>
                <p>{{ $event->place }}</p>
                <p>{{ $event->price }}</p>
                <img height="100px" src="{{ $event->picture_path }}" >
                <p>{{ $event->owner_id }}</p>
            </div>
            @endforeach --}}
        </div>
    </div>
</div>
@endsection
