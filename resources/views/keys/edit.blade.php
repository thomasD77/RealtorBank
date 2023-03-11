@extends('inspection')

@section('content')

    <livewire:keys.edit
        :inspection="$inspection"
        :selectedKey="$key"
    />

@endsection
