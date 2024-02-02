<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);
        Product::create($validatedData);
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $this->validateData($request);
        $product->update($validatedData);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required',
            'description' => 'nullable'
        ]);
    }
}
