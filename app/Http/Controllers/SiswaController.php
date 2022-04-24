<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function create()
    {
        $kelas = Kelas::all();
    	return view('page.siswa.create', compact('kelas'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|min:10|max:10',
            'nisn' => 'required|min:8|max:8',
    		'nama' => 'required',
    		'alamat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
        
        $gambarName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('files'), $gambarName);
 
        Siswa::create([
    		'nis' => $request->nis,
    		'nisn' => $request->nisn,
    		'nama' => $request->nama,
    		'alamat' => $request->alamat,
    		'kelas_id' => $request->kelas_id,
    		'gambar' => $gambarName
    	]);
 
    	return redirect('/siswa');
    }

    public function index()
    {
        $siswa = Siswa::all();
        return view('page.siswa.index', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();

        return view('page.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
    		'nis' => 'required|min:10|max:10',
    		'nisn' => 'required|min:8|max:8',
    		'nama' => 'required',
    		'alamat' => 'required',
    	]);

        $siswa = Siswa::find($id);

        if($request->has('gambar'))
        {
            $gambarName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('files'), $gambarName);

            $siswa->nis = $request->nis;
            $siswa->nisn = $request->nisn;
            $siswa->nama = $request->nama;
            $siswa->alamat = $request->alamat;
            $siswa->kelas_id = $request->kelas_id;
            $siswa->gambar = $gambarName;
        }
        else
        {
            $siswa->nis = $request->nis;
            $siswa->nisn = $request->nisn;
            $siswa->nama = $request->nama;
            $siswa->alamat = $request->alamat;
            $siswa->kelas_id = $request->kelas_id;
        }

        $siswa->update();
        return redirect('/siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        $path = 'files/';
        File::delete($path . $siswa->gambar);

        $siswa->delete();
        return redirect('/siswa');
    }
}
