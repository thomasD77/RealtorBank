<?php

namespace App\Http\Livewire\documents;

use App\Models\Document;
use App\Models\Inspection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public Inspection $inspection;

    use WithPagination;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }

    public function render()
    {
        $documents = Document::query()
            ->where('inspection_id', $this->inspection->id)
            ->latest()
            ->simplePaginate(2);

        return view('livewire.documents.index', [
            'documents' => $documents
        ]);
    }
}
