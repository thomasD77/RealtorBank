<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Inspection;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.contracts.index');
    }
}
