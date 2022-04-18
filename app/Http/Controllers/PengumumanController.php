<?php

namespace App\Http\Controllers;

use auth;
use App\Siswa;
use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function create()
    {
        $pengumuman = Pengumuman::all();
    	return view('page.pengumuman.create', compact('pengumuman'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'isi' => 'required'
    	]);

        Pengumuman::create([
    		'judul' => $request->judul,
    		'isi' => $request->isi,
            'user_id' => auth()->user()->id
    	]);
 
    	return redirect('/pengumuman');
    }

    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('page.pengumuman.index', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('page.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        $siswa = Siswa::all();

        return view('page.pengumuman.edit', compact('pengumuman', 'siswa'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required|max:200',
            'isi' => 'required'
    	]);

        $pengumuman = Pengumuman::find($id);

        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->user_id = auth()->user()->id;
        
        $pengumuman->update();
        return redirect('/pengumuman');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);

        $pengumuman->delete();
        return redirect('/pengumuman');
    }
}
