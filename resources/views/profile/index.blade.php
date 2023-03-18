@extends('layout')

@section('content')
    <div class="dashborad-box mb-0">
        <h3 class="heading pt-0">{{ __('Persoonlijke informatie') }}</h3>
        <div class="section-inforamation">

            <livewire:profile.index/>

        </div>
    </div>

@endsection
