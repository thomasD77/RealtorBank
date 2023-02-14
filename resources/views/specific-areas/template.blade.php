@extends('inspection')

@section('content')

    <div class="single-add-property">
        <h6 class="mb20 text-md-right">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $specificArea->specific->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Specifiek') }}</h3>

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
