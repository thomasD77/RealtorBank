<div>
    <div class="single-add-property">
        <a href="{{ route('keys.index', $inspection) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>

        <h3>{{  __('Sleutel') }} -  <input class="form-control" type="text" wire:model="title" wire:change="editTitle" id="title" placeholder="Vul je titel hier in..."></h3>

        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.types
                :dynamicArea="$key"
            />

            <livewire:keys.elements.count
                :dynamicArea="$key"
            />

            <livewire:keys.elements.extra
                :dynamicArea="$key"
            />


        </ul>
    </div>

    <div class="single-add-property">
        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.media
                :dynamicArea="$key"
            />

        </ul>
    </div>
</div>

