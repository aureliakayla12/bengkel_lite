<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mekanik;

class MekanikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mekanik = Mekanik::all();
        return view('mekanik.index', compact('mekanik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mekanik.create');
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

        Mekanik::create([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('mekanik.index')
                        ->with('success', 'Data mekanik berhasil diupdate');

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
        $dataeditmekanik = Mekanik::findOrFail($id);
        return view('mekanik.edit', compact('dataeditmekanik'));
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

        $mekanik = Mekanik::findOrFail($id);

        $mekanik->update([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('mekanik.index')
                         ->with('success', 'Data mekanik berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mekanik::where('mekanik_id', $id)->delete();
        return redirect()->route('mekanik.index');
    }
}
