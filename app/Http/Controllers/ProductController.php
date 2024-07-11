<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    } //end method

    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' =>'required'
            ],
            [
                'name.required'  => 'Product Name is Required',
                'name.unique'    =>'Product Already Exists',
                'price.required' =>'Product Price is Required',
            ],
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success'
        ]);

    } //end method

}
