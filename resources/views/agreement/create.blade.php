@extends('inspection')

@section('content')

    <livewire:agreement.create
        :inspection="$inspection"
        :situation="$situation"
        :quote="$quote"
        :agreement="$agreement"
    />

@endsection
