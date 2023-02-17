@extends('inspection')

@section('content')

    <div class="single-add-property">
        <h6 class="mb20 text-md-right">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $conformArea->conform->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Conformiteit') }}</h3>

        <ul class="accordion accordion-1 one-open">

            <livewire:conform.conform-area-form
                :Inspection="$inspection"
                :Room="$room"
                :conform="$conform"
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.analysis
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.media
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.extra
                :conformArea="$conformArea"
            />

        </ul>
    </div>

@endsection
