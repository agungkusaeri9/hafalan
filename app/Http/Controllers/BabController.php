<?php

namespace App\Http\Controllers;

use App\Bab;
use App\Kitab;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bab::with('kitab')->orderBy('kitab_id','ASC')->get();
        return view('pages.bab.index',[
            'title' => 'Data bab',
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

        $data_kitab = Kitab::orderBy('nama','ASC')->get();
        return view('pages.bab.create',[
            'title' => 'Tambah Bab',
            'data_kitab' => $data_kitab
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
            'nama' => ['required'],
            'kitab_id' => ['required']
        ]);

        Bab::create([
            'nama' => request('nama'),
            'kitab_id' => request('kitab_id')
        ]);

        return redirect()->route('bab.index')->with('success','Bab berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bab  $Bab
     * @return \Illuminate\Http\Response
     */
    public function show(Bab $Bab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bab  $Bab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Bab::findOrFail($id);
        $data_kitab = Kitab::orderBy('nama','ASC')->get();
        return view('pages.bab.edit',[
            'title' => 'Edit Bab',
            'data_kitab' => $data_kitab,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bab  $Bab
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'kitab_id' => ['required']
        ]);

        Bab::where('id',$id)->update([
            'nama' => request('nama'),
            'kitab_id' => request('kitab_id')
        ]);

        return redirect()->route('bab.index')->with('success','Bab berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bab  $Bab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bab::destroy($id);
        return redirect()->route('bab.index')->with('success','Bab berhasil dihapus');
    }


    public function get($kitab_id)
    {
        $bab = Bab::where('kitab_id',$kitab_id)->get();
        return response()->json($bab);
    }
}
