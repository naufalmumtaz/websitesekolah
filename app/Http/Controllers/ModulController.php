<?php

namespace App\Http\Controllers;

use File;
use App\Modul;
use App\Materi;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function create()
    {
        $modul = Modul::all();
    	return view('page.modul.create', compact('modul'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'nama_guru' => 'required|max:100',
    	]);
        
        $nm = $request->gambar;
        $namaFile = time().rand(100, 999).".".$nm->getClientOriginalExtension();

        $modul = new Modul;

        $modul->judul = $request->judul;
        $modul->nama_guru = $request->nama_guru;
        $modul->user_id = auth()->user()->id;
        $modul->gambar = $namaFile;
        $nm->move(public_path() . '/files', $namaFile);
        
        $modul->save();
    	return redirect('/modul');
    }

    public function index()
    {
        $modul = Modul::all();
        return view('page.modul.index', compact('modul'));
    }

    public function edit($id)
    {
        $modul = Modul::find($id);

        return view('page.modul.edit', compact('modul'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'nama_guru' => 'required|max:100',
        ]);

        $modul = Modul::find($id);

        if($request->has('gambar'))
        {
            $gambarName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $gambarName);

            $modul->judul = $request->judul;
            $modul->nama_guru = $request->nama_guru;
            $modul->gambar = $gambarName;
        }
        else
        {
            $modul->judul = $request->judul;
            $modul->nama_guru = $request->nama_guru;
        }

        $modul->update();
        return redirect('/modul');
    }

    public function destroy($id)
    {
        $modul = Modul::find($id);

        $path = 'images/';
        File::delete($path . $modul->gambar);

        $modul->delete();
        return redirect('/modul');
    }
}
