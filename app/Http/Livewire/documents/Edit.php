<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use App\Models\Inspection;
use App\Models\MediaBasic;
use App\Models\MediaDocument;
use App\Models\MediaStore;
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
    public $relation_id = 'document_id';

    public $mediaName = 'MediaDocument';

    use WithFileUploads;

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Inspection $inspection, Document $document)
    {
        $this->inspection = $inspection;
        $this->document = $document;

        $this->title = $document->title;
        $this->reference = $document->reference;
        $this->date = $document->date;

        $this->files = MediaDocument::where($this->relation_id, $this->document->id)->get();
    }

    public function documentSubmit()
    {
        $this->document->title = $this->title;
        $this->document->reference = $this->reference;
        $this->document->date = $this->date;
        $this->document->update();
        session()->flash('success', 'success!');
    }

    public function saveMedia()
    {
        //Validate
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaDocument();

        //Save and store
        if( $this->media != [] && $this->media != ""){
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName,$mediaStore, $this->document, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaDocument::where($this->relation_id, $this->document->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaDocument::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaDocument::where($this->relation_id, $this->document->id)->get();
    }

    public function render()
    {
        return view('livewire.documents.edit');
    }
}
