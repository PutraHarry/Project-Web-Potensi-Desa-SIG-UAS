<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasar;
use App\Sekolah;
use App\TempatIbadah;
use App\TempatPerbelanjaan;

class GuestController extends Controller
{
    public function guest()
    {
        $sekolah = Sekolah::get();
        $pasar = Pasar::get();
        $tempat_ibadah = TempatIbadah::get();
        $tempat_perbelanjaan = TempatPerbelanjaan::get();
        return view('user.home', compact('sekolah', 'pasar', 'tempat_ibadah', 'tempat_perbelanjaan'));
    }

    public function guestsekolah()
    {
        $sekolah = Sekolah::get();
        
        return view('user.sekolah', compact('sekolah'));
    }

    public function guestpasar()
    {
        $pasar = Pasar::get();

        return view('user.pasar', compact('pasar'));
    }

    public function guesttempatibadah()
    {
        $tempat_ibadah = TempatIbadah::get();
        
        return view('user.tempat-ibadah', compact('tempat_ibadah'));
    }

    public function guesttempatbelanja()
    {
        $tempat_perbelanjaan = TempatPerbelanjaan::get();
        
        return view('user.tempat-belanja', compact('tempat_perbelanjaan'));
    }

    public function loginuser()
    {
        return view('layouts.login');
    }
}
