@extends('inspection')

@section('content')

    <livewire:contracts.index
        :inspection="$inspection"
    />

@endsection
