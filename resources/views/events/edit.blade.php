@extends('layouts.app_owner')

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
                <form action="{{ route('event.update', ['id' => $event->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $event->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">詳細</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description', $event->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">日付</label>
                        <textarea class="form-control" name="date" id="date">{{ old('date', $event->date) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="place">場所</label>
                        <textarea class="form-control" name="place" id="place">{{ old('place', $event->place) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">金額</label>
                        <textarea class="form-control" name="price" id="price">{{ old('price', $event->price) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="picture">画像</label>
                        {{-- <textarea class="form-control" name="picture_path" id="picture_path">{{ old('picture_path', $event->picture_path) }}</textarea> --}}
                         <input id="picture" type="file" name="picture_path" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}">{{ old('picture_path', $event->picture_path) }}

                                @if ($errors->has('picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                        </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
