@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            <div>
               @foreach ($owners as $owner)
                 <div class="m-4 p-4 border border-primary">
                    <p>{{ name }}</p>
                    <p>{{ address }}</p>
                    <p>{{ image }}</p>
                    <p>{{ email }}</p>
                    <p>{{ tel }}</p>
                    <p>{{ description }}</p>
                    <p>{{ zipcode }}</p>
                 </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

できているよ！