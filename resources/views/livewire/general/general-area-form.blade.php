<div>
    <div class="d-flex justify-content-between">
        <h5 class="uppercase">{{ __('Algemene gegevens') }}</h5>
        <h6 class="mb40">{{ $inspection->title }} > {{ $room->title }}</h6>
    </div>

    <ul class="accordion accordion-1 one-open">

        <livewire:general.elements.order
            :general="$general"
        />

        <livewire:general.elements.cleanliness
            :general="$general"
        />

        <livewire:general.elements.painting
            :general="$general"
        />

        <livewire:general.elements.analysis
            :general="$general"
        />

        <livewire:general.elements.media
            :general="$general"
        />

        <livewire:general.elements.extra
            :general="$general"
        />

    </ul>
</div>
