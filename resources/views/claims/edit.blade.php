@extends('inspection')

@section('content')

    <livewire:claims.edit
        :inspection="$inspection"
        :claim="$claim"
    />

@endsection
