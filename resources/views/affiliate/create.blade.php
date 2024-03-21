<x-guest-layout>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4">
            <x-banner />
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('affiliate.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Contact Number') }}" />
                <x-input class="mt-1 block w-full" id="phone" name="phone" type="text" :value="old('phone')" required autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-label for="location" value="{{ __('District') }}" />
                <x-input class="mt-1 block w-full" id="location" name="location" type="text" :value="old('location')" required autocomplete="location" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
