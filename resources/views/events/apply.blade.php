@extends('layouts.app')

@section('content')

<script src="resources/js/apply_app.js"></script>

<section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">
                    <h1 class="text-center">Event Detail</h1>
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $message)
                        <li class="alert alert-danger">{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('event.applyed', ['id' => $event->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="apply-form">
                        <label for="name">Event Title : {{ old('name', $event->name) }}</label>
                    </div>
                    <div class="apply-form">
                        <label for="date">Date : {{ old('date', $event->date) }}</label>
                    </div>
                    <div class="apply-form">
                        <label for="place">Place :  {{ old('place', $event->place) }}</label>
                    </div>
                    <div class="apply-form">
                        <label for="price">Price :  {{ old('price', $event->price) }} 円</label>
                    </div>

                    <div class="request">
                        <label for="body">how many do you go to together?</label>
                        <input class="form-control" name="People_count" id="People_count">{{ old('People_count') }}</input>
                    </div>

                    <div class="request">
                        <label for="body">Let us know if you need special help.</label>
                        <textarea class="form-control" name="Special_comment" id="Special_comment">{{ old('Special_comment') }}</textarea>
                    </div>

                    <!-- 隠して移動してしてる値 -->
                    <input type="hidden" class="form-control" name="eventid" id="eventid" value="{{ old('id', $event->id) }}">

                    <div class="text-center">
                        <button type="submit" class="btn_go mt-5" onClick="delete_alert(event);return false;">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
