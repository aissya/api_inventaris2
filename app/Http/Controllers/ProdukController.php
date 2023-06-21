<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produks = Produk::paginate(10);
        // return response()->json([
        //     'data' => $produks
        // ]); 
        $produks = Produk::all();
        return response()->json($produks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);

       return redirect('/api/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produks = Produk::find($id);
        return response()->json($produks);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $produk->nama = $request->nama;
        // $produk->harga = $request->harga;
        // $produk->stok = $request->stok;
        // $produk->kategori = $request->kategori;
        // $produk->deskripsi = $request->deskripsi;
        // $produk->save();

        // return response()->json([
        //     'data' => $produk
        // ]); 

        $produk = Produk::where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('/api/produk');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $produk->delete();
        // return response()->json([
        //     'message' => 'produk deleted'
        // ], 204); 
        $produk = Produk::where('id', $id)->delete();
        return redirect('/api/produk');
    }
}
