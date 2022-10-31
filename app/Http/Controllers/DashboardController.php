<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dosens = Dosen::count();
        $mahasiswas = Mahasiswa::count();
        $matkuls = Matkul::count();
        return view('welcome', compact('dosens', 'mahasiswas', 'matkuls'));
    }
}
