<?php

namespace App\Http\Livewire\Calculations;

use App\Models\Calculation;
use App\Models\Category;
use App\Models\CategoryPricing;
use App\Models\Damage;
use App\Models\Inspection;
use App\Models\Pricing;
use App\Models\SubCategoryPricing;
use App\Models\SubCalculation;
use Livewire\Component;

class Index extends Component
{
    // Load models
    public Inspection $inspection;
    public Damage $damage;

    // Category / SubCategory / Pricing variables
    public $pricingCategories;
    public $subCategories = [];
    public $selectedCategory = null;
    public $selectedSubCategory;
    public $selectedCategoryName;
    public $selectedSubCategoryName;
    public $subCalculationIdBeingDeleted;
    public $editingPricingId = null;

    // Calculation variables
    public $calculation;
    public $vetustateAmount;
    public $finalTotal;
    public $bruttoTotal;
    public $vetustatePercentage;

    // SubCalculation variables
    public $description;
    public $cost_square_meter;
    public $cost_hour;
    public $cost_piece;
    public $count;
    public $tax = 21; // Standaard BTW-percentage
    public $total;

    public $groupedSubCalculations;

    public $showForm = null;

    public function mount(Inspection $inspection, Damage $damage)
    {
        $this->inspection = $inspection;
        $this->damage = $damage;

        $this->calculation = Calculation::with('subCalculations.subCategory')
            ->where('inspection_id', $this->inspection->id)
            ->where('damage_id', $this->damage->id)
            ->first();

        $this->loadData();
    }

    public function loadData()
    {
        $this->pricingCategories = CategoryPricing::with('pricings.subCategoryPricing')->get();
        $this->subCategories = SubCategoryPricing::all();
        $this->calculation = Calculation::with('subCalculations.subCategory')
            ->where('inspection_id', $this->inspection->id)
            ->where('damage_id', $this->damage->id)
            ->first();

        if($this->calculation){
            $this->bruttoTotal = $this->calculation->brutto_total;
            $this->vetustatePercentage = $this->calculation->vetustate ?? 0;
            $this->vetustateAmount = $this->calculation->vetustate_amount;
            $this->finalTotal = $this->calculation->final_total;
        }
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;

        if (is_null($categoryId)) {
            $this->resetInputFields();
        } else {
            // Laad de subcategorieën als er een categorie is geselecteerd
            $this->loadSubCategories($categoryId);
        }
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

        // Haal de namen op
        $this->selectedCategoryName = CategoryPricing::find($this->selectedCategory)->title ?? 'Onbekende Categorie';
        $this->selectedSubCategoryName = SubCategoryPricing::find($this->selectedSubCategory)->title ?? 'Onbekende SubCategorie';

        $this->showForm = 1;
    }

    public function addCalculation()
    {
        $calculation = new Calculation();
        $calculation->inspection_id = $this->inspection->id;
        $calculation->damage_id = $this->damage->id;
        $calculation->save();
        $this->calculation = $calculation;
    }

    public function saveSubCalculation()
    {
        // Validatie van de invoer
        $this->validate([
            'selectedCategory' => 'required',
            'selectedSubCategory' => 'required',
            'description' => 'required|string|max:255',
            'cost_square_meter' => 'nullable|numeric',
            'cost_hour' => 'nullable|numeric',
            'cost_piece' => 'nullable|numeric',
            'count' => 'required|numeric',
            'tax' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Maak een nieuwe SubCalculation aan
        $subCalculation = new SubCalculation();
        $subCalculation->calculation_id = $this->calculation->id;
        $subCalculation->category_pricing_id = $this->selectedCategory;
        $subCalculation->sub_category_pricing_id = $this->selectedSubCategory;
        $subCalculation->description = $this->description;
        $subCalculation->cost_square_meter = $this->cost_square_meter;
        $subCalculation->cost_hour = $this->cost_hour;
        $subCalculation->cost_piece = $this->cost_piece;
        $subCalculation->count = $this->count;
        $subCalculation->tax = $this->tax;
        $subCalculation->total = $this->total;
        $subCalculation->save();

        // Reset de form velden en maak het formulier onzichtbaar
        $this->resetInputFields();

        // Update groupedSubCalculations
        $this->loadSubCalculations();

        // Update Calculations
        $this->calculateBruttoTotal();
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
        $this->count = null;
        $this->tax = 21;
        $this->total = null;
        $this->showForm = null;
    }

    public function updated($propertyName)
    {
        // Herbereken het totaal bij elke update van de relevante velden
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $cost = 0;

        if ($this->cost_square_meter != "") {
            $cost = $this->cost_square_meter;
        } elseif ($this->cost_hour != "") {
            $cost = $this->cost_hour;
        } elseif ($this->cost_piece != "") {
            $cost = $this->cost_piece;
        }

        $subtotal = $cost * $this->count;
        $this->total = round($subtotal + ($subtotal * ($this->tax / 100)), 2);
    }

    public function confirmDelete($id)
    {
        $this->subCalculationIdBeingDeleted = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSubCalculation()
    {
        $subCalculation = SubCalculation::findOrFail($this->subCalculationIdBeingDeleted);
        $subCalculation->delete();

        $this->calculation->refresh(); // Ververs de calculation met de nieuwe data

        $this->dispatchBrowserEvent('hide-delete-confirmation');

        // Update Calculations
        $this->calculateBruttoTotal();

        $this->updateVetustate();

        $this->subCalculationIdBeingDeleted = null;
        session()->flash('message', 'SubCalculation succesvol verwijderd.');
    }

    public function loadSubCalculations()
    {
        if ($this->calculation) {
            // Haal alle subcalculaties op zonder groepering
            $this->groupedSubCalculations = $this->calculation->subCalculations()
                ->with('subCategory.categoryPricing')
                ->get()
                ->map(function ($subCalculation) {
                    return [
                        'id' => $subCalculation->id,
                        'category' => $subCalculation->subCategory->categoryPricing->title ?? 'Onbekende Categorie',
                        'subCategory' => $subCalculation->subCategory->title ?? 'Onbekende SubCategorie',
                        'description' => $subCalculation->description,
                        'tax' => $subCalculation->tax,
                        'total' => $subCalculation->total,
                    ];
                })->toArray();

        }
    }

    public function calculateBruttoTotal()
    {
        $subCalculationsTotal = SubCalculation::query()
            ->where('calculation_id', $this->calculation->id)
            ->sum('total');

        $this->calculation->brutto_total = $subCalculationsTotal;
        $this->calculation->save();
        $this->bruttoTotal = $this->calculation->brutto_total;

        $this->updateVetustate();
    }

    public function editVetustate()
    {
        // You should load the existing percentage value here if needed
        $this->vetustatePercentage = 0; // Or load the current percentage from your data

        // Trigger the event to open the modal
        $this->dispatchBrowserEvent('show-edit-vetustate');
    }

    public function updateVetustate()
    {
        // Valideer het vetustate-percentage
        $this->validate([
            'vetustatePercentage' => 'required|numeric|min:0|max:100',
        ]);

        // Pas de vetustate toe op alle subcalculaties die bij deze calculation horen
        $this->calculation->vetustate = $this->vetustatePercentage;
        $this->calculation->save();

        // Werk de berekeningen bij na het toepassen van de vetustate
        $this->calculateVetustate();

        // Sluit het modal
        $this->dispatchBrowserEvent('hide-edit-vetustate');
    }

    public function calculateVetustate()
    {
        // Bereken de totale vetustate-waarde voor alle subcalculaties
        $this->vetustateAmount = $this->bruttoTotal * ($this->vetustatePercentage / 100);
        $this->calculation->vetustate_amount = $this->vetustateAmount;
        $this->calculation->save();

        // Bereken het eindtotaal na aftrek van vetustate
        $this->finalTotal = $this->bruttoTotal - $this->vetustateAmount;
        $this->calculation->final_total = $this->finalTotal;
        $this->calculation->save();
    }

    public function render()
    {
        $this->loadSubCalculations();
        return view('livewire.calculations.index');
    }
}

