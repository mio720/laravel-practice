@extends('layouts.app')

@section('title', '商品情報一覧画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報一覧画面</div>

                <div class="card-body">
                    <form action="{{ route('home') }}" method="get">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <input type="text" name="search_keyword" class="form-control js-search-keyword" value="{{ request('search_keyword') }}" placeholder="検索キーワード">
                            </div>
                            <div class="col-sm-4">
                                <select name="search_company_id" class="form-select js-search-company-id">
                                    <option value="">メーカー名</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ((int)request('search_company_id') === $company->id) selected @endif >{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-secondary text-nowrap js-search-button">検索</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                <td><img src="{{ asset($product->img_path) }}" alt="{{ $product->product_name }}" width="100" height="100" class="img-thumbnail"></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->company->company_name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-outline-primary btn-sm text-nowrap">詳細</a>
                                        <form action="{{ route('delete', ['id'=>$product->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" onclick="return confirm('【{{$product->product_name}}】を削除しますか？')" class="ms-2 btn btn-outline-danger btn-sm text-nowrap">削除</button>
                                        </form>
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
