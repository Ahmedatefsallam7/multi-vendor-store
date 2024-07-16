<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller {
    /**
    * Display the registration view.
    */

    public function create(): View {
        return view( 'auth.register' );
    }

    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */

    public function store( Request $request ): RedirectResponse {
        $request->validate( [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i' ],
            'phone' => [ 'required', 'string', 'unique:users', 'regex:/^\+?[0-9]{10,14}$/i' ],
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        ], [
            'email.regex' => 'The email must be a valid email address.',
            'phone.regex' => 'The phone number must be a valid phone number.',
        ] );

        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make( $request->password ),
        ] );

        event( new Registered( $user ) );

        Auth::login( $user );

        return redirect( RouteServiceProvider::HOME );
    }
}
