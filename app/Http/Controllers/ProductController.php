<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Library\ProductImgPath;
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

    public function submitRegistForm(ProductRequest $request) {
        $img_path = ProductImgPath::getImgPath($request->file('img_path'), $request->id);

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new Product();
            $model->registProduct($request, $img_path);
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

    public function showEditForm($id) {
        $product = Product::find($id);
        $companies = Company::all();

        return view('edit', ['product' => $product, 'companies' => $companies]);
    }

    public function submitEditForm(ProductRequest $request, $id) {
        $img_path = ProductImgPath::getImgPath($request->file('img_path'), $request->id);

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new Product();
            $model->editProduct($request, $img_path);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect()->route('detail', ['id' => $id]);
    }

    public function submitDeleteButton($id) {
        DB::beginTransaction();

        try {
            $model = new Product();
            $model->deleteProduct($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect()->route('home');
    }
}
