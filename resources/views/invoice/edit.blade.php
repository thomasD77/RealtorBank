@extends('inspection')

@section('content')

    <livewire:invoice.edit
        :inspection="$inspection"
        :situation="$situation"
        :invoice="$invoice"
    />

@endsection
