@extends('inspection')

@section('content')

    <div class="single-add-property">

        @if (session()->has('successDeleteDamage'))
            <div class="btn btn-success flash_message mb-3">
                {{ session('successDeleteDamage') }}
            </div>
        @endif

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
        <h3 class="uppercase">{{ __('Standaard gegevens') }}</h3>

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

        <livewire:damage.index
            :dynamicArea="$basicArea"
            :Inspection="$inspection"
        />

        <livewire:basic.elements.media
            :BasicArea="$basicArea"
        />

    </ul>

    <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $basicArea->area->title }}</strong></h6>

    <livewire:basic.delete-area
        :Inspection="$inspection"
        :Room="$room"
        :Area="$area"
        :basicArea="$basicArea"
    />
</div>

@endsection
