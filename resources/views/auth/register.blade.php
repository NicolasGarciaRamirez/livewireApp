<x-guest-layout>
    <x-jet-validation-errors class="m-4 p-2 container-fluid border-rounded text-center alert-danger text-white w-25" />

    <div class="d-flex justify-content-center align-items-center text-center">
        <h3>Register GrandStore®</h3>
    </div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <form method="POST" action="{{ route('register') }}" class="container text-center justify-content-center">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center">
                <x-jet-input id="name" class="form-control w-25 block mt-1 w-full" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="d-flex flex-row align-items-center justify-content-center mt-4">
                <x-jet-input id="email" class="form-control w-25 block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email')" required />
            </div>

            <div class="d-flex flex-row align-items-center justify-content-center mt-4">
                <x-jet-input id="password" class="form-control w-25 block mt-1 w-full" type="password" name="password" placeholder="password" required autocomplete="new-password" />
            </div>

            <div class="d-flex flex-row align-items-center justify-content-center mt-4">
                <x-jet-input id="password_confirmation" class="form-control w-25 block mt-1 w-full" type="password" name="password_confirmation" placeholder="Password Confirm" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="bg-primary text-white ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
