<div>

    <div class="single-add-property">
        <a href="{{ route('situation.index', $inspection) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        <h3>{{ __('In/uittrede') }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-lg-6 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" wire:click="intredeSubmit({{1}})"  @if($intrede) checked @endif>
                                    <label for="check-a">{{ __('Intrede') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" wire:click="intredeSubmit({{0}})" @if($intrede === 0) checked @endif>
                                    <label for="check-c">{{ __('Uittrede') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>
                        <label for="date">{{ __('Datum') }}</label>
                        <input type="date" wire:change="editDate" wire:model="date" id="date">
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Eigenaar') }} <small style="text-transform: lowercase">({{ __('verkoper/verhuurder') }})</small></h3>
        <div class="property-form-group">
            <form wire:submit.prevent="ownerSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="name">{{ __('Naam') }}</label>
                            <input type="text" wire:model="name" placeholder="Vul hier de naam in" id="name">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="email">{{ __('E-mail') }}</label>
                            <input type="text" wire:model="email" placeholder="Vul hier de e-mail in" id="email">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" wire:model="phone" placeholder="Vul hier de telefoon in" id="phone">
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('successOwner'))
                            <div class="btn btn-success flash_message">
                                {{ session('successOwner') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Koper/huurder') }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="tenantSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="nameTenant">{{ __('Naam') }}</label>
                            <input type="text" wire:model="nameTenant" placeholder="Vul hier de naam in" id="nameTenant">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="emailTenant">{{ __('E-mail') }}</label>
                            <input type="text" wire:model="emailTenant" placeholder="Vul hier de e-mail in" id="emailTenant">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="phoneTenant">{{ __('Phone') }}</label>
                            <input type="text" wire:model="phoneTenant" placeholder="Vul hier de telefoon in" id="phoneTenant">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('successTenant'))
                            <div class="btn btn-success flash_message">
                                {{ session('successTenant') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($intrede === 0)
        <div class="single-add-property">
        <p class="mb-0">{{ $nameTenant }}</p>
        <h3>{{ __('Verhuist naar') }} <small style="text-transform: lowercase">(*{{ __('optioneel') }})</small></h3>
        <div class="property-form-group">
            <form wire:submit.prevent="addressSubmit">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-group">
                            <label for="currentAddress">{{ __('Adres') }}</label>
                            <input class="form-control" type="text" wire:model="currentAddress" placeholder="Vul hier de adres in" id="currentAddress">
                            @error('currentAddress') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-group">
                            <label for="currentPostBus">{{ __('Bus nummer') }}</label>
                            <input class="form-control" type="text" wire:model="currentPostBus" placeholder="Vul hier de bus nummer in" id="currentPostBus">
                            @error('currentPostBus') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-group">
                            <label for="currentZip">{{ __('Postcode') }}</label>
                            <input class="form-control" type="text" wire:model="currentZip" placeholder="Vul hier je postcode in" id="currentZip">
                            @error('currentZip') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-group">
                            <label for="currentCity">{{ __('Stad') }}</label>
                            <input class="form-control" type="text" wire:model="currentCity" placeholder="Vul hier je stad in" id="currentCity">
                            @error('currentCity') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-group">
                            <label for="currentCountry">{{ __('Land') }}</label>
                            <input class="form-control" type="text" wire:model="currentCountry" placeholder="Vul hier je land in" id="currentCountry">
                            @error('currentCountry') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">save</button>
                @if (session()->has('successAddress'))
                    <div class="btn btn-success flash_message">
                        {{ session('successAddress') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
    @endif

    <div class="single-add-property">
            <h3>{{ __('Extra') }}</h3>
            <div class="property-form-group">
                <form wire:submit.prevent="extraSubmit">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <label for="extra">{{ __('Extra') }}</label>
                                <textarea type="text" wire:model="extra" placeholder="Vul hier extra gegevens in" id="extra"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-dark">save</button>
                            @if (session()->has('successExtra'))
                                <div class="btn btn-success flash_message">
                                    {{ session('successExtra') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>


    @if($intrede === 0)
        <div class="single-add-property">
            <h3>{{ __('Contract') }}</h3>
            <div class="property-form-group">
                @if($contract)
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Titel') }}</th>
                                    <th>{{ __('Datum') }}</th>
                                    <th>{{ __('Actie') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('Contract') }}</td>
                                        <td>{{ $contract->created_at->format('d-m-Y') }}</td>
                                        <td class="edit">
                                            <a href="{{ route('contract.edit', [ $inspection, $contract]) }}"><i class="fa fa-pencil-alt text-dark"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="single-add-property">
        <h3>{{ __('Verwijderen') }}</h3>
        <div class="property-form-group">
            <!-- Button trigger modal -->
            <div class="text-right">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-trash mx-2"></i> {{ __('Delete') }}
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Verwijderen') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ __('Ben je zeker om deze in/uittrede te verwijderen?') }}</p>
                            <form wire:submit.prevent="deleteSituation">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark">Verwijderen</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




