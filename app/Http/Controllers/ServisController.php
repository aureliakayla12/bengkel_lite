<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Servis;
use App\Pelanggan;
use App\Motor;
use App\Mekanik;
use App\Sparepart;
use App\DetailServis;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servis = Servis::with(['pelanggan', 'motor', 'mekanik', 'detailServis'])->get();
        return view('servis.index', compact('servis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $motor = Motor::all();
        $mekanik = Mekanik::all();
        $sparepart = Sparepart::all();
        
        return view('servis.create', compact('pelanggan', 'motor', 'mekanik', 'sparepart'));
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
            'pelanggan_id' => 'required',
            'motor_id' => 'required',
            'mekanik_id' => 'required',
            'tanggal_servis' => 'required',
            'biaya_jasa' => 'required|numeric',
            'status' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $totalSparepart = 0;

        foreach ($request->sparepart_id as $i => $sparepart_id) {
            $harga = $request->harga[$i] ?? 0;
            $qty = $request->qty[$i] ?? 0;

            $totalSparepart += $harga * $qty;
        }

        $grandTotal = $request->biaya_jasa + $totalSparepart;

        $servis = Servis::create([
            'pelanggan_id' => $request->pelanggan_id,
            'motor_id' => $request->motor_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_servis' => $request->tanggal_servis,
            'keluhan' => $request->keluhan,
            'biaya_jasa' => $request->biaya_jasa,
            'total_sparepart' => $totalSparepart,
            'grand_total' => $grandTotal,
            'status' => $request->status,
        ]);

        foreach (($request->sparepart_id ?? []) as $i => $sparepart_id) {

            $harga = $request->harga[$i] ?? 0;
            $qty = $request->qty[$i] ?? 0;

            if ($sparepart_id && $qty > 0) {

                DetailServis::create([
                    'servis_id' => $servis->servis_id,
                    'sparepart_id' => $sparepart_id,
                    'harga' => $harga,
                    'qty' => $qty,
                    'subtotal' => $harga * $qty,
                ]);

                //  KURANGI STOK
                $sparepart = Sparepart::find($sparepart_id);

                if ($sparepart) {
                    $sparepart->stok -= $qty;

                    if ($sparepart->stok < 0) {
                        $sparepart->stok = 0;
                    }

                    $sparepart->save();
                }
            }
        }

        DB::commit();
        return redirect()->route('servis.index')->with('success', 'Berhasil');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servis = Servis::with(['pelanggan', 'motor', 'mekanik', 'detailServis.sparepart'])
                    ->findOrFail($id);

        $sparepart = Sparepart::all();

        return view('servis.show', compact('servis', 'sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditservis = Servis::with('detailServis')->findOrFail($id);
        $pelanggan = Pelanggan::all();
        $motor = Motor::all();
        $mekanik = Mekanik::all();
        $sparepart = Sparepart::all();

        return view('servis.edit', compact('dataeditservis', 'pelanggan', 'motor', 'mekanik', 'sparepart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $request->validate([
        'pelanggan_id' => 'required',
        'motor_id' => 'required',
        'mekanik_id' => 'required',
        'tanggal_servis' => 'required',
        'biaya_jasa' => 'required|numeric',
        'status' => 'required',
    ]);

    DB::beginTransaction();

    try {

        $servis = Servis::findOrFail($id);

        // BALIKIN STOK LAMA
       foreach ($servis->detailServis as $d) {
            $sp = Sparepart::find($d->sparepart_id);
            $sp->stok += $d->qty;
            $sp->save();
        }

        DetailServis::where('servis_id',$id)->delete();

        $totalSparepart = 0;

       foreach (($request->sparepart_id ?? []) as $i => $sparepart_id) {
            $totalSparepart += $request->harga[$i] * $request->qty[$i];
        }

        $servis->update([
            'pelanggan_id' => $request->pelanggan_id,
            'motor_id' => $request->motor_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_servis' => $request->tanggal_servis,
            'keluhan' => $request->keluhan,
            'biaya_jasa' => $request->biaya_jasa,
            'total_sparepart' => $totalSparepart,
            'grand_total' => $request->biaya_jasa + $totalSparepart,
            'status' => $request->status,
        ]);

        foreach ($request->sparepart_id as $i => $spid) {

        $qty = $request->qty[$i] ?? 0;
        $harga = $request->harga[$i] ?? 0;

        if($spid && $qty > 0){

        DetailServis::create([
            'servis_id' => $id,
            'sparepart_id' => $spid,
            'qty' => $qty,
            'harga' => $harga,
            'subtotal' => $qty * $harga
        ]);

        $sp = Sparepart::find($spid);

        if($sp){
            $sp->stok -= $qty;
            $sp->save();
        }
    }
}
        DB::commit();
        return redirect()->route('servis.index');

    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error',$e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    DB::beginTransaction();

    try {

        $servis = Servis::with('detailServis')->findOrFail($id);

        foreach ($servis->detailServis as $detail) {

            $sparepart = Sparepart::find($detail->sparepart_id);

            if ($sparepart) {
                $sparepart->stok += $detail->qty;
                $sparepart->save();
            }
        }

        DetailServis::where('servis_id', $id)->delete();

        $servis->delete();

        DB::commit();

        return redirect()->route('servis.index')
            ->with('success', 'Data servis berhasil dihapus');

        } catch (\Exception $e) {

        DB::rollback();

        return back()->with('error', $e->getMessage());
        }
    }
}
