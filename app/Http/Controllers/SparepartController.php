<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = Sparepart::all();
        return view('sparepart.index', compact('sparepart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sparepart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Sparepart::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('sparepart.index')
                         ->with('success', 'Sparepart berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditsparepart = Sparepart::findOrFail($id);
        return view('sparepart.edit', compact('dataeditsparepart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
    ]);

        $sparepart = Sparepart::findOrFail($id);

        $sparepart->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
    ]);

        return redirect()->route('sparepart.index')
                        ->with('success', 'Sparepart berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
