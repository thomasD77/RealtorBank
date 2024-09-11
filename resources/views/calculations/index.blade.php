@extends('inspection')

@section('content')

    <livewire:calculations.index
        :Inspection="$inspection"
        :Floor="$floor"
        :Room="$room"
    />

@endsection
