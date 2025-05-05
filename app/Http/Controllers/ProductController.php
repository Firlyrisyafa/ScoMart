<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'gambar' => 'nullable|url',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_url' => $request->gambar ?? '',
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'gambar' => 'nullable|url',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_url' => $request->gambar ?? '',
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

// use App\Models\Product;
// use Illuminate\Support\Facades\Storage;

// class ProductController extends Controller
// {
//     public function index(Request $request)
//     {
//         $query = Product::query();

//         if ($request->has('search') && $request->search != '') {
//             $query->where('name', 'like', '%' . $request->search . '%');
//         }

//         $products = $query->get();

//         return view('products.index', compact('products'));
//     }

//     public function create()
//     {
//         return view('products.create');
//     }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required|numeric',
    //         'description' => 'required',
    //         'gambar' => 'nullable|url',
            // 'image_url' => 'required|url',
        // ]);

        // Product::create($request->all());
        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'image_url' => $request->gambar ?? '', // ini dia solusinya
        // ]);
        
        
        // Product::create([
        //     'nama' => $request->nama,
        //     'harga' => $request->harga,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $request->gambar,
        // ]);

//         return redirect()->route('products.index')->with('success', 'Product created successfully.');
//     }

//     public function edit($id)
//     {
//         $product = Product::findOrFail($id);
//         return view('products.edit', compact('product'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'name' => 'required',
//             'price' => 'required|numeric',
//             'description' => 'required',
//             'gambar' => 'nullable|url',
//         ]);

//         $product = Product::findOrFail($id);
//         $product->update($request->all());

//         return redirect()->route('products.index')->with('success', 'Product updated successfully.');
//     }

//     public function destroy($id)
//     {
//         $product = Product::findOrFail($id);
//         $product->delete();

//         return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
//     }

// }
