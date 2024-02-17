<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class Product extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function registProduct($data, $img_path) {
        DB::table('products')->insert([
            'company_id' => $data->company_id,
            'product_name' => $data->product_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }

    public function editProduct($data, $img_path) {
        if ($img_path) {
            DB::table('products')->where('id', $data->id)->update([
                'company_id' => $data->company_id,
                'product_name' => $data->product_name,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'img_path' => $img_path,
                'updated_at' => new DateTime(),
            ]);
        } else {
            DB::table('products')->where('id', $data->id)->update([
                'company_id' => $data->company_id,
                'product_name' => $data->product_name,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'updated_at' => new DateTime(),
            ]);
        }
    }

    public function deleteProduct($id) {
        DB::table('products')->where('id', $id)->delete();
    }
}
