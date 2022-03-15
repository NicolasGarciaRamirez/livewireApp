<x-guest-layout>
    <div class="text-center font-weight-bold mt-1">
        <h3>Welcome GrandStore®</h3>
    </div>
    <x-jet-authentication-card class="d-flex justify-content-center align-content-center">\

        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="container text-center" >
            @csrf

            <div class="d-flex flex-row align-items-center justify-content-center">
                <x-jet-input id="email" class="form-control mx-auto block w-25" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="d-flex flex-row align-items-center justify-content-center mt-4">
                <x-jet-input id="password" class="form-control mx-auto mt-1 w-25" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mx-auto">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-jet-button class="btn mx-auto bg-primary mx-auto">
                    {{ __('Login') }}
                </x-jet-button>
                <br><br>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Do not you have an account yet?') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
