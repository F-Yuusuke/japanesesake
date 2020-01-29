@extends('layouts.appuser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="container"> 
                <h1>User Information</h1>
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

            <div class="container">
                @foreach ($events as $event)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text></svg>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->event->name }}</h5>
                                    <p class="card-text">{{ $event->event->description }}</p>
                                    <p class="card-text">
                                    <small class="text-muted">{{ $event->event->date }}</small>
                                    </p>
                                    <div class='d-flex'>
                                        <p class="card-text mr-5">
                                            <small class="text-muted">Place：</small>
                                            {{ $event->event->place }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Price：</small>
                                            {{ $event->event->price }}JPY
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