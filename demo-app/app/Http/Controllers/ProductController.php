<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class ProductController extends Controller
{
//     // Show the product creation form
//     public function create()
//     {
//         return view('products.create'); // Assuming 'products.create' is the name of your Blade view file
//     }

//     // Store a new product
//     public function store(Request $request)
//     {
//         // Validate the request data
//         $request->validate([
           
//         'code' => 'required|unique:products',
//         'name' => 'required|string|max:255',
//         'quantity' => 'required|integer',
//         'price' => 'required|numeric',
//         'description' => 'nullable|string',
//         // Add more validation rules as needed

//         ]);

//         // Create a new product
//         Product::create([
//         'Code' => $request->input('code'), // Use 'Code' if it's the exact column name in your table
//         'Name' => $request->input('name'), // Use 'Name' if it's the exact column name in your table
//         'Quantity' => $request->input('quantity'), // Use 'Quantity' if it's the exact column name in your table
//         'Price' => $request->input('price'), // Use 'Price' if it's the exact column name in your table
//         'Description' => $request->input('description'), // Use 'Description' if it's the exact column name in your table
//         // Assign other request data to respective columns in your products table
        
//         ]);

//         // Redirect back with a success message
//         return redirect()->route('products.index')->with('success', 'Product created successfully.');
        
//     }

//     public function show($id)
// {
//     // Retrieve the product by ID from the database
//     $product = Product::find($id);

//     // Check if the product exists
//     if (!$product) {
//         abort(404); // Product not found, return a 404 error page
//     }

//     // Return the view with the product data
//     return view('products.show', compact('product'));
// }
//     // Display a list of products
//     public function index()
//     {
//         $products = Product::paginate(10); // Paginate the products, showing 10 products per page
//         return view('products.index', ['products' => $products]); // Pass products data to the 'products.index' view
//     }
    
//     public function edit()
//     {
//         $products = Product::paginate(10); // Paginate the products, showing 10 products per page
//         return view('products.index', ['products' => $products]); // Pass products data to the 'products.index' view
//     }

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
