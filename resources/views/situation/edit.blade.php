@extends('inspection')

@section('content')

    <livewire:situation.edit
        :inspection="$inspection"
        :situation="$situation"
    />

@endsection
