<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!-- 投稿フォーム -->
<section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- 蔵の名前 -->
                    <div class="form-group">
                        <label for="title">name</label>
                        <input type="text" class="form-control" name="name" id="name" />
                    </div>
                    <!-- 詳細 -->
                    <div class="form-group">
                        <label for="body">description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <!-- 日付 -->
                    <div class="form-group">
                        <label for="title">date</label>
                        <input type="text" class="form-control" name="date" id="date" />
                    </div>
                    <!-- 開催地 -->
                    <div class="form-group">
                        <label for="title">place</label>
                        <input type="text" class="form-control" name="place" id="place" />
                    </div>
                    <!-- 値段 -->
                    <div class="form-group">
                        <label for="title">price</label>
                        <input type="text" class="form-control" name="price" id="price" />
                    </div>
                    <!-- オーナーID -->
                    <div class="form-group">
                        <label for="title">owner_id</label>
                        <input type="text" class="form-control" name="owner_id" id="owner_id" />
                    </div>
                    <!-- 画像 -->
                    <!-- <div class="form-group">
                        <label for="title">image</label>
                        <input type="text" class="form-control" name="picture_path" id="picture_path" />
                    </div> -->
                    <div class="form-group row">
                        <label for="picture" class="col-md-4 col-form-label text-md-right">Profile picutre</label>

                        <div class="col-md-6">
                            <input id="picture" type="file" name="picture"
                            class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}"
                            >

                            @if ($errors->has('picture'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- ボタン -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">upload</button>
                    </div>
                </form>
        </div>
    </div>
</section>

</body>
</html>
