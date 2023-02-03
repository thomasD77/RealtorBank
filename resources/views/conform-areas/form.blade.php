@extends('inspection')

@section('content')

    <div>
        <div class="d-flex justify-content-between">
            <h5 class="uppercase">{{ __('Conformiteit') }}</h5>
            <h6 class="mb40">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $conformArea->conform->title }}</strong></h6>
        </div>

        <ul class="accordion accordion-1 one-open">

            <livewire:conform.conform-area-form
                :Inspection="$inspection"
                :Room="$room"
                :conform="$conform"
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.analysis
                :conformArea="$conformArea"
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
