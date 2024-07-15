<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
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

    public function deleteProduct(Request $request)
    {
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }//end method

    // public function pagination()
    // {
    //     $products = Product::latest()->paginate(3);
    //     return view('pagination_products', compact('products'))->render();

    // } //end method

    public function pagination(Request $request)
    {
        $products = Product::paginate(3);

        if ($request->ajax()) {
            return view('pagination_products', compact('products'))->render();
        }
        return view('products', compact('products'));
   }

    public function exportProducts()
    {
       return Excel::download(new ProductsExport, 'products.xlsx');
    } //end method

    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search_string. '%')
         ->orWhere('price', 'like', '%' . $request->search_string. '%')
         ->orderBy('id', 'DESC')
         ->paginate(3);

         if($products->count() >= 1){
            return view('pagination_products', compact('products'))->render();
         }else{
            return response()->json([
                'status' => 'not_found'
            ]);
         }
    } //end method

}
