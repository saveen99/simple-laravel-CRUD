<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index()
    { 
        $products = Product::paginate(5); // Paginated results
        return view('products.index', compact('products'));   
    }

    // AJAX Search Function
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Fetch products based on search term
        $products = Product::where('name', 'like', "%$search%")->paginate(5);

        return response()->json([
            'products' => view('products.partials.product-list', compact('products'))->render()
        ]);
    }

    public function create()
    { 
        return view('products.create'); 
    }

    public function store(Request $request)
    { 
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'qty' => 'required|numeric|min:1', 
            'price' => 'required|numeric|min:0', 
            'description' => 'nullable|string'
        ]);

        Product::create($data); 

        return redirect(route('product.index'))->with('success', 'Product Added Successfully'); 
    }

    public function edit(Product $product)
    { 
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    { 
        $data = $request->validate([ 
            'name' => 'required|string|max:255', 
            'qty' => 'required|numeric|min:1', 
            'price' => 'required|numeric|min:0', 
            'description' => 'nullable|string'
        ]); 

        $product->update($data); 
         
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully'); 
    }

    public function destroy(Product $product)
    { 
        $product->delete(); 
         
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    } 
}
