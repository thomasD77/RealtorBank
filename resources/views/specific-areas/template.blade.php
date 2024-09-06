@extends('inspection')

@section('content')

    <div class="single-add-property">

        @if (session()->has('successDeleteDamage'))
            <div class="btn btn-success flash_message">
                {{ session('successDeleteDamage') }}
            </div>
        @endif

        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $specificArea->specific->title }}</strong></h6>
        <h3 class="uppercase">{{ __('Specifiek') }}</h3>

        <livewire:specific.add-area
            :Inspection="$inspection"
            :Room="$room"
            :specific="$specific"
            :specificArea="$specificArea"
        />

        <ul class="accordion accordion-1 one-open">

            <livewire:specific.specific-area-form
                :Inspection="$inspection"
                :Room="$room"
                :specific="$specific"
                :specificArea="$specificArea"
            />

            <livewire:specific.elements.analysis
                :dynamicArea="$specificArea"
            />

            <livewire:specific.elements.extra
                :dynamicArea="$specificArea"
            />


            <livewire:damage.index
                :dynamicArea="$specificArea"
                :Inspection="$inspection"
            />

            <livewire:general.rename-specific
                :Inspection="$inspection"
                :specificArea="$specificArea"
                :specific="$specific"
            />

            <livewire:specific.elements.media
                :specificArea="$specificArea"
            />

        </ul>
        <h6 class="mb20 text-md-right">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $specificArea->specific->title }}</strong></h6>
    </div>

@endsection
