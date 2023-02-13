@extends('inspection')

@section('content')

    <div>
        <div class="d-flex justify-content-between">
            <h5 class="uppercase">{{ __('Technieken') }}</h5>
            <h6 class="mb40">{{ $inspection->title }} > <strong>{{ $techniqueArea->technique->title }}</strong></h6>
        </div>

        <ul class="accordion accordion-1 one-open">

            <livewire:technique.technique-area-form
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

            <livewire:technique.elements.analysis
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

            <livewire:technique.elements.media
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

            <livewire:technique.elements.extra
                :Inspection="$inspection"
                :technique="$technique"
                :techniqueArea="$techniqueArea"
            />

        </ul>
    </div>

@endsection
