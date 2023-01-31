@extends('inspection')

@section('content')

    {{--    Area :: VLOER--}}
    @if($area->code == 'floor' )
        <livewire:basic-area-form-floor
            :Inspection="$inspection"
            :Room="$room"
            :Area="$area"
        />
    @elseif($area->code == 'celling')
        <livewire:basic-area-form-celling
            :Inspection="$inspection"
            :Room="$room"
            :Area="$area"
        />
    @endif
@endsection
