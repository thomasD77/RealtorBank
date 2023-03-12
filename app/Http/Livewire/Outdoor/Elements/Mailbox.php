<?php

namespace App\Http\Livewire\Outdoor\Elements;

use App\Http\Livewire\MainDropdownComponent;
use App\Models\Data;
use App\Models\SpecificArea;
use Livewire\Component;

class Mailbox extends MainDropdownComponent
{
    //--> Custom
    public string $element = "mailbox";
    public string $title = "Brievenbus";

    public function mount($dynamicArea)
    {
        //--> Custom
        $this->parameters = SpecificArea::getMailbox();
    }
}
