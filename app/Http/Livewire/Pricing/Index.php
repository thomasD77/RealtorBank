<?php

namespace App\Http\Livewire\Pricing;

use App\Models\CategoryPricing;
use App\Models\Pricing;
use App\Models\SubCategoryPricing;
use Livewire\Component;

class Index extends Component
{
    public $categorySuccessMessages = [];

    public $pricingCategories;
    public $subCategories = []; // Voor subcategorieën die alleen horen bij de geselecteerde category
    public $selectedPricing = null;
    public $modalOpen = false;

    // Pricing attributen
    public $selectedCategoryId; // De geselecteerde category ID
    public $selectedSubcategoryId; // Geselecteerde subcategory ID
    public $selectedSubcategoryTitle; // Geselecteerde subcategory title (voor wijziging)
    public $description;
    public $cost_square_meter;
    public $cost_hour;
    public $cost_piece;

    public $activeTab = 'select'; // Active tab, default to 'select'
    public $selectedCategory; // Geselecteerde categorie ID

    public function mount()
    {
        // Laad de pricing categories
        $this->loadData();
    }

    public function loadData()
    {
        // Laad de pricing categories en subcategories
        $this->pricingCategories = CategoryPricing::with('pricings.subCategoryPricing')->get();
        $this->subCategories = SubCategoryPricing::all();

        // Standaard de eerste categorie selecteren als er geen geselecteerde categorie is
        if (!$this->selectedCategory) {
            $this->selectedCategory = $this->pricingCategories->first()->id ?? null;
        }
    }

    // Methode om de geselecteerde categorie te veranderen
    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function loadSubCategories($categoryId)
    {
        // Laad de subcategories voor de geselecteerde category
        $this->subCategories = SubCategoryPricing::where('category_pricing_id', $categoryId)->get();
    }

    public function edit($pricingId)
    {
        $this->selectedPricing = Pricing::with('subCategoryPricing')->find($pricingId);

        // Haal de bijbehorende category ID op uit de geselecteerde pricing
        $this->selectedCategoryId = $this->selectedPricing->category_pricing_id;

        // Laad de subcategories voor de geselecteerde category
        $this->loadSubCategories($this->selectedCategoryId);

        // Subcategory info instellen
        $this->selectedSubcategoryId = $this->selectedPricing->sub_category_pricing_id;
        $this->selectedSubcategoryTitle = $this->selectedPricing->subCategoryPricing->title;
        $this->description = $this->selectedPricing->description;
        $this->cost_square_meter = $this->selectedPricing->cost_square_meter;
        $this->cost_hour = $this->selectedPricing->cost_hour;
        $this->cost_piece = $this->selectedPricing->cost_piece;

        // Open de modal
        $this->modalOpen = true;
        $this->activeTab = 'select'; // Default naar 'select' tab
    }

    public function save()
    {
        $this->validate([
            'description' => 'required|string|max:255',
            'cost_square_meter' => 'nullable|numeric',
            'cost_hour' => 'nullable|numeric',
            'cost_piece' => 'nullable|numeric',
        ]);

        // Als een waarde leeg is, zet deze op null
        $this->cost_square_meter = $this->cost_square_meter !== '' ? $this->cost_square_meter : null;
        $this->cost_hour = $this->cost_hour !== '' ? $this->cost_hour : null;
        $this->cost_piece = $this->cost_piece !== '' ? $this->cost_piece : null;

        // Update de geselecteerde subcategory als de title is aangepast
        if ($this->activeTab === 'edit') {
            $this->validate(['selectedSubcategoryTitle' => 'required|string|max:255']);
            $subcategory = SubCategoryPricing::find($this->selectedSubcategoryId);
            $subcategory->title = $this->selectedSubcategoryTitle;
            $subcategory->save();
        }

        // Update de pricing informatie
        $this->selectedPricing->sub_category_pricing_id = $this->selectedSubcategoryId;
        $this->selectedPricing->description = $this->description;
        $this->selectedPricing->cost_square_meter = $this->cost_square_meter;
        $this->selectedPricing->cost_hour = $this->cost_hour;
        $this->selectedPricing->cost_piece = $this->cost_piece;
        $this->selectedPricing->save();

        // Sluit de modal en reset de form
        $this->modalOpen = false;
        $this->resetForm();

        // Haal de data opnieuw op om de tabel te updaten
        $this->loadData();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function resetForm()
    {
        $this->selectedSubcategoryId = null;
        $this->selectedSubcategoryTitle = '';
        $this->description = '';
        $this->cost_square_meter = '';
        $this->cost_hour = '';
        $this->cost_piece = '';
        $this->selectedPricing = null;
    }

    public function addPricing($categoryId)
    {
        $subCategory = new SubCategoryPricing();
        $subCategory->title = 'new';
        $subCategory->category_pricing_id = $categoryId;
        $subCategory->save();

        $pricing = new Pricing();
        $pricing->category_pricing_id = $categoryId;
        $pricing->sub_category_pricing_id = $subCategory->id;
        $pricing->save();

        // Voeg de nieuwe pricing toe aan de juiste categorie in de lokale state
        foreach ($this->pricingCategories as $category) {
            if ($category->id === $categoryId) {
                // Voeg de nieuwe pricing toe aan de pricings van deze categorie
                $category->pricings->push($pricing->load('subCategoryPricing'));
                break;
            }
        }
    }

    public function delete($pricingId)
    {
        $pricing = Pricing::find($pricingId);
        if ($pricing) {
            $categoryId = $pricing->category_pricing_id; // Stel de categorie-ID vast
            $pricing->delete();

            // Verwijder het record uit de lokale state voor die specifieke categorie
            foreach ($this->pricingCategories as $category) {
                if ($category->id === $categoryId) {
                    $category->pricings = $category->pricings->filter(function ($item) use ($pricingId) {
                        return $item->id !== $pricingId;
                    });

                    // Stel het succesbericht in voor de betreffende categorie
                   /* $this->categorySuccessMessages[$categoryId] = 'Prijs succesvol verwijderd.';*/
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.pricing.index');
    }
}
