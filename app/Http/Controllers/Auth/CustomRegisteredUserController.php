<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class CustomRegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
            'terms' => ['accepted'], 
        ]);

        // Prepend the +92 prefix to the phone number
        $phone_no = '+92' . $request->phone_no;

        // Determine the role to assign
        $role = $request->role;

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $phone_no,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect based on the role
        if ($role === 'admin') {
            return redirect()->route('admin.index'); 
        } else {
            return redirect()->route('user.index'); 
        }
    }
}

