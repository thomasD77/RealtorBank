@extends('inspection')

@section('content')

    <livewire:general.general-area-form
        :Inspection="$inspection"
        :Room="$room"
    />

@endsection
