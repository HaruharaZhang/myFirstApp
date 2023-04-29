<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        if (Auth::check()) {
            return redirect('/users/home');
        }
        
        $images = [
            'profiles/110.jpg',
            'profiles/111.jpg',
            'profiles/112.jpg',
            'profiles/113.jpg',
            'profiles/114.jpg',
            'profiles/115.jpg',
            'profiles/116.jpg',
            'profiles/117.jpg',
            'profiles/118.jpg',
            'profiles/119.jpg',
            'profiles/120.jpg',
        ];
        return view('users.register', compact('images'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
