<div>
    <div class="d-flex justify-content-between">
        <h5 class="uppercase">{{ __('Basis gegevens') }}</h5>
        <h6 class="mb40">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $basicArea->area->title }}</strong></h6>
    </div>


    <ul class="accordion accordion-1 one-open">

        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.plinths
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.analysis
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.media
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.extra
            :BasicArea="$basicArea"
        />

    </ul>
</div>
