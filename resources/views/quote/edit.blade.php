@extends('inspection')

@section('content')

    <livewire:quote.edit
        :inspection="$inspection"
        :situation="$situation"
        :quote="$quote"
    />

@endsection
