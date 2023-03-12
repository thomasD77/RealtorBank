@extends('inspection')

@section('content')

    <div class="single-add-property">
        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ __('Technieken') }} | <strong>{{ $techniqueArea->technique->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Technieken') }}</h3>

        <ul class="accordion accordion-1 one-open">

            <livewire:technique.technique-area-form
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

            <livewire:technique.elements.analysis
                :Inspection="$inspection"
                :technique="$technique"
                :dynamicArea="$techniqueArea"
            />

            <livewire:technique.elements.extra
                :Inspection="$inspection"
                :technique="$technique"
                :dynamicArea="$techniqueArea"
            />

            <livewire:technique.elements.media
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

        </ul>
        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ __('Technieken') }} | <strong>{{ $techniqueArea->technique->title }}</strong></h6>
    </div>

@endsection
