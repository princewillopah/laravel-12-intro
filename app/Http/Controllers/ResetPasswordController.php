<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                Auth::login($user);
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password reset successfully.')
            : back()->withErrors(['email' => __($status)]);
    }    



}
