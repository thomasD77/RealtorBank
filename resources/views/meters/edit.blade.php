@extends('inspection')

@section('content')

    <livewire:meters.edit
        :inspection="$inspection"
        :meter="$meter"
    />

@endsection
