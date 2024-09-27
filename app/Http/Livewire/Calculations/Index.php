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
    public $calculation;

    public $selectedCategory = null;
    public $selectedSubCategory;
    public $description;
    public $cost_square_meter;
    public $cost_hour;
    public $cost_piece;

    public $selectedCategoryName;
    public $selectedSubCategoryName;
    public $subCalculationIdBeingDeleted;

    public $showForm = null;

    public $count;
    public $tax = 21; // Standaard BTW-percentage
    public $total;
    public $approved = 1;

    public Inspection $inspection;
    public Room $room;
    public Floor $floor;

    public $groupedSubCalculations;
    public $overallTotalSum;
    public $vetustatePercentage;


    // Houdt de te bewerken Pricing ID bij
    public $editingPricingId = null;

    public function mount(Inspection $inspection, Room $room, Floor $floor)
    {
        $this->inspection = $inspection;
        $this->floor = $floor;
        $this->room = $room;

        $this->calculation = Calculation::with('subCalculations.subCategory')
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', $this->floor->id)
            ->where('room_id', $this->room->id)
            ->first();

        $this->loadData();
    }

    public function loadData()
    {
        $this->pricingCategories = CategoryPricing::with('pricings.subCategoryPricing')->get();
        $this->subCategories = SubCategoryPricing::all();
        $this->calculation = Calculation::with('subCalculations.subCategory')
            ->where('inspection_id', $this->inspection->id)
            ->where('floor_id', $this->floor->id)
            ->where('room_id', $this->room->id)
            ->first();
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
        $calculation->floor_id = $this->floor->id;
        $calculation->room_id = $this->room->id;
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
            'approved' => 'nullable|integer',
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
        $subCalculation->approved = $this->approved;
        $subCalculation->save();

        // Reset de form velden en maak het formulier onzichtbaar
        $this->resetInputFields();

        // Update groupedSubCalculations
        $this->loadSubCalculations();

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
        $this->count = null;
        $this->tax = 21;
        $this->total = null;
        $this->approved = null;
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

        if ($this->cost_square_meter !== null) {
            $cost = $this->cost_square_meter;
        } elseif ($this->cost_hour !== null) {
            $cost = $this->cost_hour;
        } elseif ($this->cost_piece !== null) {
            $cost = $this->cost_piece;
        }

        $subtotal = $cost * $this->count;
        $this->total = round($subtotal + ($subtotal * ($this->tax / 100)), 2);
    }

    public function editSubCalculation($id)
    {
        $subCalculation = SubCalculation::findOrFail($id);

        // Vul de form properties met de gegevens van de geselecteerde SubCalculation
        $this->editingPricingId = $subCalculation->id;
        $this->selectedCategory = $subCalculation->category_pricing_id;
        $this->selectedSubCategory = $subCalculation->sub_category_pricing_id;
        $this->description = $subCalculation->description;
        $this->cost_square_meter = $subCalculation->cost_square_meter;
        $this->cost_hour = $subCalculation->cost_hour;
        $this->cost_piece = $subCalculation->cost_piece;
        $this->count = $subCalculation->count;
        $this->tax = $subCalculation->tax;
        $this->total = $subCalculation->total;
        $this->approved = $subCalculation->approved;

        // Zorg ervoor dat het formulier zichtbaar is
        $this->showForm = true;
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

        $this->subCalculationIdBeingDeleted = null;
        session()->flash('message', 'SubCalculation succesvol verwijderd.');
    }

    public function loadSubCalculations()
    {
        if ($this->calculation) {
            $this->groupedSubCalculations = $this->calculation->subCalculations()
                ->with('subCategory.categoryPricing')
                ->get()
                ->groupBy('subCategory.categoryPricing.title')
                ->map(function ($subCalculations, $categoryTitle) {
                    $totalSum = $subCalculations->sum('total');
                    $categoryId = $subCalculations->first()->subCategory->categoryPricing->id; // Assuming categoryPricing has an ID

                    return [
                        'id' => $categoryId, // Include the ID here
                        'category' => $categoryTitle,
                        'totalSum' => $totalSum,
                        'subCalculations' => $subCalculations->map(function ($subCalculation) {
                            return [
                                'id' => $subCalculation->id,
                                'subCategory' => $subCalculation->subCategory->title ?? 'Onbekende SubCategorie',
                                'description' => $subCalculation->description,
                                'tax' => $subCalculation->tax,
                                'total' => $subCalculation->total,
                                'approved' => $subCalculation->approved,
                            ];
                        })->toArray(),
                    ];
                })->toArray();

            // Calculate the overall total sum for all categories
            $this->overallTotalSum = array_reduce($this->groupedSubCalculations, function ($carry, $categoryData) {
                return $carry + $categoryData['totalSum'];
            }, 0);
        }
    }

    public function editVetustate($category)
    {
        //$this->selectedCategory = $category;

        // You should load the existing percentage value here if needed
        $this->vetustatePercentage = 0; // Or load the current percentage from your data

        // Trigger the event to open the modal
        $this->dispatchBrowserEvent('show-edit-vetustate');
    }

    public function updateVetustate()
    {
        // Validate the input
        $this->validate([
            'vetustatePercentage' => 'required|numeric|min:0|max:100',
        ]);

        // Update logic for vetustatePercentage for the selected category
        // For example:
        // $this->groupedSubCalculations[$this->selectedCategory]['vetustate'] = $this->vetustatePercentage;

        // Hide the modal
        $this->dispatchBrowserEvent('hide-edit-vetustate');

        // Optionally, you can also trigger a refresh or save the updated data to the database
    }


    public function render()
    {
        $this->loadSubCalculations();
        return view('livewire.calculations.index');
    }
}

