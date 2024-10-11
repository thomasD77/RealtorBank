<div>
    @if($calculation)
        @include('livewire.calculations.calculation_css')
        <!-- Dropdown voor de categorieën -->
        <div class="custom-dropdown" wire:ignore.self>
            <button class="custom-dropdown-btn" id="dropdownButton">
                @if ($selectedCategory)
                    {{ $pricingCategories->firstWhere('id', $selectedCategory)->title ?? 'Selecteer een categorie' }}
                @else
                    {{ __('Selecteer een categorie') }}
                @endif
            </button>
            <div class="custom-dropdown-content" id="dropdownMenu">
                <!-- Optie om de categorie te deselecteren -->
                <div>
                    <a href="#" class=""
                       wire:click.prevent="selectCategory(null)">
                        {{ __('Geen categorie') }}
                    </a>
                </div>
                @foreach($pricingCategories as $category)
                    <div class="mb-1">
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
                                    <td>{{ $pricing->subCategoryPricing->title }}</td>
                                    <td @if($pricing->description === NULL) class="bg-secondary" @endif>{{ $pricing->description }}</td>
                                    <td @if($pricing->cost_square_meter === NULL) class="bg-secondary" @endif>{{ $pricing->cost_square_meter }}</td>
                                    <td @if($pricing->cost_hour === NULL) class="bg-secondary" @endif>{{ $pricing->cost_hour }}</td>
                                    <td @if($pricing->cost_piece === NULL) class="bg-secondary" @endif>{{ $pricing->cost_piece }}</td>
                                    <td class="edit text-center">
                                        <a class="" style="cursor: pointer" wire:click="edit({{ $pricing->id }})">
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

        @if($showForm)
            <div class="card">
            <div class="card-header bg-dark my-3"></div>
            <div class="card-body ">
                <form wire:submit.prevent="saveSubCalculation" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectedCategory">{{ __('Categorie') }}</label>
                            <input type="text" class="form-control" id="selectedCategory" value="{{ $selectedCategoryName }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="selectedSubCategory">{{ __('SubCategorie') }}</label>
                            <input type="text" class="form-control" id="selectedSubCategory" value="{{ $selectedSubCategoryName }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Beschrijving') }}</label>
                            <input type="text" class="form-control" id="description" wire:model="description">
                        </div>
                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </div>
                    <div class="col-md-6">
                        @if($selectedCategoryName)
                            <div class="row">
                                <div class="col-md-6">
                                    @if($cost_square_meter !== null)
                                        <div class="form-group">
                                            <label for="cost_square_meter">{{ __('€ / m2') }}</label>
                                            <input type="deci" class="form-control" id="cost_square_meter" wire:model="cost_square_meter">
                                        </div>
                                    @endif

                                    @if($cost_hour !== null)
                                        <div class="form-group">
                                            <label for="cost_hour">{{ __('€ / uur') }}</label>
                                            <input type="number" class="form-control" id="cost_hour" wire:model="cost_hour">
                                        </div>
                                    @endif

                                    @if($cost_piece !== null)
                                        <div class="form-group">
                                            <label for="cost_piece">{{ __('€ / stuk') }}</label>
                                            <input type="number" class="form-control" id="cost_piece" wire:model="cost_piece">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="count">{{ __('Aantal') }}</label>
                                        <input type="number" class="form-control" id="count" required wire:model="count">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tax">{{ __('BTW (%)') }}</label>
                                        <select class="form-control" id="tax" wire:model="tax">
                                            <option value="0">0%</option>
                                            <option value="6">6%</option>
                                            <option value="21">21%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="approved">{{ __('Goedgekeurd') }}</label>
                                        <select class="form-control" id="approved" wire:model="approved">
                                            <option value="1">{{ __('Ja') }}</option>
                                            <option value="0">{{ __('Nee') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total">{{ __('Totaal (€)') }}</label>
                                <input type="number" class="form-control" id="total" wire:model="total" readonly>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        @endif

        @include('livewire.calculations.calculation_table')

        @include('livewire.calculations.calculation_script')
    @else
        <div class="single-add-property">
            <h3 class="uppercase">{{ __('Calculator') }}</h3>
            <button wire:click="addCalculation" class="btn btn-common mb-3"><i class="fa fa-plus mr-1"></i>{{ __('Calculatie') }}</button>
        </div>
    @endif
</div>
