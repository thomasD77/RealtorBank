<?php

namespace App\Http\Livewire\documents;

use App\Models\Document;
use App\Models\Inspection;
use Livewire\Component;

class Index extends Component
{
    public $documents;
    public Inspection $inspection;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
        $this->documents = Document::query()
            ->where('inspection_id', $inspection->id)
            ->get();
    }
}
