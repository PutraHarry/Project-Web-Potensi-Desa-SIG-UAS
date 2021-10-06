<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use Illuminate\Support\Facades\Validator;


class SekolahController extends Controller
{
    public function datasekolah()
    {
        $data = [
            'title' => 'Sekolah'
        ];
        $jumlah_tk = Sekolah::where('jenjang', 'TK')->count();
        $jumlah_sd = Sekolah::where('jenjang', 'SD')->count();
        $jumlah_smp = Sekolah::where('jenjang', 'SMP')->count();
        $jumlah_sma = Sekolah::where('jenjang', 'SMA')->count();
        $jumlah_smk = Sekolah::where('jenjang', 'SMK')->count();

        $tempat_sekolah = Sekolah::orderby('id', 'desc')->get();
        return view("admin.sekolah.alldata", compact('tempat_sekolah','jumlah_tk','jumlah_sd','jumlah_smp','jumlah_sma','jumlah_smk'), $data);
    }

    public function createdata()
    {
        $data = [
            'title' => 'Tambah Data Sekolah'
        ];
        return view('admin.sekolah.create', $data);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'jenjang' => 'required',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $sekolah = new Sekolah();
        $sekolah->id_potensi = 4;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->nama = $request->nama;
        $sekolah->alamat = $request->alamat;
        $sekolah->lat = $request->Lat;
        $sekolah->lng = $request->Lng;

        $sekolah->save();
        return redirect('/sekolah')->with('statusInput', 'Input Success');
    }

    public function editdata($id)
    {
        $data = [
            'title' => 'Edit Data Sekolah'
        ];
        $sekolah = Sekolah::find($id);
        return view("admin.sekolah.edit", compact('sekolah'), $data);
    }
    
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'jenjang' => 'required',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $sekolah = Sekolah::find($id);
        $sekolah->id_potensi = 4;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->nama = $request->nama;
        $sekolah->alamat = $request->alamat;
        $sekolah->lat = $request->Lat;
        $sekolah->lng = $request->Lng;

        $sekolah->update();
        return redirect('/sekolah')->with('statusInput', 'update Success');
    }
    
    public function delete($id){
        $sekolah = Sekolah::find($id);
        $sekolah->delete();
        return redirect('/sekolah')->with('statusInput', 'delete Success');
    }
}
