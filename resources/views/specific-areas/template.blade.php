@extends('inspection')

@section('content')

    <div>
        <div class="d-flex justify-content-between">
            <h5 class="uppercase">{{ __('Specifiek') }}</h5>
            <h6 class="mb40">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $specificArea->specific->title }}</strong></h6>
        </div>

        <ul class="accordion accordion-1 one-open">

            <livewire:specific.specific-area-form
                :Inspection="$inspection"
                :Room="$room"
                :specific="$specific"
                :specificArea="$specificArea"
            />

            <livewire:specific.elements.analysis
                :specificArea="$specificArea"
            />

            <livewire:conform.elements.media
                :specificArea="$specificArea"
            />

            <livewire:conform.elements.extra
                :specificArea="$specificArea"
            />

        </ul>
    </div>

@endsection
