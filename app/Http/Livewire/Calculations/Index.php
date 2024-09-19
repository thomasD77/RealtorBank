<?php

namespace App\Http\Livewire\Calculations;

use App\Models\Calculation;
use App\Models\CategoryPricing;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Pricing;
use App\Models\Room;
use App\Models\SubCategoryPricing;
use App\Models\SubCalculation;
use Livewire\Component;

class Index extends Component
{
    public $categorySuccessMessages = [];

    public $pricingCategories;
    public $subCategories = [];

    public $selectedCategory;
    public $selectedSubCategory;
    public $description;
    public $cost_square_meter;
    public $cost_hour;
    public $cost_piece;

    // Houdt de te bewerken Pricing ID bij
    public $editingPricingId = null;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->pricingCategories = CategoryPricing::with('pricings.subCategoryPricing')->get();
        $this->subCategories = SubCategoryPricing::all();

        if (!$this->selectedCategory) {
            $this->selectedCategory = $this->pricingCategories->first()->id ?? null;
        }
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function loadSubCategories($categoryId)
    {
        $this->subCategories = SubCategoryPricing::where('category_pricing_id', $categoryId)->get();
    }

    public function edit($pricingId)
    {
        $pricing = Pricing::findOrFail($pricingId);

        $this->editingPricingId = $pricingId;
        $this->selectedCategory = $pricing->category_pricing_id;
        $this->selectedSubCategory = $pricing->sub_category_pricing_id;
        $this->description = $pricing->description;
        $this->cost_square_meter = $pricing->cost_square_meter;
        $this->cost_hour = $pricing->cost_hour;
        $this->cost_piece = $pricing->cost_piece;
    }

    public function save()
    {
        // Validatie van de invoer
        $this->validate([
            'selectedCategory' => 'required',
            'selectedSubCategory' => 'required',
            'description' => 'required|string|max:255',
            'cost_square_meter' => 'nullable|numeric',
            'cost_hour' => 'nullable|numeric',
            'cost_piece' => 'nullable|numeric',
        ]);

        // Maak een nieuwe SubCalculation aan
        SubCalculation::create([
            'calculation_id' => $this->calculation->id,
            'category_pricing_id' => $this->selectedCategory,
            'sub_category_pricing_id' => $this->selectedSubCategory,
            'description' => $this->description,
            'cost_square_meter' => $this->cost_square_meter,
            'cost_hour' => $this->cost_hour,
            'cost_piece' => $this->cost_piece,
        ]);

        // Reset de form velden
        $this->resetInputFields();

        // Optioneel: Succesbericht toevoegen
        session()->flash('message', 'SubCalculation succesvol toegevoegd.');
    }

    private function resetInputFields()
    {
        $this->editingPricingId = null;
        $this->selectedCategory = null;
        $this->selectedSubCategory = null;
        $this->description = null;
        $this->cost_square_meter = null;
        $this->cost_hour = null;
        $this->cost_piece = null;
    }

    public function render()
    {
        return view('livewire.calculations.index');
    }
}

