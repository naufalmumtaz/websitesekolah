<?php

namespace App\Http\Controllers;

use File;
use App\Tugas;
use App\Materi;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function create()
    {
        $tugas = Tugas::all();
        $materi = Materi::all();
        
    	return view('page.tugas.create', compact('tugas', 'materi'));
    }
 
    public function store(Request $request)
    {        
        $nm = $request->file_tugas;
        $namaFile = $nm->getClientOriginalName();

        $tugas = new Tugas;
        
        $tugas->judul = $request->judul;
        $tugas->file_tugas = $namaFile;
        $tugas->materi_id = $request->materi_id;
        $nm->move(public_path() . '/files', $namaFile);
        
        $tugas->save();
    	return redirect('/tugas');
    }

    public function uploadtugas($id)
    {
        $tugas = Tugas::all();
        return view('page.tugas.uploadTugas', compact('tugas'));   
        // $data = Tugas::where('id', $id)->first();
        // $status_now = $data->status;

        // if($status_now == 1)
        // {
        //     Tugas::where('id', $id)->update([
        //         'status' => 0
        //     ]);
        // }
        // else
        // {
        //     Tugas::where('id', $id)->update([
        //         'status' => 1
        //     ]);
        // }

        return redirect('/tugas');
    }
    
    public function index()
    {
        $tugas = Tugas::all();
        
        return view('page.tugas.index', compact('tugas'));
    }
    
    public function edit($id)
    {
        $tugas = Tugas::find($id);
        
        return view('page.tugas.edit', compact('tugas'));
    }

    public function update($id, Request $request)
    {
        // $request->validate([
        //     'link' => 'required|max:300',
    	// ]);

        $nm = $request->file_tugas;
        $namaFile = $nm->getClientOriginalName();
        
        $tugas = Tugas::find($id);
        
        $tugas->judul = $request->judul;
        $tugas->file_tugas = $namaFile;
        $tugas->materi_id = $request->materi_id;
        
        $tugas->update();
        return redirect('/tugas');
    }

    public function destroy($id)
    {
        $tugas = Tugas::find($id);
        
        $path = 'files/';
        File::delete($path . $tugas->file_tugas);
        
        $tugas->delete();
        return redirect('/tugas');
    }
}
