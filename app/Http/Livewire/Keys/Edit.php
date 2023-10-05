<?php

namespace App\Http\Livewire\Keys;

use App\Models\Inspection;
use App\Models\Key;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Key $key;
    public $title;

    public function mount(Inspection $inspection, Key $selectedKey)
    {
        $this->inspection = $inspection;
        $this->key = $selectedKey;
        $this->title = $selectedKey->title;
    }

    public function editTitle()
    {
        $key = $this->key;
        $key->title = $this->title;
        $key->update();
    }

    public function render()
    {
        return view('livewire.keys.edit');
    }
}
