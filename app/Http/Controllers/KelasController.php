<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kelas::orderBy('nama')->get();
        return view('pages.kelas.index',[
            'title' => 'Data Kelas',
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
        return view('pages.kelas.create',[
            'title' => 'Tambah Kelas'
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
            'nama' => ['required','unique:kelas,nama']
        ]);

        Kelas::create([
            'nama' => request('nama')
        ]);

        return redirect()->route('kelas.index')->with('success','Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kelas::findOrFail($id);
        return view('pages.kelas.edit',[
            'title' => 'Edit Kelas',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'nama' => ['required',Rule::unique('kelas','nama')->ignore($id)]
        ]);

        Kelas::where('id',$id)->update([
            'nama' => request('nama')
        ]);

        return redirect()->route('kelas.index')->with('success','Kelas berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);

        return redirect()->route('kelas.index')->with('success','Kelas berhasil dihapus');
    }
}
