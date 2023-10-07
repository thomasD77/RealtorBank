@extends('inspection')

@section('content')

    <div class="single-add-property">

        @if (session()->has('successDeleteDamage'))
            <div class="btn btn-success flash_message mb-2">
                {{ session('successDeleteDamage') }}
            </div>
        @endif

        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $conformArea->conform->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Conformiteit') }}</h3>

        @if($conform->code == \App\Enums\ConformKey::Lighting->value)
            <livewire:conform.add-area
                :Inspection="$inspection"
                :Room="$room"
                :Conform="$conform"
                :conformArea="$conformArea"
            />
        @endif

        <ul class="accordion accordion-1 one-open">

            <livewire:conform.conform-area-form
                :Inspection="$inspection"
                :Room="$room"
                :conform="$conform"
                :ConformArea="$conformArea"
            />

            <livewire:conform.elements.analysis
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.extra
                :dynamicArea="$conformArea"
            />

            <livewire:damage.index
                :dynamicArea="$conformArea"
                :Inspection="$inspection"
            />

            <livewire:conform.elements.media
                :conformArea="$conformArea"
            />

        </ul>

        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $conformArea->conform->title }}</strong></h6>
    </div>

@endsection
