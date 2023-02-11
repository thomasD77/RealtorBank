@extends('inspection')

@section('content')

    <livewire:situation.index
        :inspection="$inspection"
    />

@endsection
