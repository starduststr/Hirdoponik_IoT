<?php

namespace App\Http\Controllers;

use App\Models\SetParameterModel;
use Illuminate\Http\Request;

class Setup_sensor extends Controller
{
    public function index()
    {
        $summary = SetParameterModel::all();

        $data = ['title'=>'SETUP PARAMETER',
                'summary'=>$summary];

        return view('setup_sensor', $data);
    }

    public function create(Request $request)
    {
        $validasi = $request->validate([
            'ph' => ['required'],
            'ppm' => ['required'],
            'nama_tanaman'=> ['required'],
            'usia_tanam' => ['required'],
            'aksipH' => ['required'],
            'aksippm' => ['required']
        ]);

        if(!$validasi){
            return redirect()->back()->with('failed', 'Gagal menambhakan data!');
        } else if ($validasi){
            SetParameterModel::create([
                'nama_tanaman'=> $request->nama_tanaman,
                'usia_tanam' => $request->usia_tanam,
                'ppm' => $request->ppm,
                'ph' => $request->ph,
                'aksi_ph' => $request->aksipH,
                'aksi_ppm' => $request->aksippm
            ]);
    
    
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect()->back();
        }
    }
    

    public function delete(Request $request)
    {
        if($request->validate(['id'=>['required']])){
            if(SetParameterModel::where(['id'=>$request->id])->delete()){
                return redirect()->back()->with('success', 'Data berhasil dihapus');
            } else {
                return redirect()->back()->with('failed', 'Data gagal dihapus');
            }
            
        }
    }

    public function edit(Request $request)
    {
        $validasi = $request->validate([
            'id' => ['required'],
            'ph' => ['required'],
            'ppm' => ['required'],
            'nama_tanaman'=>['required'],
            'usia_tanam' => ['required'],
            'aksi_ph' => ['required'],
            'aksi_ppm' => ['required']
        ]);

        if(!$validasi){
            return redirect()->back()->with('failed', 'Gagal update data!');
        } else if ($validasi){
            SetParameterModel::where(['id'=>$request->id])->update([
                'nama_tanaman'=>$request->nama_tanaman,
                'usia_tanam' => $request->usia_tanam,
                'ppm' => $request->ppm,
                'ph' => $request->ph,
                'aksi_ph' => $request->aksi_ph,
                'aksi_ppm' => $request->aksi_ppm
            ]);
    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } else {
            return redirect();
        }
    }
}
