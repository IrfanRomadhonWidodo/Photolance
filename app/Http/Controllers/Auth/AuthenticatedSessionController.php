<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user(); // Dapatkan data pengguna yang sedang login

        // Cek apakah peran adalah 'admin' ATAU email berakhiran '@photo.ac.id'
        if ($user->role === 'admin' || Str::endsWith($user->email, '@photo.ac.id')) {
            
            // Jika ya, alihkan ke dasbor Filament
             return redirect()->route('filament.admin.pages.dashboard');

        } else {

            // Jika tidak, alihkan ke dasbor pengguna biasa
            return redirect()->route('dashboard');
        }
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
