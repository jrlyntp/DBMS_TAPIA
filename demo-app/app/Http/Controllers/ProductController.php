<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
class ProductController extends Controller
{
    public function index() {
        
        $products = Product::all();
        
        return view('products.index', compact('products'));
    }

    public function create() {

        return view('products.create');
    }

    public function store(Request $request) {
            
            $request->validate([
                'code' => 'required|unique:products',
                'name' => 'required|string|max:255',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
            ]);
    
            $product = new Product;
            $product->Code = $request->code;
            $product->Name = $request->name;
            $product->Price = $request->price;
            $product->Quantity = $request->quantity;
            $product->Description = $request->description;
            
            if($product->save()) {
                return redirect()->route('products.index')->with('success', 'Product created successfully.');
            }
    }

    public function show($id) {
        
        $product = Product::find($id);
        
        return view('products.show', compact('product'));
    }

    public function edit(Request $request) {

        $edit_product = Product::find($request->id);
        
        return response()->json([
            'data' => $edit_product
        ], 200);
        
    }

    public function update(Request $request) {
        $edit_product = Product::find($request->id);
        $edit_product->Code = $request->code;
        $edit_product->Name = $request->name;
        $edit_product->Price = $request->price;
        $edit_product->Quantity = $request->quantity;
        $edit_product->Description = $request->description;
        
        if($edit_product->save()) {
            return response()->json([
                'message' => 'Product Updated Successfully',
            ], 201);
        }
    }

    public function destroy(Request $request) {

        $delete_product = Product::find($request->id);
        
        if($delete_product->delete()) {
            return response()->json([
                'message' => 'Product Deleted Successfully',
            ], 201);
        }
    }
}
