@extends('layouts.app')

@section('title', '商品情報登録画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報登録画面</div>

                <div class="card-body">
                    <form action="#" method="post">
                        @csrf

                        <!-- ここに追加 -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
