<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Kitab;
use App\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = [
            'siswa' => Siswa::count(),
            'kelas' => Kelas::count(),
            'kitab' => Kitab::count()
        ];
        return view('pages.home',[
            'title' => 'Dashboard',
            'count' => $count
        ]);
    }
}
