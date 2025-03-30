<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
            $credentials = $request->validate([ 
                'email' => 'required|email', 
                'password' => 'required' 
            ]); 

            $remember = $request->has('remember'); // Check if Remember Me is checked

            if (Auth::attempt($credentials,$remember)) { 
                $request->session()->regenerate(); // Prevents session fixation 
                        // Redirect based on user type
                if (Auth::user()->isAdmin()) {
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
                }
                return redirect()->route('coders.index')->with('success', 'Logged in successfully'); 
            } 
        
            return back()->withErrors(['my-error' => 'Invalid credentials'])->withInput(); 
            // Throw ValidationException::withMessages(['success' => 'Invalid credentials']);
    }

    public function postRegister(Request $request)
    {
        // $data = $request->only('name', 'email', 'password');
        // $data['password'] = bcrypt($data['password']);
        // $user = User::create($data);
        // auth()->login($user);
        // return redirect()->route('coders.index');

            // Validation rules
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed', // Requires password_confirmation field
                // 'confirmed_password2' 'required_with:pasword|same:password|min:6'
                // 'user_type' => 'required|in:admin,user', // Validate user_type // Ensure only valid types
            ]);
    
            // If validation fails, return errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Create the user
            //OR
            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->save();   

            //OR
            // $user = new User();
            // $user->fill($request->all());
            // $user->password = Hash::make($request->password);
            // $user->save();

            //OR
            // $user = new User();  
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->save();

            
            // $user = User::create($request->all());
            // $user->password = Hash::make($request->password);
            // $user->save();

            //OR
            // $user = new User($request->all());
            // $user->password = Hash::make($request->password);
            // $user->save();

            //OR    
            // $user = User::create($validator);


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type ?? 'user', // Default to 'user' if not provided
            ]);
    
            // Log the user in after registration (Optional)
            // Auth::login($user);
            auth()->login($user);
    
            // Redirect to dashboard or home page with success message
            return redirect()->route('coders.index')->with('success', 'Registration successful!');
        
    }

    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect guests to login instead of throwing an error when they try to logout while not logged in via the logout link
        }

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
