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
                <form action="{{ route('event.applyed', ['id' => $event->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">event title is "{{ old('name', $event->name) }}"</label>
                    </div>
                    <div class="form-group">
                        <label for="body">shall we help you?</label>
                        <textarea class="form-control" name="Special_comment" id="Special_comment">{{ old('Special_comment') }}</textarea>
                    </div>

                    <!-- 隠して移動してしてる値 -->
                    <input type="hidden" class="form-control" name="eventid" id="eventid" value="{{ old('id', $event->id) }}">
                    {{-- ここにuseridを書いたらいいんじゃないかな --}}

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


</body>
</html>
