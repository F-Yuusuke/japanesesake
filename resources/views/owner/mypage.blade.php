@extends('layouts.app_owner')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class='container'>
                <h2 class="text-center">あなたの酒蔵の登録情報</h2>
                 <div class="m-4 p-4 border border-primary">
                    <h1 class="card-title">{{ $owner->name }}</h1>
                    <p class="card-text">{{ $owner->zipcode }}</p>
                    <p class="card-text">{{ $owner->address }}</p>
                    <p class="card-text">{{ $owner->email }}</p>
                    <p class="card-text">{{ $owner->tel }}</p>
                    <p class="card-text">{{ $owner->description }}</p>
                    <p class="card-text">{{ $owner->picture_path }}</p>
                 </div>
            </div>

            <h1 class="text-center my-2">あなたの酒蔵のイベント情報</h1>
            @foreach($owner->events as $event)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($event->picture_path) }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text">
                                    {{ $event->description }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $event->date }}</small>
                                </p>
                                <div class="d-flex">
                                    <p class="card-text mr-5">
                                        <small class="text-muted">場所：</small>
                                        {{ $event->place }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">金額：</small>
                                        {{ $event->price }} JPY
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">削除</button>
                                    </form>
                                    <a class="btn btn-success ml-2" href="{{ route('event.edit', ['id' => $event->id]) }}" method="post">編集</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         </div>
         <a href="{{ route('event.create') }}" class="btn btn-block">イベント新規登録</a>
        </div>
    </div>
</div>
@endsection
