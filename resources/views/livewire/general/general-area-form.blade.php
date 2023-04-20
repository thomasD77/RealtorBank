<div class="single-add-property">

    <h6 class="mb20 text-md-right">{{ $inspection->title }} > {{ $room->title }}</strong></h6>

    <livewire:general.add-room
        :Inspection="$inspection"
        :Room="$room"
    />

    <h3 class="uppercase">{{ __('Algemene gegevens') }}</h3>

    <ul class="accordion accordion-1 one-open">

        <livewire:general.elements.order
            :dynamicArea="$general"
        />

        <livewire:general.elements.cleanliness
            :dynamicArea="$general"
        />

        <livewire:general.elements.painting
            :dynamicArea="$general"
        />

        <livewire:general.elements.analysis
            :dynamicArea="$general"
        />

        <livewire:general.elements.extra
            :dynamicArea="$general"
        />

        <livewire:general.elements.media
            :general="$general"
        />

    </ul>
</div>
