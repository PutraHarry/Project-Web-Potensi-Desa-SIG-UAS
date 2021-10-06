<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempatPerbelanjaan;
use Illuminate\Support\Facades\Validator;

class TempatPerbelanjaanController extends Controller
{
    public function datatempat_perbelanjaan()
    {
        $data = [
            'title' => 'Tempat Belanja'
        ];
        $tempat_perbelanjaan = TempatPerbelanjaan::orderby('id', 'desc')->get();
        return view("admin.tempat-belanja.alldata", compact('tempat_perbelanjaan'), $data);
    }

    public function createdata()
    {
        $data = [
            'title' => 'Tambah Data Tempat Perbelanjaan'
        ];
        return view('admin.tempat-belanja.create', $data);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $perbelanjaan = new TempatPerbelanjaan();
        $perbelanjaan->id_potensi = 2;
        $perbelanjaan->nama = $request->nama;
        $perbelanjaan->alamat = $request->alamat;
        $perbelanjaan->lat = $request->Lat;
        $perbelanjaan->lng = $request->Lng;

        $perbelanjaan->save();
        return redirect('/tempat-belanja')->with('statusInput', 'Input Success');
    }

    public function editdata($id)
    {
        $data = [
            'title' => 'Edit Data Pasar'
        ];
        $tempat_perbelanjaan = TempatPerbelanjaan::find($id);
        return view("admin.tempat-belanja.edit", compact('tempat_perbelanjaan'), $data);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'Lat' => 'required',
            'Lng' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $perbelanjaan = TempatPerbelanjaan::find($id);
        $perbelanjaan->id_potensi = 1;
        $perbelanjaan->nama = $request->nama;
        $perbelanjaan->alamat = $request->alamat;
        $perbelanjaan->lat = $request->Lat;
        $perbelanjaan->lng = $request->Lng;

        $perbelanjaan->update();
        return redirect('/tempat-belanja')->with('statusInput', 'update Success');
    }
    
    public function delete($id){
        $perbelanjaan = TempatPerbelanjaan::find($id);
        $perbelanjaan->delete();
        return redirect('/tempat-belanja')->with('statusInput', 'delete Success');
    }
}
