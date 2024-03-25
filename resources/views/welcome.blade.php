<x-guest-layout>
    <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">

            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('referral.register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autofocus />
                </div>

                <div>
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input class="mt-1 block w-full" id="phone" name="phone" type="text" :value="old('phone')" required autofocus />
                </div>

                <div>
                    <x-label for="course" value="{{ __('Course') }}" />
                    <x-select class="mt-1 block w-full" id="course" name="course" type="text" :value="old('course')">
                        <option>-- choose --</option>
                        <option value="MEDICAL SCRIBING (DPMS)">MEDICAL SCRIBING (DPMS)</option>
                        <option value="MEDICAL CODING &amp; BILLING">MEDICAL CODING &amp; BILLING</option>
                        <option value="HOSPITAL ADMINISTRATION(DHHM)">HOSPITAL ADMINISTRATION(DHHM)</option>
                    </x-select>
                </div>

                <div>
                    <x-label for="branch" value="{{ __('Branch') }}" />
                    <x-select class="mt-1 block w-full" id="branch" name="branch" type="text" :value="old('branch')">
                        <option>-- choose --</option>
                        <option value="Perinthalmanna">Perinthalmanna</option>
                        <option value="Thrissur">Thrissur</option>
                        <option value="Ernakulam">Ernakulam</option>
                        <option value="Ottapalam">Ottapalam</option>
                        <option value="Kozhikode">Kozhikode</option>
                        <option value="Kannur">Kannur</option>
                    </x-select>
                </div>

                <div>
                    <x-label for="location" value="{{ __('Location') }}" />
                    <x-input class="mt-1 block w-full" id="location" name="location" type="text" :value="old('location')" required autofocus />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <x-button class="ms-4">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
