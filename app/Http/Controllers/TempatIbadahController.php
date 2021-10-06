<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempatIbadah;
use Illuminate\Support\Facades\Validator;

class TempatIbadahController extends Controller
{
    public function datatempatibadah()
    {
        $data = [
            'title' => 'Tempat Ibadah'
        ];
        $agama_hindu = TempatIbadah::where('agama', 'Hindu')->count();
        $agama_islam = TempatIbadah::where('agama', 'Islam')->count();
        $agama_kristen_protestan = TempatIbadah::where('agama', 'Kristen Protestan')->count();
        $agama_kristen_katolik = TempatIbadah::where('agama', 'Kristen Katolik')->count();

        $Tagama = TempatIbadah::orderby('id', 'desc')->get();
        return view("admin.tempat_ibadah.alldata", compact('Tagama','agama_hindu','agama_islam', 'agama_kristen_katolik', 'agama_kristen_protestan'), $data);
    }

    public function createdata()
    {
        $data = [
            'title' => 'Tambah Data Tempat Ibadah'
        ];
        
        return view("admin.tempat_ibadah.create", $data);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'agama' => 'required',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $tempatibadah = new Tempatibadah();
        $tempatibadah->id_potensi = 3;
        $tempatibadah->agama = $request->agama;
        $tempatibadah->nama = $request->nama;
        $tempatibadah->alamat = $request->alamat;
        $tempatibadah->lat = $request->Lat;
        $tempatibadah->lng = $request->Lng;

        $tempatibadah->save();
        return redirect('/tempat-ibadah')->with('statusInput', 'Input Success');
    }

    public function editdata($id)
    {
        $data = [
            'title' => 'Edit Data tempatibadah'
        ];
        $tempatibadah = Tempatibadah::find($id);
        return view("admin.tempat_ibadah.edit", compact('tempatibadah'), $data);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'agama' => 'required',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $tempatibadah = Tempatibadah::find($id);
        $tempatibadah->id_potensi = 3;
        $tempatibadah->agama = $request->agama;
        $tempatibadah->nama = $request->nama;
        $tempatibadah->alamat = $request->alamat;
        $tempatibadah->lat = $request->Lat;
        $tempatibadah->lng = $request->Lng;

        $tempatibadah->update();
        return redirect('/tempat-ibadah')->with('statusInput', 'update Success');
    }

    public function delete($id){
        $tempatibadah = Tempatibadah::find($id);
        $tempatibadah->delete();
        return redirect('/tempat-ibadah')->with('statusInput', 'delete Success');
    }
}
