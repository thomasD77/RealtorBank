@extends('inspection')

@section('content')

    <livewire:meters.index
        :inspection="$inspection"
    />

@endsection
