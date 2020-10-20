<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Mahasiswa';
        $data = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Data Mahasiswa';
        $data_prodi = Prodi::all();
        return view('admin.mahasiswa.create', compact('data_prodi','pagename'));
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
            'txtnama_mahasiswa'=>'required',
            'txtNIM'=>'required',
            'optionid_prodi'=>'required',
        ]);

        $data_mahasiswa = new Mahasiswa([
            'nama_mahasiswa' => $request->get('txtnama_mahasiswa'),
            'NIM' => $request->get('txtNIM'),
            'id_prodi' => $request->get('optionid_prodi'),
        ]);

        $data_mahasiswa->save();
        return redirect('admin/mahasiswa')->with('sukses','data mahasiswa berhasil disimpan');
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
        $data_prodi = Prodi::all();
        $pagename = 'Update Data Mahasiswa';
        $data = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', compact('data', 'pagename', 'data_prodi'));
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
        $request->validate([
            'txtnama_mahasiswa'=>'required',
            'txtNIM'=>'required',
            'optionid_prodi'=>'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->nama_mahasiswa = $request->get('txtnama_mahasiswa');
        $mahasiswa->NIM = $request->get('txtNIM');
        $mahasiswa->id_prodi = $request->get('optionid_prodi');

        $mahasiswa->save();
        return redirect('admin/mahasiswa')->with('sukses','data mahasiswa berhasil diupdate');
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
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->delete();
        return redirect('admin/mahasiswa')->with('sukses','data mahasiswa berhasil dihapus');
    }
}
