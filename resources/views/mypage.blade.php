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
                 <div class="row no-gutters">
                        <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                        </div>
                           <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->country_id }}</p>
                            <p class="card-text">{{ $user->sex }}</p>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">{{ $user->birthday }}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                 </div>
            </div>

              <div class="container">
                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->country_id }}</p>
                            <p class="card-text">{{ $user->sex }}</p>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">{{ $user->birthday }}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
              </div>




            {{-- ログインしたユーザーの申し込んだイベント表示 --}}
            {{-- @foreach ($events as $event)
            <div class="m-4 p-4 border border-primary">
                <h1>{{ $event->name }}</h1>
                <p>{{ $event->description }}</p>
                <p>{{ $event->date }}</p>
                <p>{{ $event->place }}</p>
                <p>{{ $event->place }}</p>
                <img height="100px" src="{{ $event->picture_path }}" >
                <p>{{ $event->owner_id }}</p>
            </div>
            @endforeach --}}
        </div>
    </div>
</div>
@endsection




