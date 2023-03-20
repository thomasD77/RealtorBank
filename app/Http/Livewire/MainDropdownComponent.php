<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MainDropdownComponent extends Component
{
    public string $status = "";
    public $dynamicArea;
    public $parameters;
    public $dynamic;

    //--> Custom
    public string $element;
    public string $title;

    public function mount($dynamicArea)
    {
        $this->dynamicArea = $dynamicArea;
//        $el = $this->element;
//
//        if(in_array($this->dynamicArea->$el, $this->parameters)){
//            $this->dynamic = null;
//        }else {
//            $this->dynamic = $this->dynamicArea->$el;
//        }
    }

    public function select($title)
    {
        $object = $this->dynamicArea;
        $el = $this->element;

        //This is a toggle - we need to set to null if we want to deselect
        if($object->$el == $title){
            $object->$el = null;
        }else {
            $object->$el = $title;
        }

        $object->update();

        //Render
        $this->status = 'active';
        $this->dynamic = null;
    }

    public function submitDynamic()
    {
        $object = $this->dynamicArea;
        $el = $this->element;
        $object->$el = $this->dynamic;
        $object->update();

        //Render
        $this->dynamicArea = $object;
    }

    public function render()
    {
        return view('livewire.elements.dropdown' , [
            'parameters' => $this->parameters,
        ]);
    }
}
