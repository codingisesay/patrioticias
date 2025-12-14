<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email'    => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($credentials, $request->boolean('remember'))) {
    //         $request->session()->regenerate();

    //         // IMPORTANT: role relation access
    //         $roleName = auth()->user()->role?->name;

    //         if ($roleName === 'admin') {
    //             return redirect()->route('admin.dashboard');
    //         }

    //         if ($roleName === 'student') {
    //             return redirect()->route('student.dashboard');
    //         }

    //         // If role not set or unknown
    //         Auth::logout();
    //         return redirect()->route('login')->withErrors([
    //             'email' => 'Role not assigned. Contact admin.'
    //         ]);
    //     }

    //     return back()->withErrors(['email' => 'Invalid credentials']);
    // }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    // only active users can login
    $credentials['is_active'] = 1;

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        auth()->user()->load('role');
        $role = auth()->user()->role?->name;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role === 'student') {
            return redirect()->route('student.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Role not assigned. Contact admin.']);
    }

    return back()->withErrors([
        'email' => 'Invalid credentials OR account inactive.',
    ]);
}

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('loginPage');
}
}
