@extends('inspection')

@section('content')

    <livewire:documents.edit
        :inspection="$inspection"
        :document="$document"
    />

@endsection
