@extends('layouts.app')

@section('title', '商品情報一覧画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報一覧画面</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered align-middle" style="table-layout: fixed">
                        <colgroup>
                            <col style="width: 50px">
                            <col style="width: 118px">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col style="width: 120px">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>メーカー名</th>
                                <th class="text-center"><a href="{{ route('regist') }}" class="btn btn-primary text-nowrap">新規登録</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th class="text-center">{{ $product->id }}</th>
                                <td><img src="{{ $product->img_path }}" alt="{{ $product->product_name }}" width="100" height="100" class="img-thumbnail"></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->company_id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-outline-primary btn-sm text-nowrap">詳細</a>
                                        <button class="ms-2 btn btn-outline-danger btn-sm text-nowrap">削除</button>
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
