@extends('layouts.app')

@section('content')

<section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">
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
                    <div class="form-group">
                        <label for="name">Event Title : "{{ old('name', $event->name) }}"</label>
                    </div>
                    <div class="form-group">
                        <label for="date">Date : "{{ old('date', $event->date) }}"</label>
                    </div>
                    <div class="form-group">
                        <label for="title">Place :  "{{ old('place', $event->place) }}"</label>
                    </div>
                    <div class="form-group">
                        <label for="price">Price :  "{{ old('price', $event->price) }}"</label>
                    </div>
                    <div class="form-group">
                        <label for="body">Let us know if you need special help.</label>
                        <textarea class="form-control" name="Special_comment" id="Special_comment">{{ old('Special_comment') }}</textarea>
                    </div>

                    <!-- 隠して移動してしてる値 -->
                    <input type="hidden" class="form-control" name="eventid" id="eventid" value="{{ old('id', $event->id) }}">
                    {{-- ここにuseridを書いたらいいんじゃないかな --}}

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
