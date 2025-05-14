<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Booking; // Tambahkan ini

class TentangKamiController extends Controller
{
    public function index()
    {
        // Ambil jumlah user
        $jumlahUser = User::count(); 

        // Ambil jumlah employee yang disetujui
        $jumlahEmployee = Employee::where('status', 'approved')->count();

        // Ambil jumlah booking dengan status completed
        $jumlahBookingSukses = Booking::where('status', 'completed')->count();

        // Kirim data ke view
        return view('dashboard', compact('jumlahUser', 'jumlahEmployee', 'jumlahBookingSukses'));
    }

    public function index2()
    {
        // Ambil jumlah user
        $jumlahUser = User::count(); 

        // Ambil jumlah employee yang disetujui
        $jumlahEmployee = Employee::where('status', 'approved')->count();

        // Ambil jumlah booking dengan status completed
        $jumlahBookingSukses = Booking::where('status', 'completed')->count();

        // Kirim data ke view
        return view('home', compact('jumlahUser', 'jumlahEmployee', 'jumlahBookingSukses'));
    }
}
