<?php

namespace App\Http\Livewire\Calculations;

use App\Models\CategoryPricing;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Pricing;
use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    // Pricing gerelateerde properties
    public $pricingCategories;
    public $selectedCategory = null;
    public $pricingRecords = [];

    // Calculations gerelateerde properties
    public Inspection $inspection;
    public Room $room;
    public Floor $floor;

    public function mount(Inspection $inspection, Room $room, Floor $floor)
    {
        // Pricing: Laad de categorieën
        $this->pricingCategories = CategoryPricing::all();
        $this->selectedCategory = $this->pricingCategories->first()->id ?? null;

        // Calculations: Initializeer inspectie, kamer en vloer
        $this->inspection = $inspection;
        $this->room = $room;
        $this->floor = $floor;
    }

    // Methode om de geselecteerde categorie te veranderen
    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;

        // Laad alle pricing records die horen bij de geselecteerde categorie
        $this->pricingRecords = Pricing::where('category_pricing_id', $categoryId)->get();
    }

    public function render()
    {
        return view('livewire.calculations.index', [
            'pricingCategories' => $this->pricingCategories,
        ]);
    }
}
