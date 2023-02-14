@extends('inspection')

@section('content')

    <div class="single-add-property">
        <h6 class="mb20 text-md-right">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $basicArea->area->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Basis gegevens') }}</h3>

    <livewire:basic.add-area
        :Inspection="$inspection"
        :Room="$room"
        :Area="$area"
        :basicArea="$basicArea"
    />

    <ul class="accordion accordion-1 one-open">

        <livewire:basic.basic-area-form
            :Inspection="$inspection"
            :Room="$room"
            :Area="$area"
            :basicArea="$basicArea"
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

@endsection
