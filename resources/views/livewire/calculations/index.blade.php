<div>
    @include('livewire.pricing.pricing_css')
    <div class="row">
        <div class="col-md-6">Test</div>
        <div class="col-md-6">Test</div>
    </div>
    <div class="single-add-property bg-light text-dark" style="margin-bottom: 600px">
        <h3 class="uppercase">{{ __('Calculator') }}</h3>

        <!-- Eerste dropdown voor categorieën -->
        <div class="custom-dropdown mb-4">
            <button class="custom-dropdown-btn" id="dropdownButton">
                @if ($selectedCategory)
                    {{ $pricingCategories->firstWhere('id', $selectedCategory)->title ?? 'Selecteer een categorie' }}
                @else
                    Selecteer een categorie
                @endif
            </button>
            <div class="custom-dropdown-content" scrol id="dropdownMenu">
                @foreach($pricingCategories as $category)
                    <div>
                        <a href="#" class="@if($selectedCategory === $category->id) active @endif"
                           wire:click.prevent="selectCategory({{ $category->id }})">
                            {{ $category->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Tweede dropdown voor pricings (alleen tonen als er een categorie is geselecteerd) -->
        @if($selectedCategory && count($pricingRecords) > 0)
            <div class="custom-dropdown mb-4">
                <button class="custom-dropdown-btn" id="pricingDropdownButton">
                    Selecteer een pricing
                </button>
                <div class="custom-dropdown-content" scrol id="pricingDropdownMenu">
                    @foreach($pricingRecords as $pricing)
                        <div>
                            <a href="#">
                                {{ $pricing->subCategoryPricing->title }} - {{ $pricing->description }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
    @include('livewire.pricing.pricing_script')
</div>


