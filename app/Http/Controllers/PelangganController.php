<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'nama'   => 'required',
            'no_hp'  => 'required',
            'alamat' => 'nullable',
        ]);

        Pelanggan::create([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil ditambahkan');
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
        $dataeditpelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('dataeditpelanggan'));
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
            'nama'   => 'required',
            'no_hp'  => 'required',
            'alamat' => 'nullable',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::where('pelanggan_id', $id)->delete();
        return redirect()->route('pelanggan.index');
    }
}
