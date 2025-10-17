<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required', 'string'],
            'username' => ['required', 'unique:users', 'string'],
            'email' => ['required','unique:users', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
