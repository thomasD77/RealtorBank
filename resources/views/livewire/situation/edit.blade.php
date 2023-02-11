<div>

    <div class="single-add-property">
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
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Contact gegevens') }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="locationSubmit">
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
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="date">{{ __('Datum') }}</label>
                            <input type="date" wire:model="date" id="date">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('success'))
                            <div class="btn btn-success flash_message">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

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
</div>




