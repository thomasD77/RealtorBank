@extends('inspection')

@section('content')

    <livewire:situation.create
        :inspection="$inspection"
    />

@endsection
