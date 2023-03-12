<?php

namespace App\Http\Livewire\Keys;

use App\Models\Inspection;
use App\Models\Key;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    public Inspection $inspection;
    public $keys;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->keys = Key::query()
            ->with('media')
            ->where('inspection_id', $this->inspection->id)
            ->get();
    }

    public function render()
    {
        return view('livewire.keys.index');
    }
}
