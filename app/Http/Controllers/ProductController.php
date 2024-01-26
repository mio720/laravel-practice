<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showList() {
        // インスタンス生成
        // 代用可能 → Product::all();
        $model = new Product();
        $products = $model->getList();

        return view('home', ['products' => $products]);
    }

    public function showRegistForm() {
        return view('regist');
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
