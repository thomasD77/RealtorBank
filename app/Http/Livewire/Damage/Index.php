<?php

namespace App\Http\Livewire\Damage;

use App\Enums\BigAreaKey;
use App\Models\BasicArea;
use App\Models\ConformArea;
use App\Models\Damage;
use App\Models\General;
use App\Models\Inspection;
use App\Models\OutdoorArea;
use App\Models\SpecificArea;
use App\Models\TechniqueArea;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public Inspection $inspection;
    public $dynamicArea;

    public $paramHelper;

    use WithPagination;

    public function mount(Inspection $inspection, $dynamicArea)
    {
        $this->dynamicArea = $dynamicArea;
        $this->inspection = $inspection;

        switch ($this->dynamicArea->code){
            case (BigAreaKey::BASIC->value):
                $this->paramHelper = 'basic_id';
                break;
            case (BigAreaKey::SPECIFIC->value):
                $this->paramHelper = 'specific_id';
                break;
            case (BigAreaKey::CONFORM->value):
                $this->paramHelper = 'conform_id';
                break;
            case (BigAreaKey::GENERAL->value):
                $this->paramHelper = 'general_id';
                break;
            case (BigAreaKey::OUTDOOR->value):
                $this->paramHelper = 'outdoor_id';
                break;
            case (BigAreaKey::TECHNIQUE->value):
                $this->paramHelper = 'technique_id';
                break;
        }
    }

    public function createDamage()
    {
        $damage = new Damage();
        $damage->title = 'Default';
        $damage->date = now();
        $damage->inspection_id = $this->inspection->id;

        $paramHelper = $this->paramHelper;
        $damage->$paramHelper = $this->dynamicArea->id;

        $damage->save();

        //Render the table
        switch ($this->dynamicArea->code){
            case (BigAreaKey::BASIC->value):
                $this->dynamicArea = BasicArea::find($this->dynamicArea->id);
                break;
            case (BigAreaKey::SPECIFIC->value):
                $this->dynamicArea = SpecificArea::find($this->dynamicArea->id);
                break;
            case (BigAreaKey::CONFORM->value):
                $this->dynamicArea = ConformArea::find($this->dynamicArea->id);
                break;
            case (BigAreaKey::GENERAL->value):
                $this->dynamicArea = General::find($this->dynamicArea->id);
                break;
            case (BigAreaKey::OUTDOOR->value):
                $this->dynamicArea = OutdoorArea::find($this->dynamicArea->id);
                break;
            case (BigAreaKey::TECHNIQUE->value):
                $this->dynamicArea = TechniqueArea::find($this->dynamicArea->id);
                break;
        }
    }

    public function render()
    {
        $damages = Damage::query()
            ->where($this->paramHelper, $this->dynamicArea->id)
            ->latest()
            ->simplePaginate(5);

        return view('livewire.damage.index', [
            'damages' => $damages
        ]);
    }
}
