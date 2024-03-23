<?php

namespace App\Livewire;

use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateBankInformationForm extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:225')]
    public $account_number;

    #[Validate('required|string|max:225')]
    public $bank_name;

    #[Validate('required|string|max:225')]
    public $branch_name;

    #[Validate('required|string|max:225')]
    public $ifsc_code;

    #[Validate('required|mimes:pdf,jpg,png,jpeg|max:1024')]
    public $passbook;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $user = Auth::user();

        $this->account_number = $user->bankAccount->account_number;
        $this->bank_name = $user->bankAccount->bank_name;
        $this->branch_name = $user->bankAccount->branch_name;
        $this->ifsc_code = $user->bankAccount->ifsc_code;
        $this->passbook = $user->bankAccount->passbook_path;
    }

    /**
     * Update the user's bank information.
     *
     * @return void
     */
    public function updateBankInformation()
    {
        $this->resetErrorBag();

        BankAccount::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'account_holder' => Auth::user()->name,
                'account_number' => $this->account_number,
                'bank_name' => $this->bank_name,
                'branch_name' => $this->branch_name,
                'ifsc_code' => $this->ifsc_code,
                'passbook_path' => $this->passbook->store('passbooks', 'public'),
                'status' => 1,
            ]
        );

        return redirect()->route('profile.show');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('profile.update-bank-information-form');
    }
}
