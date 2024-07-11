<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products', compact('products'));
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

    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'up_name' => 'required|unique:products,name,'.$request->update_id,
                'up_price' =>'required'
            ],
            [
                'up_name.required'  => 'Product Name is Required',
                'up_name.unique'    =>'Product Already Exists',
                'up_price.required' =>'Product Price is Required',
            ],
        );

      Product::where('id',$request->update_id)->update([
        'name' =>$request->up_name,
        'price' =>$request->up_price,
      ]);
        return response()->json([
            'status' => 'success'
        ]);

    } //end method

}
