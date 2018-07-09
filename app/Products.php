<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
 protected $fillable = ['product_name','product_price'];

    protected $primaryKey = 'id_product';

    public function saveProduct($data) {
        $this->product_name = $data['product_name'];
        $this->product_price = $data['product_price'];
        $this->save();
        return 1;
    }
    public function updateProduct($data) {
        $product = $this->find($data['id_product']);
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->save();
        return 1;
    }



}
