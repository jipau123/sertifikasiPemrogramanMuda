<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kendaraan;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Tabel Kendaraan';
        $data = Kendaraan::all();
        return view('admin.kendaraan.index' , compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Kendaraan';
        return view('admin.kendaraan.create' , compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'txtno_Plat'=>'required',
            'txtmerk_Kendaraan'=>'required',
            'txtnama_Pemilik'=>'required',
        ]);

        $data_kendaraan = new Kendaraan([
            'no_Plat' => $request->get('txtno_Plat'),
            'merk_Kendaraan' => $request->get('txtmerk_Kendaraan'),
            'nama_Pemilik' => $request->get('txtnama_Pemilik'),
        ]);

        $data_kendaraan->save();
        return redirect('admin/kendaraan')->with('sukses','tugas berhasil disimpan');
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
        //
    }
}
