<?php


namespace App\Http\Controllers;


use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function listProducts()
    {
        $products = DB::table('products')->get();
        return view('adminProducts')->with('products', $products);
    }

    public function create() {
        return view('adminProductsCreate');
    }

    public function store(Request $request) {
        $product = new Products();
        $data = array('product_name'=>$request['product_name'],'product_price'=>$request['product_price']);
        $product->saveProduct($data);
        return redirect('adminProducts')->with('success','New product added');
    }

    public function edit($id_product) {
        $product = Products::where('id_product',$id_product)->first();

        return view("adminProductsEdit",compact('product','id_product'));

    }


    public function update(Request $request) {
        $product = new Products();
        $data = array('product_name'=>$request['product_name'],'product_price'=>$request['product_price'],'id_product'=>$request['id_product']);
        $product->updateProduct($data);
        return redirect('adminProducts')->with('success','Product Updated');

    }
}


