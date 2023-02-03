<?php

namespace App\Http\Livewire\Conform\Elements;

use App\Models\ConformArea;
use Livewire\Component;

class Media extends Component
{
    public ConformArea $conformArea;
    public $status = "";

    public function mount(ConformArea $conformArea)
    {
        $this->conformArea = $conformArea;
    }

    public function render()
    {
        return view('livewire.elements.media');
    }
}
