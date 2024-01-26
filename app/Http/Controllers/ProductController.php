<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showList() {
        $products = Product::all();

        return view('home', ['products' => $products]);
    }

    public function showRegistForm() {
        $companies = Company::all();

        return view('regist', ['companies' => $companies]);
    }

    public function registSubmit(ProductRequest $request) {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new Product();
            $model->registProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        // 処理が完了したらhomeにリダイレクト
        return redirect(route('home'));
    }

    public function showDetail($id) {
        $product = Product::find($id);

        return view('detail', ['product' => $product]);
    }
}
