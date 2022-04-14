<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function create()
    {
    	return view('page.kelas.create');
    }
 
    public function store(Request $request)
    {
    	$request->validate([
    		'kelas' => 'required',
    	]);
 
        Kelas::create([
    		'kelas' => $request->kelas,
    		// 'gambar' => $request->gambar
    	]);
 
    	return redirect('/kelas');
    }

    public function index()
    {
        $kelas = Kelas::all();
        return view('page.kelas.index', compact('kelas'));
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('page.kelas.edit', compact('kelas'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
    		'kelas' => 'required',
        ]);

        $kelas = Kelas::find($id);
        $kelas->kelas = $request->kelas;
        $kelas->update();

        return redirect('/kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas');
    }
}
