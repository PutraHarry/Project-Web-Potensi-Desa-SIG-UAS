<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\TempatIbadah;
use App\TempatPerbelanjaan;
use App\Pasar;

class AdminController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    
    
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $jumlah_sekolah = Sekolah::where('deleted_at', NULL)->count();
        $jumlah_pasar = Pasar::where('deleted_at', NULL)->count();
        $jumlah_tempat_ibadah = TempatIbadah::where('deleted_at', NULL)->count();
        $jumlah_tempat_perbelanjaan = TempatPerbelanjaan::where('deleted_at', NULL)->count();
        
        $sekolah = Sekolah::get();
        $tempat_ibadah = TempatIbadah::get();
        $tempat_perbelanjaan = TempatPerbelanjaan::get();
        $pasar = Pasar::get();

        return view('admin.dashboard', compact('jumlah_sekolah','sekolah', 'jumlah_pasar', 'pasar', 'jumlah_tempat_ibadah','tempat_ibadah', 'jumlah_tempat_perbelanjaan','tempat_perbelanjaan'), $data);
    }
}
