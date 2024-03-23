<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            {{ __('Affiliate') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col items-center p-10">
                    <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src="{{ $affiliate->user->profile_photo_url }}" alt="{{ $affiliate->user->name }}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $affiliate->user->name }}</h5>
                </div>
                <div class="mx-auto max-w-xl p-10">
                    <div class="divide-y divide-gray-200">
                        <div class="flex items-center justify-between py-3 sm:py-4">
                            <div class="text-base font-semibold text-gray-900">
                                <p>Name</p>
                            </div>
                            <div class="text-base font-semibold text-gray-900">
                                <p>{{ $affiliate->name }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between py-3 sm:py-4">
                            <div class="text-base font-semibold text-gray-900">
                                <p>Email</p>
                            </div>
                            <div class="text-base font-semibold text-gray-900">
                                <p>{{ $affiliate->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between py-3 sm:py-4">
                            <div class="text-base font-semibold text-gray-900">
                                <p>Contact Number</p>
                            </div>
                            <div class="text-base font-semibold text-gray-900">
                                <p>{{ $affiliate->phone }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between py-3 sm:py-4">
                            <div class="text-base font-semibold text-gray-900">
                                <p>District</p>
                            </div>
                            <div class="text-base font-semibold text-gray-900">
                                <p>{{ $affiliate->location }}</p>
                            </div>
                        </div>
                        @if ($affiliate->user->bankAccount)
                            <div class="flex items-center justify-between py-3 sm:py-4">
                                <div class="text-base font-semibold text-gray-900">
                                    <p>Bank Account Number</p>
                                </div>
                                <div class="text-base font-semibold text-gray-900">
                                    <p>{{ $affiliate->user->bankAccount->account_number }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3 sm:py-4">
                                <div class="text-base font-semibold text-gray-900">
                                    <p>Bank Name</p>
                                </div>
                                <div class="text-base font-semibold text-gray-900">
                                    <p>{{ $affiliate->user->bankAccount->bank_name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3 sm:py-4">
                                <div class="text-base font-semibold text-gray-900">
                                    <p>IFSC Code</p>
                                </div>
                                <div class="text-base font-semibold text-gray-900">
                                    <p>{{ $affiliate->user->bankAccount->ifsc_code }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3 sm:py-4">
                                <div class="text-base font-semibold text-gray-900">
                                    <p>Passbook Copy</p>
                                </div>
                                <div class="text-base font-semibold text-gray-900">
                                    <x-link class="mt-2" href="{{ asset('storage/' . $affiliate->user->bankAccount->passbook_path) }}" target="_blank">
                                        {{ __('View Passbook Copy') }}
                                    </x-link>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
