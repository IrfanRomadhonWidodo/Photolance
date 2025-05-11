<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;

class TentangKamiController extends Controller
{
    public function index()
    {
        // Ambil jumlah user berdasarkan ID
        $jumlahUser = User::count(); 

        // Ambil jumlah employee dari tabel employees
        $jumlahEmployee = Employee::where('status', 'approved')->count();

        // Kirim data ke view
        return view('dashboard', compact('jumlahUser', 'jumlahEmployee'));
    }

        public function index2()
        {
            // Ambil jumlah user berdasarkan ID
            $jumlahUser = User::count(); 

            // Ambil jumlah employee dari tabel employees
            $jumlahEmployee = Employee::where('status', 'approved')->count();

            // Kirim data ke view
            return view('home', compact('jumlahUser', 'jumlahEmployee'));
        }
}
