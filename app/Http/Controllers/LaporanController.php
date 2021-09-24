<?php

namespace App\Http\Controllers;

use App\Siswa;
use PDF;
use Illuminate\Support\Facades\App;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index',[
            'title' => 'Laporan Hafalan',
            'data_siswa' => Siswa::orderBy('nama','ASC')->get()
        ]);
    }

    public function print($siswa_id)
    {
        $siswa = Siswa::with('kelas','hafalan')->findOrFail($siswa_id);
        $pdf = PDF::loadView('pages.laporan.print', [
            'siswa' => $siswa
        ]);
        return $pdf->stream('laporan-pengaduan-masyarakat.pdf');
    }
}
