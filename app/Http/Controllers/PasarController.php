<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasar;
use Illuminate\Support\Facades\Validator;

class PasarController extends Controller
{

    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    
    public function datapasar()
    {
        $data = [
            'title' => 'Pasar'
        ];
        $tempat_pasar = Pasar::orderby('id', 'desc')->get();
        return view("admin.pasar.alldata", compact('tempat_pasar'), $data);
        return response()->json($pasar);
    }

    public function createdata()
    {
        $data = [
            'title' => 'Tambah Data Pasar'
        ];
        return view('admin.pasar.create', $data);
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

        $pasar = new Pasar();
        $pasar->id_potensi = 1;
        $pasar->nama = $request->nama;
        $pasar->alamat = $request->alamat;
        $pasar->lat = $request->Lat;
        $pasar->lng = $request->Lng;

        $pasar->save();
        return redirect('/pasar')->with('statusInput', 'Input Success');
        return response()->json($pasar, 201);
    }

    public function editdata($id)
    {
        $data = [
            'title' => 'Edit Data Pasar'
        ];
        $pasar = Pasar::find($id);
        return view("admin.pasar.edit", compact('pasar'), $data);
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

        $pasar = Pasar::find($id);
        $pasar->id_potensi = 1;
        $pasar->nama = $request->nama;
        $pasar->alamat = $request->alamat;
        $pasar->lat = $request->Lat;
        $pasar->lng = $request->Lng;

        $pasar->update();
        return redirect('/pasar')->with('statusInput', 'update Success');
        return response()->json($pasar, 200);
    }
    
    public function delete($id){
        $pasar = Pasar::find($id);
        $pasar->delete();
        return redirect('/pasar')->with('statusInput', 'delete Success');
        return response()->json(null, 204);
    }
    
}
