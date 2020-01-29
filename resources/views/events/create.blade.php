@extends('layouts.app_owner')

@section('content')

@push('css')
    <link href="/layouts/app_owner" rel="stylesheet">
@endpush

<!-- 投稿フォーム -->
<section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-center">新規イベントの登録</h1>
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">イベント名</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" />

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="body">イベントの詳細情報</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">日時</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}"/>
                    </div>
                    <div class="form-group">
                        <label for="title">会場</label>
                        <input type="text" class="form-control" name="place" id="place" value="{{ old('place') }}" />
                    </div>
                    <div class="form-group">
                        <label for="title">値段</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" />
                    </div>
                    <div class="form-group row">
                        <label for="picture" class="col-form-label text-md-right">イメージ画像</label>

                            <input id="picture" type="file" name="picture" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}">

                            @if ($errors->has('picture'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn_go">投稿</button>
                    </div>
                </form>
        </div>
    </div>
</section>

@endsection
