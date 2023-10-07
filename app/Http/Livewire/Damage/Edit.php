<?php

namespace App\Http\Livewire\Damage;

use App\Http\Livewire\Specific\SpecificAreaForm;
use App\Models\BasicArea;
use App\Models\ConformArea;
use App\Models\Damage;
use App\Models\General;
use App\Models\Inspection;
use App\Models\MediaDamages;
use App\Models\MediaStore;
use App\Models\OutdoorArea;
use App\Models\SpecificArea;
use App\Models\TechniqueArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Inspection $inspection;
    public Damage $damage;
    public $dynamicArea;

    public $title;
    public $date;
    public $description;

    public $urlParam;
    public $urlParamHelper;

    public $media = [];
    public $files;

    public $folder = 'damages';
    public $relation_id = 'damage_id';
    public $mediaName = 'MediaDamages';

    protected $messages = [
        'media.*' => 'Oeps, limit om aantal bestanden up te loaden is overschreden. Probeer het opnieuw.',
    ];

    public function mount(Inspection $inspection, Damage $damage)
    {
        $this->damage = $damage;
        $this->inspection = $inspection;

        $this->title = $this->damage->title;
        $this->date = $this->damage->date;
        $this->description = $this->damage->description;

        if($this->damage->basic_id) {
            $this->dynamicArea = BasicArea::find($this->damage->basic_id);
            $this->urlParam = 'detail';
            $this->urlParamHelper = 'area';
        }
        elseif ($this->damage->specific_id) {
            $this->dynamicArea = SpecificArea::find($this->damage->specific_id);
            $this->urlParam = 'specific';
            $this->urlParamHelper = 'specific';
        }
        elseif ($this->damage->conform_id) {
            $this->dynamicArea = ConformArea::find($this->damage->conform_id);
            $this->urlParam = 'conform';
            $this->urlParamHelper = 'conform';
        }
        elseif ($this->damage->technique_id) {
            $this->dynamicArea = TechniqueArea::find($this->damage->technique_id);
            $this->urlParam = 'technique';
            $this->urlParamHelper = 'technique';
        }
        elseif ($this->damage->outdoor_id) {
            $this->dynamicArea = OutdoorArea::find($this->damage->outdoor_id);
            $this->urlParam = 'outdoor';
            $this->urlParamHelper = 'outdoor';
        }
        elseif ($this->damage->general_id) {
            $this->dynamicArea = General::find($this->damage->general_id);
            $this->urlParam = 'general';
            $this->urlParamHelper = 'general';
        }

        $files = MediaDamages::where('damage_id', $this->damage->id)->get();
        $this->files = $files;
    }

    public function damageSubmit()
    {
        $this->damage->title = $this->title;
        $this->damage->description = $this->description;
        if($this->date){
            $this->damage->date = $this->date;
        }
        $this->damage->update();
        session()->flash('success', 'success!');
    }

    public function deleteDamage()
    {
        $damage = $this->damage;
        $damage->delete();

        session()->flash('successDeleteDamage', 'Schade werd verwijderd!');

        $paramHelper = $this->urlParamHelper;

        //Exception on the route :(
        if($this->dynamicArea->technique_id){
            return redirect()->route('area.' . $this->urlParam, [$this->inspection, $this->dynamicArea->$paramHelper]);
        }

        return redirect()->route('area.' . $this->urlParam, [$this->inspection, $this->dynamicArea->room, $this->dynamicArea->$paramHelper]);
    }

    public function saveMedia()
    {
        $this->resetValidation();
        $this->validate([
            'media.*' => 'max:5000',
        ]);

        //Set up model
        $mediaStore = new MediaDamages();

        //Save and store
        if( $this->media != [] && $this->media != "") {
            (new \App\Models\MediaStore)->createAndStoreMedia($this->mediaName, $mediaStore, $this->damage, $this->media, $this->folder, $this->relation_id);
        }

        //Render
        $this->files = MediaDamages::where('damage_id', $this->damage->id)->get();
        $this->media = "";
    }

    public function deleteMedia($file)
    {
        //Do the work
        $mediaStore = MediaDamages::find($file);
        MediaStore::deleteMedia($mediaStore, $this->folder);

        //Render
        $this->files = MediaDamages::where('damage_id', $this->damage->id)->get();
    }

    public function render()
    {
        return view('livewire.damage.edit');
    }
}
