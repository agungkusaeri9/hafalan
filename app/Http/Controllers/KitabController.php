<?php

namespace App\Http\Controllers;

use App\Kitab;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KitabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kitab::orderBy('nama','ASC')->get();
        return view('pages.kitab.index',[
            'title' => 'Data Kitab',
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
        return view('pages.kitab.create',[
            'title' => 'Tambah Kitab'
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
            'nama' => ['required','unique:kitab,nama']
        ]);

        Kitab::create([
            'nama' => request('nama')
        ]);

        return redirect()->route('kitab.index')->with('success','Kitab berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kitab  $Kitab
     * @return \Illuminate\Http\Response
     */
    public function show(Kitab $Kitab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kitab  $Kitab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kitab::findOrFail($id);
        return view('pages.kitab.edit',[
            'title' => 'Edit Kitab',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kitab  $Kitab
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'nama' => ['required',Rule::unique('kitab','nama')->ignore($id)]
        ]);

        Kitab::where('id',$id)->update([
            'nama' => request('nama')
        ]);

        return redirect()->route('kitab.index')->with('success','Kitab berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kitab  $Kitab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kitab::destroy($id);

        return redirect()->route('kitab.index')->with('success','Kitab berhasil dihapus');
    }
}
