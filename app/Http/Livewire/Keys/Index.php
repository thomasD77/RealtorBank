<?php

namespace App\Http\Livewire\Keys;

use App\Models\Inspection;
use App\Models\Key;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public $keys;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->keys = Key::where('inspection_id', $this->inspection->id)->get();
    }

    public function render()
    {

        return view('livewire.keys.index');
    }
}
