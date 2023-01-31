@extends('inspection')

@section('content')

    <livewire:basic-area-form
        :Inspection="$inspection"
        :Room="$room"
        :Area="$area"
         />

@endsection
