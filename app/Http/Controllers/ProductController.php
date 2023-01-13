<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('Backend.Product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Product.product_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

        Product::create($validateData);

        return redirect('/product')->with('success', 'Product succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $products = Product::find($id);

        return view('Backend.Product.product_update', compact('products'));
=======
        $produk = Product::findOrfail($id);
        return view('Backend.Product.product_update', compact('produk'));
>>>>>>> e839048d5f01c7570a2b36aba6b22fbc7244d925
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

<<<<<<< HEAD
        Product::where('id', $id)->update($validateData);

        return redirect('/product')->with('success', 'Produk berhasil di update');
=======

        Product::where('id', $id)->update($validateData);

        return redirect('/product')->with('success', 'Product berhasil di update');
>>>>>>> e839048d5f01c7570a2b36aba6b22fbc7244d925
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus!');
    }
}
