<?php

namespace App\Library;

class ProductImgPath
{
    public static function getImgPath($img, $id) {
        if ($img) {
            $file_name = $img->getClientOriginalName();
            $img->storeAs('public/images', $file_name);
            $img_path = 'storage/images/' . $file_name;
    
            return $img_path;
        } else {
            return null;
        }
    }
}
