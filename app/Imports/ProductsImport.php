<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id' => $row[0],
            'image' => $row[1],
            'title' => $row[2],
            'slug' => $row[3],
            'text' => $row[4],
            'brand_id' => $row[5],
            'category_id' => $row[6],
        ]);
    }
}
