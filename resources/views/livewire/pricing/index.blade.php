<div>
    @include('livewire.pricing.pricing_css')

    <div class="dashborad-box rounded mb-2">
        <div class="row">
            <!-- Flash message -->
            @if (session('success') && $showFlashMessage)
                <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between align-items-center w-100" role="alert">
                    <span>{{ session('success') }}</span>
                    <button class=" btn-close text-right mr-0" wire:click="closeFlashMessage" aria-label="Close">x</button>
                </div>
            @endif

            <div class="col-12">
                <h3>{{'Estatemetrics : Prijzen per Categorie'}}</h3>
                <small style="letter-spacing: -0.5px">{{ __('Selecteer een gewenste categorie. Voeg op maat gemaakte parameters toe. Deze kunnen overal in de PB gebruikt worden. Dit telkens onder de toegevoegde schade. Er kan een custom categorie aangemaakt worden naar wens. Let op! Een custom categorie kan niet worden gewist. Contacteer hiervoor de beheerder.') }}</small>
                <hr>
            </div>
        <!-- Dropdown voor de categorieën -->
        <div class="col-md-6 custom-dropdown mb-4">
            <button class=" btn btn-dark" id="dropdownButton">
                @if ($selectedCategory)
                    {{ $pricingCategories->firstWhere('id', $selectedCategory)->title ? 'Geselecteerd : ' . $pricingCategories->firstWhere('id', $selectedCategory)->title : 'Selecteer een categorie' }}
                @else
                    {{ __('Selecteer een categorie') }}
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

        <div class="col-md-6 text-right">
            <button class="btn btn-dark" wire:click="$set('addCategoryModalOpen', true)">
                {{ __('+ Nieuwe categorie') }}
            </button>
        </div>

    </div>
    </div>

    @foreach($pricingCategories as $category)
        @if($selectedCategory === $category->id)
            <div class="dashborad-box py-5 rounded">
                <div class="row">
                    <div class="col-10">
                        <h3 class="">{{ $category->title }}</h3>
                    </div>
                    <div class="col-2 text-right">
                        <button wire:click="addPricing({{$category->id}})" class="btn btn-dark"
                                style="border:none; z-index: 10"> + {{ $category->title }}
                        </button>
                    </div>
                </div>

                <hr>
                <div class="section-inforamation">
                    <table>
                        <thead>
                        <tr>
                            <th>{{ __('(Sub)Categorie') }}</th>
                            <th>{{ __('Beschrijving') }}</th>
                            <th>{{ __('€ / m2') }}</th>
                            <th>{{ __('€ / uur') }}</th>
                            <th>{{ __('€ / stuk') }}</th>
                            <th>{{ __('Edit') }}</th>
                            <th>{{ __('Delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->pricings as $pricing)
                            <tr>
                                @if($pricing->subCategoryPricing->title == 'new')
                                    <td><span
                                            class="badge badge-success">{{ $pricing->subCategoryPricing->title }}</span>
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
                                        <i class="fa fa-pencil-alt text-dark"></i>
                                    </a>
                                </td>
                                <td class="edit text-center"><a style="cursor: pointer"
                                                                wire:click="delete({{$pricing->id}})"><i
                                            class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach

    @if($addCategoryModalOpen)
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Categorie toevoegen') }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('addCategoryModalOpen', false)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="newCategoryTitle" class="form-label">{{ __('Maak een nieuwe titel:') }}</label>
                            <input type="text" class="form-control" id="newCategoryTitle" wire:model="newCategoryTitle">
                            @error('newCategoryTitle')
                                <p class="pl-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" wire:click="$set('addCategoryModalOpen', false)">
                                {{ __('Annuleren') }}</button>
                            <button type="button" class="btn btn-dark" wire:click="saveCategory">{{__('save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Modal -->
    @if($modalOpen)
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Bewerken') }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('modalOpen', false)"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Tab Navigatie -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link @if($activeTab === 'select') active bg-dark text-white @else bg-white text-dark  @endif"
                                   wire:click="setActiveTab('select')" href="#">{{ __('Selecteer (sub)categorie') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($activeTab === 'edit') active bg-dark text-white @else bg-white text-dark  @endif"
                                   wire:click="setActiveTab('edit')" href="#">{{ __('Bewerk (sub)categorie') }}</a>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-3">
                            <!-- Selecteer Subcategory Tab -->
                            @if($activeTab === 'select')
                                <div class="mb-3">
                                    <label for="selectedSubcategoryId"
                                           class="form-label">{{ __('(sub)Categorie') }}</label>
                                    <select class="form-select" id="selectedSubcategoryId"
                                            wire:model="selectedSubcategoryId">
                                        <option value="">{{ __('Selecteer een (sub)categorie') }}</option>
                                        @foreach($subCategories as $subcategory)
                                            @if($subcategory->title != 'new')
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->id }}. {{ $subcategory->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <!-- Bewerk Subcategory Tab -->
                            @if($activeTab === 'edit')
                                <div class="mb-3">
                                    <label for="selectedSubcategoryTitle"
                                           class="form-label">{{ __('Wijzig (sub)Categorie titel') }}</label>
                                    <input type="text" class="form-control" id="selectedSubcategoryTitle"
                                           wire:model="selectedSubcategoryTitle">
                                </div>
                            @endif

                            <!-- Overige velden -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Beschrijving</label>
                                <input type="text" class="form-control" id="description" wire:model="description">
                                @error('description')
                                    <p class="pl-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cost_square_meter" class="form-label">€ / m2</label>
                                <input type="number" class="form-control" id="cost_square_meter"
                                       wire:model="cost_square_meter">
                                @error('cost_square_meter')
                                    <p class="pl-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cost_hour" class="form-label">€ / uur</label>
                                <input type="number" class="form-control" id="cost_hour" wire:model="cost_hour">
                                @error('cost_hour')
                                    <p class="pl-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cost_piece" class="form-label">€ / stuk</label>
                                <input type="number" class="form-control" id="cost_piece" wire:model="cost_piece">
                                @error('cost_piece')
                                    <p class="pl-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Opslaan en Annuleren knoppen -->
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary"
                                        wire:click="$set('modalOpen', false)">{{ __('Annuleren') }}</button>
                                <button type="button" class="btn btn-dark"
                                        wire:click="save">{{ __('save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@include('livewire.pricing.pricing_script')


