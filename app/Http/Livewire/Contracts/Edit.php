<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Inspection;
use App\Models\Situation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MediaSituation;
use App\Models\MediaInspection;

class Edit extends Component
{
    use WithFileUploads;

    public Contract $contract;
    public Situation $situation;
    public Inspection $inspection;

    public $folder = 'situations';

    public $date;
    public $lock;

    public $files;
    public $medias;

    public function mount(Inspection $inspection, Contract $contract)
    {
        $this->inspection = $inspection;
        $this->situation = Situation::find($contract->situation_id);
        $this->contract = $contract;

        $this->date = $this->contract->date;
        $this->lock = $this->contract->lock;

        $files = MediaInspection::where('inspection_id', $this->inspection->id)->get();
        $this->files = $files;

        $medias = MediaSituation::where('situation_id', $this->situation->id)->get();
        $this->medias = $medias;
    }

    public function changeDate()
    {
        if($this->date){
            $contract =  $this->contract;
            $contract->date = $this->date;
            $contract->update();
        }
    }

    public function render()
    {
        $this->lock = $this->contract->lock;
        return view('livewire.contracts.edit');
    }
}
