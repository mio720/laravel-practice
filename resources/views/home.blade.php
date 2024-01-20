@extends('layouts.app')

@section('title', '商品情報一覧画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報一覧画面</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered align-middle" style="table-layout: fixed;">
                        <colgroup>
                            <col style="width: 50px;">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col">商品画像</th>
                                <th scope="col">商品名</th>
                                <th scope="col">価格</th>
                                <th scope="col">在庫数</th>
                                <th scope="col">メーカー名</th>
                                <th class="text-center"><a href="{{ url('/regist') }}" class="btn btn-primary btn-sm">新規登録</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row" class="text-center">{{ $product->id }}</th>
                                <td><img src="{{ $product->img_path }}" alt="{{ $product->product_name }}" width="100" height="100" class="img-thumbnail"></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->company_id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-primary btn-sm">詳細</a>
                                        <button class="ms-2 btn btn-outline-danger btn-sm">削除</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
