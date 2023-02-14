<div class="single-add-property">
    <h6 class="mb20 text-md-right">{{ $inspection->title }} > {{ $room->title }}</strong></h6>
    <h3 class="uppercase">{{ __('Algemene gegevens') }}</h3>

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
