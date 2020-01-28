@extends('layouts.appuser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mypage</div>

            </div>

            <h1>User Information</h1>
            {{-- ログインしたユーザーの情報表示 --}}
            <div class="container">
                <div class="m-4 p-4 border box10">
                {{-- @foreach ($users as $users) --}}
                        <h1>{{ $user->name }}</h1>
                        <p>{{ $user->county_id }}</p>
                        <p>{{ $user->sex}}</p>
                        <p>{{ $user->email}}</p>
                        <p>{{ $user->birthday}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        {{-- <p>{{ $hoge }}</p> --}}
                    {{-- @endforeach --}}
                </div>
            </div>

            <h1>Your Booking</h1>
            {{-- ログインしたユーザーが申し込んでいるイベント表示 --}}
            <div class="container">
                @foreach ($events as $event)
                    <div class="m-4 p-4 border box10">
                        <div class="row no-gutters ">
                        <div class="col-md-4 rounded">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>ああああああ</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                        </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->event->name }}</h5>
                                <p class="card-text">{{ $event->event->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $event->event->date }}</small></p>
                                <p class="card-text">{{ $event->event->place }}</p>
                                <p class="card-text">{{ $event->event->price }}</p>
                            </div>
                            {{-- @if (Auth::check() && Auth::user()->id === $event->user_id) --}}
                                <form action="{{ route('event.cancel', ['id' => $event->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">event cancel</button>

                                </form>
                            {{-- @endif --}}
                        </div>
                        </div>
                    </div>
                @endforeach
            </div> 
        </div>
    </div>
</div>




@endsection