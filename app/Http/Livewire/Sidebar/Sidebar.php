<?php

namespace App\Http\Livewire\Sidebar;

use App\Enums\CategoryKey;
use App\Models\Category;
use App\Models\Inspection;
use App\Models\SidebarToggle;
use Livewire\Component;

class Sidebar extends Component
{
    public Inspection $inspection;
    public string $ariaExpanded = 'false';
    public string $show = '';

    public $activeCat;

    public $situation;
    public $interior;
    public $exterior;
    public $techniques;

    public function mount(Inspection $inspection)
    {
        $this->inspection = $inspection;

        if(Auth()->user()->category){
            $this->activeCat = Auth()->user()->category->id;
        }
        $this->situation = Category::where('title', CategoryKey::Situation)->pluck('id')->first();
        $this->interior = Category::where('title', CategoryKey::Interior)->pluck('id')->first();
        $this->exterior = Category::where('title', CategoryKey::Exterior)->pluck('id')->first();
        $this->techniques = Category::where('title', CategoryKey::Techniques)->pluck('id')->first();
    }

    public function toggleCategory($value)
    {
        SidebarToggle::sidebarCategory($value);
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
        return view('livewire.sidebar.sidebar');
    }
}
