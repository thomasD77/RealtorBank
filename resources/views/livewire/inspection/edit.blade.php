<div>
    <div class="single-add-property">
        <h3>{{ __('Inspectie en plaatsbeschrijving')  }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="submitGeneral">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label for="title">{{ __('Titel') }}</label>
                            <input class="form-control" type="text" wire:model="title" id="title" placeholder="Vul je titel hier in...">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label for="description">{{ __('Beschrijving') }}</label>
                            <textarea id="description" wire:model="description" placeholder="Vul je beschrijving hier in..."></textarea>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('success'))
                            <div class="btn btn-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Locatie') }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="locationSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="address">{{ __('Adres') }}</label>
                            <input type="text" wire:model="address" placeholder="Vul hier je adres in" id="address">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="city">{{ __('Bus') }}</label>
                            <input type="text" wire:model="postBus" placeholder="Vul hier je bus in" id="postBus">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="state">{{ __('Postcode') }}</label>
                            <input type="text" wire:model="zip" placeholder="Vul hier je postcode in" id="zip">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="country">{{ __('Stad') }}</label>
                            <input type="text" wire:model="city" placeholder="Vul hier je stad in" id="city">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p class="no-mb first">
                            <label for="latitude">{{ __('Land') }}</label>
                            <input type="text" wire:model="country" placeholder="Vul hier je land in" id="country">
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('success'))
                            <div class="btn btn-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Extra informatie') }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" wire:click="present('{{ 'tenant_present' }}')" @if($tenant_present) checked @endif>
                                    <label for="check-a">{{ __('Huurder aanwezig') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-b" type="checkbox" wire:click="present('{{ 'owner_present' }}')" @if($owner_present) checked @endif>
                                    <label for="check-b">{{ __('Verhuurder aanwezig') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" wire:click="present('{{ 'new_building' }}')" @if($new_building) checked @endif>
                                    <label for="check-c">{{ __('Nieubouw') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-d" type="checkbox" wire:click="present('{{ 'inhabited' }}')" @if($inhabited) checked @endif>
                                    <label for="check-d">{{ __('Bewoond') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-e" type="checkbox" wire:click="present('{{ 'furnished' }}')" @if($furnished) checked @endif>
                                    <label for="check-e">{{ __('Bemeubeld') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-f" type="checkbox" wire:click="present('{{ 'first_resident' }}')" @if($first_resident) checked @endif>
                                    <label for="check-f">{{ __('Eerste bewoner') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Media') }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-md-12">
                    <form action="/file-upload" class="dropzone"></form>
                </div>
            </div>
        </div>
    </div>
</div>
