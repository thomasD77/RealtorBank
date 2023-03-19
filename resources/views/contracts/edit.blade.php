@extends('inspection')

@section('content')

    <livewire:contracts.edit
        :inspection="$inspection"
        :contract="$contract"
    />

@endsection
