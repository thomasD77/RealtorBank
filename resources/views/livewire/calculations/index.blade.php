<div>
    @include('livewire.pricing.pricing_css')

    <!-- Dropdown voor de categorieën -->
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

    @foreach($pricingCategories as $category)
        @if($selectedCategory === $category->id)
            <div class=" rounded">
                <div class="section-inforamation">
                    <table>
                        <thead>
                        <tr>
                            <th>{{ __('(Sub)Categorie') }}</th>
                            <th>{{ __('Beschrijving') }}</th>
                            <th>{{ __('€ / m2') }}</th>
                            <th>{{ __('€ / uur') }}</th>
                            <th>{{ __('€ / stuk') }}</th>
                            <th>{{ __('Push') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->pricings as $pricing)
                            <tr>
                                @if($pricing->subCategoryPricing->title == 'new')
                                    <td><span class="badge badge-success">{{ $pricing->subCategoryPricing->title }}</span>
                                    </td>
                                @else
                                    <td>{{ $pricing->subCategoryPricing->title }}</td>
                                @endif
                                <td @if($pricing->description === NULL) class="bg-secondary" @endif>{{ $pricing->description }}</td>
                                <td @if($pricing->cost_square_meter === NULL) class="bg-secondary" @endif>{{ $pricing->cost_square_meter }}</td>
                                <td @if($pricing->cost_hour === NULL) class="bg-secondary" @endif>{{ $pricing->cost_hour }}</td>
                                <td @if($pricing->cost_piece === NULL) class="bg-secondary" @endif>{{ $pricing->cost_piece }}</td>
                                <td class="edit text-center">
                                    <a style="cursor: pointer" wire:click="edit({{ $pricing->id }})">
                                        <i class="fa fa-rocket text-dark"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach

    <div class="card">
        <div class="card-header">
            <h4>{{ __('Bewerk SubCalculation') }}</h4>
        </div>
        <div class="card-body ">
            <form wire:submit.prevent="save" class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectedCategory">{{ __('Categorie') }}</label>
                        <input type="text" class="form-control" id="selectedCategory" wire:model="selectedCategory" readonly>
                    </div>
                    <div class="form-group">
                        <label for="selectedSubCategory">{{ __('SubCategorie') }}</label>
                        <input type="text" class="form-control" id="selectedSubCategory" wire:model="selectedSubCategory" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Beschrijving') }}</label>
                        <input type="text" class="form-control" id="description" wire:model="description">
                    </div>
                    <div class="form-group">
                        <label for="cost_square_meter">{{ __('€ / m2') }}</label>
                        <input type="number" class="form-control" id="cost_square_meter" wire:model="cost_square_meter">
                    </div>
                    <div class="form-group">
                        <label for="cost_hour">{{ __('€ / uur') }}</label>
                        <input type="number" class="form-control" id="cost_hour" wire:model="cost_hour">
                    </div>
                    <div class="form-group">
                        <label for="cost_piece">{{ __('€ / stuk') }}</label>
                        <input type="number" class="form-control" id="cost_piece" wire:model="cost_piece">
                    </div>
                </div>
                <div class="col-md-6">

                </div>

                <button type="submit" class="btn btn-primary">{{ __('Opslaan') }}</button>
            </form>
        </div>
    </div>

</div>
