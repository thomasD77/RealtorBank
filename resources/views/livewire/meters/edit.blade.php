<div>

    <div class="single-add-property">
        <a href="{{ route('meters.index', $inspection) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        <h3>{{ $meter->title }}</h3>
        <div class="property-form-group">

            <form wire:submit.prevent="meterSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="reference">{{ __('Referentie') }}</label>
                            <input type="text" wire:model="reference" placeholder="Vul hier de referentie in" id="reference">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="ean">{{ __('EAN') }}</label>
                            <input type="text" wire:model="EAN" placeholder="Vul hier de EAN in" id="ean">
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
        <ul class="accordion accordion-1 one-open">

            <livewire:meters.elements.media
                :dynamicArea="$meter"
            />

        </ul>
    </div>
</div>
