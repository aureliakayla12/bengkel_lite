<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailServis;
use App\Sparepart;

class DetailServisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'servis_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $sparepart = Sparepart::findOrFail($request->sparepart_id);

        // cek stok
        if ($request->qty > $sparepart->stok) {
            return back()->withErrors([
                'qty' => 'Stok tidak cukup (tersisa: ' . $sparepart->stok . ')'
            ]);
        }

        $subtotal = $request->qty * $request->harga;

        DetailServis::create([
            'servis_id' => $request->servis_id,
            'sparepart_id' => $request->sparepart_id,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'subtotal' => $subtotal,
        ]);

        // kurangi stok
        $sparepart->stok -= $request->qty;
        $sparepart->save();

        return back()->with('success', 'Sparepart berhasil ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = DetailServis::findOrFail($id);

        // rollback stok
        $sparepart = Sparepart::findOrFail($detail->sparepart_id);
        $sparepart->stok += $detail->qty;
        $sparepart->save();

        $detail->delete();

        return back()->with('success', 'Item berhasil dihapus');
    }
}
