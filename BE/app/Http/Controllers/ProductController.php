<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
            'Stock' => 'required|numeric|min:0',
            'Harga' => 'required|numeric|min:0',
            'Foto' => 'required|string|max:255',
        ]);

        
        Product::create($validatedData);

        return response()->json([
            'message' => 'Barang telah sukses di-upload'
        ], 201);
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'Nama' => 'required|string|max:255',
        'Stock' => 'required|numeric|min:0',
        'Harga' => 'required|numeric|min:0',
        'Foto' => 'required|string|max:255',
    ]);

    $product = Product::find($id);

    if (!$product) {
        return response()->json([
            'message' => 'Produk tidak ada'
        ], 404);
    }

    $product->update($validatedData);

    return response()->json([
        'message' => 'Produk sukses di updated',
    ], 200);
}
}
