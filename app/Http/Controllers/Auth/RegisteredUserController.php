<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use function App\Helpers\attachFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Controllers\Actions\Users\StoreUserAction;

class RegisteredUserController extends Controller {
    function __construct( private StoreUserAction $storeUserAction ) {
    }

    public function create(): View {
        return view( 'auth.register' );
    }

    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */

    public function store( StoreUserRequest $request ): RedirectResponse {

        // remove null values
        $data = $this->unsetNullValues( $request->all() );

        //store user
        $user = $this->storeUserAction->execute( $data );

        // helper method to attach files
        attachFile( $user, $request, 'image' );

        event( new Registered( $user ) );

        Auth::login( $user );

        return redirect( RouteServiceProvider::HOME );
    }
}