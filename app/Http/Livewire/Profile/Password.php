<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Password extends Component
{
    public $currentPass;
    public $newPass;
    public $confirmNewPass;

    protected $rules = [
        'currentPass' => ['required','string', 'max:20'],
        'newPass' => ['required'],
        'confirmNewPass' => ['required'],
    ];

    public function pasSubmit()
    {
        $this->validate();

        $secret = Auth()->user()->password;

        if (Hash::check($this->currentPass, $secret)) {
            if ($this->newPass == $this->confirmNewPass) {
                $user = Auth()->user();
                $newHashPassword = Hash::make($this->newPass);
                $user->password = $newHashPassword;
                $user->update();

                Session::flash('success', 'Succes!');
            } else {
                Session::flash('fail', 'Wachtwoord werd niet correct gedupliceerd. Probeer opnieuw.');
            }
        }else {
            Session::flash('fail', 'Wachtwoord werd niet correct ingegeven. Probeer opnieuw.');
        }
    }

    public function render()
    {
        return view('livewire.profile.password');
    }
}
