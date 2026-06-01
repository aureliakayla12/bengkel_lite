<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Motor;
use App\Pelanggan;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Motor::with('pelanggan')->get();
        return view('motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('motor.create', compact('pelanggan'));
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
        'merk' => 'required',
        'tipe' => 'required',
        'nomor_plat' => ['required',
            Rule::unique('motor', 'nomor_plat'),
        ],
        'tahun' => 'required',
    ]);

    Motor::create([
        'pelanggan_id' => $request->pelanggan_id,
        'merk' => $request->merk,
        'tipe' => $request->tipe,
        'nomor_plat' => $request->nomor_plat,
        'tahun' => $request->tahun,
    ]);

        return redirect()->route('motor.index')
                        ->with('success', 'Data motor berhasil ditambahkan');
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
        $dataeditmotor = Motor::find($id);
        $pelanggan = Pelanggan::all();
        return view('motor.edit', compact('dataeditmotor', 'pelanggan'));
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
            'pelanggan_id' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'nomor_plat' => ['required',
                Rule::unique('motor', 'nomor_plat')->ignore($id, 'motor_id'),
            ],
            'tahun' => 'required',
        ]);

        $motor = Motor::findOrFail($id);

        $motor->update([
            'pelanggan_id' => $request->pelanggan_id,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'nomor_plat' => $request->nomor_plat,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('motor.index')
                         ->with('success', 'Data motor berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Motor::where('motor_id', $id)->delete();
        return redirect()->route('motor.index');
    }
}
