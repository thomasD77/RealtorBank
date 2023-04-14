@extends('inspection')

@section('content')

    <div class="single-add-property">

        <div class="d-flex justify-content-between">
            <livewire:basic.make-favourite
                :Inspection="$inspection"
                :Room="$room"
                :Area="$area"
                :basicArea="$basicArea"
            />

            <livewire:basic.generate-favourite
                :Inspection="$inspection"
                :Room="$room"
                :Area="$area"
                :basicArea="$basicArea"
            />
        </div>



    <h6 class="mb20 mt-3 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $basicArea->area->title }}</strong></h6>
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
            :dynamicArea="$basicArea"
        />

        <livewire:basic.elements.extra
            :dynamicArea="$basicArea"
        />

        <livewire:basic.elements.media
            :BasicArea="$basicArea"
        />

    </ul>
    <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $basicArea->area->title }}</strong></h6>
</div>

@endsection
