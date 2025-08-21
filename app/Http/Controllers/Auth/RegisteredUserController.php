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
use Illuminate\View\View;
use DateTimeZone; // Import for timezone validation

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Pass timezones to the view for the dropdown
        $timezones = DateTimeZone::listIdentifiers();
        return view('auth.register', compact('timezones'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:20', 'unique:'.User::class, 'alpha_dash'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'timezone' => ['required', 'string', 'timezone'], // Uses Laravel's built-in timezone rule
            'terms' => ['required', 'accepted'], // Validates that the terms checkbox is checked
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, // The 'hashed' cast in the model will handle this
            'phone_number' => $request->phone_number,
            'timezone' => $request->timezone,
            'locale' => $request->locale ?? config('app.locale'), // Default to app's locale
            'terms_accepted_at' => now(), // Set the timestamp explicitly
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}