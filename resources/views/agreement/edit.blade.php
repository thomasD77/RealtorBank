@extends('inspection')

@section('content')

    @if($agreement->pricing)
        <livewire:agreement.edit-with-pricing
            :inspection="$inspection"
            :situation="$situation"
            :quote="$quote"
            :agreement="$agreement"
        />
    @else
        <livewire:agreement.edit
            :inspection="$inspection"
            :situation="$situation"
            :quote="$quote"
            :agreement="$agreement"
        />
    @endif

@endsection
