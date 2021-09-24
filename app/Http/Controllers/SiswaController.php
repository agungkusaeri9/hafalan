<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Siswa::orderBy('nama','ASC')->get();
        return view('pages.siswa.index',[
            'title' => 'Data Siswa',
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
        return view('pages.siswa.create',[
            'title' => 'Tambah Siswa',
            'data_kelas' => Kelas::orderBy('nama','ASC')->get()
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
            'nis' => ['required','unique:siswa,nis','numeric'],
            'nama' => ['required'],
            'kelas_id' => ['required'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required']
        ]);

        $data = request()->all();

        Siswa::create($data);

        return redirect()->route('siswa.index')->with('success','Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.siswa.edit',[
            'title' => 'Edit Siswa',
            'data_kelas' => Kelas::orderBy('nama','ASC')->get(),
            'item' => Siswa::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'nis' => ['required',Rule::unique('siswa','nis')->ignore($id),'numeric'],
            'nama' => ['required'],
            'kelas_id' => ['required'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required']
        ]);

        $data = request()->all();
        $siswa = Siswa::find($id);
        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success','Siswa berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success','Siswa berhasil dihapus');
    }

    public function get($kelas_id)
    {
        $siswa = Siswa::where('kelas_id',$kelas_id)->get();
        return response()->json($siswa);
    }
}
