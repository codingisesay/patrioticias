<?php
// app/Http/Middleware/EnsureUserIsActive.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsActive
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('loginPage')
                ->withErrors(['email' => 'Your account is inactive. Contact admin.']);
        }

        return $next($request);
    }
}
