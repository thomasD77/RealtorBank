<?php

namespace App\Http\Livewire\Pricing;

use App\Models\CategoryPricing;
use App\Models\Pricing;
use App\Models\SubCategoryPricing;
use Livewire\Component;

class Index extends Component
{
    public $pricingCategories;
    public $categorySuccessMessages = [];

    public function mount()
    {
            $this->pricingCategories = CategoryPricing::all();
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
                    $this->categorySuccessMessages[$categoryId] = 'Prijs succesvol verwijderd.';
                }
            }
        }
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

    public function render()
    {
        return view('livewire.pricing.index');
    }
}
