<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kategori' => 'required|in:photographer,makeup_artist',
            'portofolio' => 'nullable|url|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $validatedData['status'] = 'pending';
        
        // Create new employee record
        $employee = Employee::create($validatedData);
        
        return redirect()->back()->with('success', 'Pendaftaran berhasil! Status pendaftaran Anda saat ini: Pending');
    }

    
}