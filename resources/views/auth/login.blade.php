<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-4">
            <div>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    &nbsp;{{ __('Create New Account?') }}&nbsp;
                </a>

                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-1 block" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Social Auth Links -->
        <div class="social-auth-links text-center mt-4 mb-4">
            <p class="text-gray-600 mb-4">- OR -</p>
            <a href="#" class="flex items-center justify-center bg-blue-600 rounded text-white py-2 px-4 m-2 btn btn-block hover:bg-blue-700 transition duration-300 ease-in-out">
                <i class="fab fa-facebook-f mr-2"></i> Log in using Facebook
            </a>
            <a href="#" class="flex items-center justify-center bg-red-600 rounded text-white py-2 px-4 m-2 btn btn-block hover:bg-red-700 transition duration-300 ease-in-out">
                <i class="fab fa-google mr-2"></i> Log in using Google
            </a>
        </div>
    </form>
</x-guest-layout>
