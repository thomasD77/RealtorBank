@extends('inspection')

@section('content')

    <livewire:damage.edit
        :inspection="$inspection"
        :damage="$damage"
    />

@endsection
