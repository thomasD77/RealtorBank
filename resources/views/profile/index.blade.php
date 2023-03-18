@extends('layout')

@section('content')
    <div class="dashborad-box mb-0">
        <h4 class="heading pt-0">{{ __('Persoonlijke informatie') }}</h4>
        <div class="section-inforamation">

            <livewire:profile.index/>

        </div>
    </div>

@endsection
