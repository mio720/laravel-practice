@extends('layouts.app')

@section('title', '商品情報編集画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報編集画面</div>

                <div class="card-body">
                    <form action="{{ route('update', ['id'=>$product->id]) }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">ID</p>
                            <div class="col-sm-10">
                                <p class="form-control-plaintext">{{ $product->id }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">商品画像</p>
                            <div class="col-sm-10">
                                <input type="file" id="fileImgPath" name="img_path" @if ($errors->has('img_path')) class="form-control is-invalid" @else class="form-control" @endif>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">商品名</p>
                            <div class="col-sm-10">
                                <input type="text" id="txtProductName" name="product_name" @if ($errors->has('product_name')) class="form-control is-invalid" @else class="form-control" @endif value="{{ $product->product_name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">メーカー</p>
                            <div class="col-sm-10">
                                <select id="drpCompanyId" name="company_id" @if ($errors->has('company_id')) class="form-select is-invalid" @else class="form-select" @endif>
                                    <option value=""></option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ((int)old('company_id')===$company->id) selected @endif >{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">価格</p>
                            <div class="col-sm-10">
                                <input type="number" id="numPrice" name="price" @if ($errors->has('price')) class="form-control is-invalid" @else class="form-control" @endif value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">在庫数</p>
                            <div class="col-sm-10">
                                <input type="number" id="numStock" name="stock" @if ($errors->has('stock')) class="form-control is-invalid" @else class="form-control" @endif value="{{ old('stock') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <p class="col-sm-2 col-form-label">コメント</p>
                            <div class="col-sm-10">
                                <textarea id="areaComment" name="comment" class="form-control" style="height: 100px">{{ old('comment') }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-outline-secondary">戻る</a>
                            <button type="submit" class="ms-2 btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
