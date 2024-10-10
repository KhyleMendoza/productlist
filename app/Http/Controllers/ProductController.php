<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function loadAllProduct(){
        $all_product = Product::all();
        return view('product', compact('all_product'));
    }

    public function loadAddProduct(){
        return view('product-add');
    }

    public function AddProduct(Request $request){
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'required',
        ]);

        try {
            $new_product = new Product;
            $new_product->name = $request->name;
            $new_product->price = $request->price;
            $new_product->description = $request->description;
            $new_product->save();

            return redirect('/product')->with('success', 'Product Added Successfully!');
        } catch (\Exception $e) {
            return redirect('/product/add')->with('fail',$e->getMessage());
        }
    }

    public function loadEditProduct($id){
        $product = Product::find($id);

        return view('product-update', compact('product'));
    }

    public function EditProduct(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'required',
        ]);

        try {
            $update_product = Product::where('id', $request->product_id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            return redirect('/product')->with('success', 'Product Updated Successfully!');
        } catch (\Exception $e) {
            return redirect('/product')->with('fail', $e->getMessage());
        }
    }

    public function deleteProduct($id) {
        try {
            Product::where('id',$id)->delete();
            return redirect('/product')->with('success', 'Product Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect('/product')->with('fail', $e->getMessage());
        }
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $all_product = Product::where('name', 'LIKE', "%{$query}%")
                              ->orWhere('description', 'LIKE', "%{$query}%")
                              ->get();

        return view('product', compact('all_product'));
    }


}
