<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\View\View;
use App\Models\State;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Fetch all states
        $states = State::all();
        
        return view('auth.register', compact('states'));
    }
    

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validate incoming registration request with additional fields
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],       // New field
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],   // New field
            'address' => ['required', 'string', 'max:255'],       // New field
            'pincode' => ['required', 'string', 'max:10'],        // New field
            'state' => ['required', 'string', 'max:255'],         // New field
            'city' => ['required', 'string', 'max:255'],          // New field
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create a new user with additional fields
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,           // Store surname
            'email' => $request->email,
            'phone_number' => $request->phone_number, // Store phone number
            'address' => $request->address,           // Store address
            'pincode' => $request->pincode,           // Store pincode
            'state' => $request->state,               // Store state
            'city' => $request->city,                 // Store city
            'password' => Hash::make($request->password),
        ]);

        // Trigger registered event and login user
        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
