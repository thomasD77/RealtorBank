@extends('layout')

@section('content')
    <div class="dashborad-box mb-0">
        <h3 class="heading pt-0">{{ __('Persoonlijke informatie') }}</h3>
        <div class="section-inforamation">

            <livewire:profile.index/>

        </div>
    </div>

    <div class="dashborad-box mt-5">
        <h3 class="heading pt-0">{{ __('Mijn adresgegevens') }}</h3>
        <div class="section-inforamation">

            <livewire:profile.profile-address/>

        </div>
    </div>

@endsection
