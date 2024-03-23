<x-form-section submit="updateBankInformation">
    <x-slot name="title">
        {{ __('Bank Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s bank information.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="account_number" value="{{ __('Account Number') }}" />
            <x-input class="mt-1 block w-full" id="account_number" type="text" wire:model="account_number" required />
            <x-input-error class="mt-2" for="account_number" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="bank_name" value="{{ __('Bank Name') }}" />
            <x-input class="mt-1 block w-full" id="bank_name" type="text" wire:model="bank_name" required />
            <x-input-error class="mt-2" for="bank_name" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="branch_name" value="{{ __('Branch Name') }}" />
            <x-input class="mt-1 block w-full" id="branch_name" type="text" wire:model="branch_name" required />
            <x-input-error class="mt-2" for="branch_name" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="ifsc_code" value="{{ __('IFSC Code') }}" />
            <x-input class="mt-1 block w-full" id="ifsc_code" type="text" wire:model="ifsc_code" required />
            <x-input-error class="mt-2" for="ifsc_code" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <input class="hidden" id="passbook" type="file" wire:model.live="passbook" x-ref="passbook" />
            <x-label for="passbook" value="{{ __('Passbook Copy') }}" />
            <x-secondary-button class="me-2 mt-2" type="button" x-on:click.prevent="$refs.passbook.click()">
                {{ __('Select Passbook Copy') }}
            </x-secondary-button>
            @if ($this->passbook)
                <x-link class="mt-2" href="{{ asset('storage/' . $this->passbook) }}" target="_blank">
                    {{ __('View Passbook Copy') }}
                </x-link>
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="passbook">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
