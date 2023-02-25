<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use App\Models\Inspection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Document $document;

    public $title;
    public $reference;
    public $date;

    public $media = [];
    public $files;

    public $folder = 'documents';
    public $relation_id = 'inspection_id';

    public function mount(Inspection $inspection, Document $document)
    {
        $this->inspection = $inspection;
        $this->document = $document;

        $this->title = $document->title;
        $this->reference = $document->reference;
        $this->date = $document->date;

        $files = Document::query()
            ->where('title', $this->document->title)
            ->where('inspection_id', $this->inspection->id)
            ->get();
        $this->files = $files;
    }

    public function documentSubmit()
    {
        $this->document->title = $this->title;
        $this->document->reference = $this->reference;
        $this->document->date = $this->date;
        $this->document->update();
        session()->flash('success', 'success!');
    }

    public function render()
    {
        return view('livewire.documents.edit');
    }
}
