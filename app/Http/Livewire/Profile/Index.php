<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Index extends Component
{
    public ? string $firstName;
    public ? string $lastName;
    public ? string $email;
    public ? string $phone;
    public $about;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function mount(){
        $user = Auth()->user();
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->about = $user->about;
    }

    public function userSubmit()
    {
        $this->validate();

        $user = Auth()->user();
        $user->firstName = $this->firstName;
        $user->lastName = $this->lastName;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->about = $this->about;
        $user->update();
        session()->flash('success', 'success!');
    }
    public function render()
    {
        return view('livewire.profile.index');
    }
}
