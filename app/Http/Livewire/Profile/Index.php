<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Index extends Component
{
    public ? string $firstName;
    public ? string $lastName;
    public ? string $email;
    public ? string $phone;
    public ? string $companyName;
    public $about;

    protected $rules = [
        'email' => 'required|email',
        'firstName' => 'max:30',
        'lastName' => 'max:30',
        'phone' => 'max:30',
        'companyName' => 'max:30',
        'about' => 'max:1500',
    ];

    public function mount(){
        $user = Auth()->user();
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->phone = $user->phone ? $user->phone : '';
        $this->email = $user->email;
        $this->companyName = $user->companyName ? $user->companyName : '';
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
        $user->companyName = $this->companyName;
        $user->about = $this->about;
        $user->update();
        session()->flash('successGeneral', 'success!');
    }
    public function render()
    {
        return view('livewire.profile.index');
    }
}
