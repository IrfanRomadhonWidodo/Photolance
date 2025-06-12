<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Booking;

class TentangKamiController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count(); 

        $jumlahEmployee = Employee::where('status', 'approved')->count();

        $jumlahBookingSukses = Booking::where('status', 'completed')->count();

        return view('dashboard', compact('jumlahUser', 'jumlahEmployee', 'jumlahBookingSukses'));
    }

    public function index2()
    {
        $jumlahUser = User::count(); 

        $jumlahEmployee = Employee::where('status', 'approved')->count();

        $jumlahBookingSukses = Booking::where('status', 'completed')->count();

        return view('home', compact('jumlahUser', 'jumlahEmployee', 'jumlahBookingSukses'));
    }
}
