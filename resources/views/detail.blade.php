@extends('layouts.app')

@section('title', '商品情報詳細画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報詳細画面</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">ID</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $product->id }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">商品画像</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext"><img src="{{ $product->img_path }}" class="img-thumbnail"></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">商品名</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $product->product_name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">メーカー</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $product->company->company_name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">価格</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">¥{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">在庫数</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">¥{{ $product->stock }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">コメント</p>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">¥{{ $product->comment }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">戻る</a>
                        <a href="{{ route('home') }}" class="ms-2 btn btn-primary">編集</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
