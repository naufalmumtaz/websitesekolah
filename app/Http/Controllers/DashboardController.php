<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Meeting;
use App\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $pengumuman = Pengumuman::take(5)->get();
        $meeting = Meeting::take(5)->get();
        return view('page.dashboard', compact('siswa', 'pengumuman', 'meeting'));
    }
}
