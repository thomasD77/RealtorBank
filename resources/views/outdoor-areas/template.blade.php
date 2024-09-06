@extends('inspection')

@section('content')

    <div class="single-add-property">
        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ __('Exterieur') }} | <strong>{{ $outdoorArea->outdoor->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Exterieur') }}</h3>

        <livewire:outdoor.add-outdoor
            :Inspection="$inspection"
            :outdoor="$outdoor"
            :outdoorArea="$outdoorArea"
        />

        @if (session()->has('successDeleteDamage'))
            <div class="btn btn-success flash_message">
                {{ session('successDeleteDamage') }}
            </div>
        @endif

        <ul class="accordion accordion-1 one-open">

            <livewire:outdoor.outdoor-area-form
                :Inspection="$inspection"
                :outdoor="$outdoor"
                :outdoorArea="$outdoorArea"
            />

            <livewire:outdoor.elements.analysis
                :Inspection="$inspection"
                :outdoor="$outdoor"
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.extra
                :Inspection="$inspection"
                :outdoor="$outdoor"
                :dynamicArea="$outdoorArea"
            />

            <livewire:damage.index
                :dynamicArea="$outdoorArea"
                :Inspection="$inspection"
            />

            <livewire:general.rename-outdoor
                :Inspection="$inspection"
                :outdoor="$outdoor"
            />

            <livewire:outdoor.elements.media
                :Inspection="$inspection"
                :outdoor="$outdoor"
                :outdoorArea="$outdoorArea"
            />
        </ul>
        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ __('Exterieur') }} | <strong>{{ $outdoorArea->outdoor->title }}</strong></h6>
    </div>

@endsection
