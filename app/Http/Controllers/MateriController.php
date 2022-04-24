<?php

namespace App\Http\Controllers;

use App\Modul;
use File;
use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function create($id)
    {
        $modul = Modul::find($id);
    	return view('page.materi.create', compact('modul'));
    }
 
    public function store(Request $request, $id)
    {
        // $request->validate([
        //     'judul' => 'required|max:100',
        //     'file_materi' => 'required|max:200'
    	// ]);
        
        $nm = $request->file_materi;
        $namaFile = $nm->getClientOriginalName();

        $materi = new Materi;
        
        $materi->judul = $request->judul;
        $materi->file_materi = $namaFile;
        $materi->modul_id = $id;
        $nm->move(public_path() . '/files', $namaFile);
        
        $materi->save();
    	return redirect('/modul/materi/' . $id);
    }

    public function index($id)
    {
        $materi = Materi::where('modul_id', $id)->get();
        $modul = Modul::find($id);
        return view('page.materi.index', compact('materi', 'modul'));
    }

    public function destroy($id)
    {
        $materi = Materi::find($id);

        $path = 'files/';
        File::delete($path . $materi->file_materi);

        $materi->delete();
        return redirect('/modul/materi/' . $id);
    }
}
