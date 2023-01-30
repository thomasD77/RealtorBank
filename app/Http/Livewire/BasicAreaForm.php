<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;

class BasicAreaForm extends Component
{
    public Area $area;
    public $selectMember = 'test';

    public function mount($area)
    {
        $this->area = $area;
    }

    public function render()
    {
        $materials = [
            'keramische tegel',
            'tegel',
            'parket',
            'laminaat',
            'beton',
            'OSB',
            'epoxy',
            'plancher',
            'tapijt',
            'linoleum',
            'vinyl',
            'ander',
        ];

        $materials = Area::all();

        return view('livewire.basic-area-form', [
            'materials' => $materials,
            'area' => $this->area
        ]);
    }

    public function submit()
    {
        dd($this->size);
    }
}
