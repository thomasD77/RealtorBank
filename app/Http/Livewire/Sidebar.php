<?php

namespace App\Http\Livewire;

use App\Models\Inspection;
use Livewire\Component;

class Sidebar extends Component
{
    public Inspection $inspection;
    public string $ariaExpanded = 'false';
    public string $show = '';

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }

    public function toggleCollapse()
    {
        //
        if($this->ariaExpanded != false){
            $this->ariaExpanded = 'false';
            $this->show = '';
        }else {
            $this->ariaExpanded = 'true';
            $this->show = 'show';
        }
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
