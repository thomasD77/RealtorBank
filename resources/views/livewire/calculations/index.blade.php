<div class="single-add-property">
    @if($calculation)
        <h3>{{ __('Offerte') }}</h3>

        @include('livewire.calculations.calculation_css')

        <ul class="accordion accordion-1 one-open" style="cursor: pointer">
            <li>
                <div class="bg-dark text-white rounded px-4 py-2 justify-content-between d-flex align-items-center">
                    @if ($selectedCategory)
                        <span class="text-success justify-content-between d-flex align-items-center">
                            <i class="fa fa-info mr-2"></i>
                             {{ $pricingCategories->firstWhere('id', $selectedCategory)->title }}
                        </span>

                    @else
                        <span style="font-size: 1rem">{{ __('Selecteer een categorie') }}</span>
                        <i class="fa fa-arrow-down"></i>
                    @endif
                </div>
                <div class="content px-4 " style="overflow-y: scroll">
                    <div class="row py-4">
                        <div class="col-md-4 mb-2">
                            <a class="text-dark"
                               wire:click.prevent="selectCategory(null)">
                                {{ __('Geen categorie') }}
                            </a>
                        </div>
                        @foreach($pricingCategories as $category)
                            <div class="col-md-4 mb-2">
                                <a class="@if($selectedCategory === $category->id) text-success font-weight-bold @else text-dark @endif "
                                   wire:click.prevent="selectCategory({{ $category->id }})">
                                    {{ $category->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </li>
        </ul>

        @foreach($pricingCategories as $category)
            @if($selectedCategory === $category->id)
                <div>
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
                                        <a class="btn btn-sm btn-success" wire:click="edit({{ $pricing->id }})">
                                            <i class="fa fa-rocket"></i>
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
            <div class="card" style="background-color: #eeecec">
            <div class="card-body mt-4">
                <form wire:submit.prevent="saveSubCalculation" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectedCategory">{{ __('Categorie') }}</label>
                            <input type="text" class="form-control font-weight-bold" id="selectedCategory" value="{{ $selectedCategoryName }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectedSubCategory">{{ __('(Sub)Categorie') }}</label>
                            <input type="text" class="form-control font-weight-bold" id="selectedSubCategory" value="{{ $selectedSubCategoryName }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">{{ __('Beschrijving') }}</label>
                            <input type="text" style="background-color: white" class="form-control" id="description" wire:model="description">
                            @error('description')
                                <p class="pl-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($selectedCategoryName)
                            <div class="row">
                                <div class="col-md-6">
                                    @if($cost_square_meter !== null)
                                        <div class="form-group">
                                            <label for="cost_square_meter">{{ __('€ / m2') }}</label>
                                            <input type="number" step="0.01" class="form-control" id="cost_square_meter" wire:model="cost_square_meter" required>
                                            @error('cost_square_meter')
                                                <p class="pl-2 text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    @if($cost_hour !== null)
                                        <div class="form-group">
                                            <label for="cost_hour">{{ __('€ / uur') }}</label>
                                            <input type="text" step="0.01" class="form-control" id="cost_hour" wire:model="cost_hour" required>
                                            @error('cost_hour')
                                                <p class="pl-2 text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    @if($cost_piece !== null)
                                        <div class="form-group">
                                            <label for="cost_piece">{{ __('€ / stuk') }}</label>
                                            <input type="number" step="0.01" class="form-control" id="cost_piece" wire:model="cost_piece" required>
                                            @error('cost_piece')
                                                <p class="pl-2 text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="count">{{ __('Aantal') }}</label>
                                        <input type="number" step="0.01" class="form-control" id="count" wire:model="count" required>
                                        @error('count')
                                            <p class="pl-2 text-danger">{{ $message }}</p>
                                        @enderror
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
                                <div class="col-md-6"></div>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total">{{ __('Totaal incl. btw') }}</label>
                                        <input type="number" class="form-control" id="total" wire:model="total" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-end">
                                    <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                                </div>
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
            <button wire:click="addCalculation" onclick="setTimeout(() => location.reload(), 50)" class="btn btn-common mb-3"><i class="fa fa-plus mr-1"></i>{{ __('Calculatie') }}</button>
        </div>
    @endif
</div>
