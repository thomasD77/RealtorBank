@extends('inspection')

@section('content')

    <livewire:basic.basic-area-form
        :Inspection="$inspection"
        :Room="$room"
        :Area="$area"
    />

@endsection
