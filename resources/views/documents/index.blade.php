@extends('inspection')

@section('content')

    <livewire:documents.index
        :inspection="$inspection"
    />

@endsection
