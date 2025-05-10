<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    public function index()
    {
        $photographers = Employee::where('kategori', 'photographer')->get();
        
        return view('dashboard', compact('photographers'));
    }
}