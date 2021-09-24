<?php

namespace App\Http\Controllers;

use App\Hafalan;
use App\Kelas;
use App\Kitab;
use Illuminate\Http\Request;

class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Hafalan::latest()->get();
        return view('pages.hafalan.index',[
            'title' => 'Data Hafalan',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.hafalan.create',[
            'title' => 'Tambah Hafalan',
            'data_kelas' => Kelas::orderBy('nama','ASC')->get(),
            'data_kitab' => Kitab::orderBy('nama','ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'kelas_id' => ['required'],
            'siswa_id' => ['required'],
            'kitab_id' => ['required'],
            'ayat' => ['required'],
            'tanggal' => ['required'],
        ]);

        $data = request()->all();
        Hafalan::create($data);
        return redirect()->route('hafalan.index')->with('success','Hafalan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function show(Hafalan $hafalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.hafalan.edit',[
            'title' => 'Edit Hafalan',
            'data_kelas' => Kelas::orderBy('nama','ASC')->get(),
            'data_kitab' => Kitab::orderBy('nama','ASC')->get(),
            'item' => Hafalan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'kelas_id' => ['required'],
            'siswa_id' => ['required'],
            'kitab_id' => ['required'],
            'ayat' => ['required'],
            'tanggal' => ['required'],
        ]);

        $data = request()->all();
        $item = Hafalan::findOrFail($id);
        $item->update($data);
        return redirect()->route('hafalan.index')->with('success','Hafalan berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hafalan  $hafalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Hafalan::findOrFail($id);
        $item->delete();
        return redirect()->route('hafalan.index')->with('success','Hafalan berhasil dihapus');
    }
}
