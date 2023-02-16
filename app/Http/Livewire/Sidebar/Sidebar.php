<?php

namespace App\Http\Livewire\Sidebar;

use App\Enums\CategoryKey;
use App\Enums\RoomKey;
use App\Models\Category;
use App\Models\Inspection;
use App\Models\Room;
use App\Models\SidebarToggle;
use Livewire\Component;

class Sidebar extends Component
{
    public Inspection $inspection;
    public $responsive;

    public $activeCat;
    public $activeRoom;
    public $activeTemplate;

    public $situation;
    public $interior;
    public $exterior;
    public $techniques;

    public $basic = 'basic';
    public $specific = 'specific';
    public $conform = 'conform';

    public function mount(Inspection $inspection, $responsive)
    {
        if($responsive == true){
            $this->responsive = 'responsive';
        }
        $this->inspection = $inspection;
        $this->activeTemplate = Auth()->user()->template;

        if(Auth()->user()->category){
            $this->activeCat = Auth()->user()->category->id;
        }
        if(Auth()->user()->room){
            $this->activeRoom = Auth()->user()->room->id;
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

    public function toggleRoom($value)
    {
        SidebarToggle::sidebarRoom($value);
    }

    public function toggleTemplate($value)
    {
      SidebarToggle::sidebarTemplate($value);
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
