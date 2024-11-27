@extends('inspection')

@section('content')

    @if($agreement->pricing)
        <livewire:agreement.create-with-pricing
            :inspection="$inspection"
            :situation="$situation"
            :quote="$quote"
            :agreement="$agreement"
        />
    @else
        <livewire:agreement.create
            :inspection="$inspection"
            :situation="$situation"
            :quote="$quote"
            :agreement="$agreement"
        />
    @endif

@endsection
