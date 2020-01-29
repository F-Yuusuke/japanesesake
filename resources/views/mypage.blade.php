@extends('layouts.appuser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="container">
                <h1>User Information</h1>
                <div class="m-4 p-4 border border-primary">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->country_id }}</p>
                    <p class="card-text">{{ $user->sex }}</p>
                    <p class="card-text">{{ $user->email }}</p>
                    <p class="card-text">{{ $user->birthday }}</p>
                </div>
            </div>

            <div class="container">
                @foreach ($user->goingEvents as $event)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img height="200px" src="{{ $event->picture_path }}" >
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">{{ $event->description }}</p>
                                    <p class="card-text">
                                    <small class="text-muted">{{ $event->date }}</small>
                                    </p>
                                    <div class='d-flex'>
                                        <p class="card-text mr-5">
                                            <small class="text-muted">Place：</small>
                                            {{ $event->place }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Price：</small>
                                            {{ $event->price }}JPY
                                        </p>
                                    </div>
                                    {{-- @if (Auth::check() && Auth::user()->id === $event->user_id) --}}
                                        <div class='d-flex justify-content-end'>
                                            <form action="{{ route('event.cancel', ['id' => $event->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger ml-2">event cancel</button>
                                            </form>
                                        </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
