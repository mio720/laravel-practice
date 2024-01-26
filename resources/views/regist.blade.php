@extends('layouts.app')

@section('title', '商品情報登録画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報登録画面</div>

                <div class="card-body">
                    <form action="{{ route('submit') }}" method="post" class="row g-3">
                        @csrf

                        <div class="col-md-6">
                            <label for="txtProductName" class="form-label">商品名 <span class="text-danger">*</span></label>
                            <input type="text" id="txtProductName" name="product_name" @if($errors->has('product_name')) class="form-control is-invalid" @else class="form-control" @endif value="{{ old('product_name') }}">
                            @if($errors->has('product_name'))
                            <div class="invalid-feedback">{{ $errors->first('product_name') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="fileImgPath" class="form-label">商品画像</label>
                            <input type="file" id="fileImgPath" name="img_path" @if($errors->has('img_path')) class="form-control is-invalid" @else class="form-control" @endif>
                            @if($errors->has('img_path'))
                            <div class="invalid-feedback">{{ $errors->first('img_path') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="drpCompanyId" class="form-label">メーカー名 <span class="text-danger">*</span></label>
                            <select id="drpCompanyId" name="company_id" @if($errors->has('company_id')) class="form-select is-invalid" @else class="form-select" @endif">
                                <option value=""></option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if ((int)old('company_id') === $company->id) selected @endif >{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('company_id'))
                            <div class="invalid-feedback">{{ $errors->first('company_id') }}</div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="numPrice" class="form-label">価格 <span class="text-danger">*</span></label>
                            <input type="number" id="numPrice" name="price" @if($errors->has('price')) class="form-control is-invalid" @else class="form-control" @endif value="{{ old('price') }}">
                            @if($errors->has('price'))
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="numStock" class="form-label">在庫数 <span class="text-danger">*</span></label>
                            <input type="number" id="numStock" name="stock" @if($errors->has('stock')) class="form-control is-invalid" @else class="form-control" @endif value="{{ old('stock') }}">
                            @if($errors->has('stock'))
                            <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="areaComment" class="form-label">コメント</label>
                            <textarea id="areaComment" name="comment" class="form-control" style="height: 100px">{{ old('comment') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">戻る</a>
                            <button type="submit" class="ms-2 btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
