<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>編集画面</title>
</head>
<body>
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
                        <label for="title">名前</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $event->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="title">詳細</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description', $event->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">日付</label>
                        <textarea class="form-control" name="date" id="date">{{ old('date', $event->date) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">場所</label>
                        <textarea class="form-control" name="place" id="place">{{ old('place', $event->place) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">金額</label>
                        <textarea class="form-control" name="price" id="price">{{ old('price', $event->price) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">画像</label>
                        <textarea class="form-control" name="picture_path" id="picture_path">{{ old('picture_path', $event->picture_path) }}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>