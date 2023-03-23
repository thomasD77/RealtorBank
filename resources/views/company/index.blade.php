@extends('layout')

@section('content')
    <div class="dashborad-box mb-0">
        <h3 class="heading pt-0">{{ __('Bedrijfsgegevens') }}</h3>
        <div class="section-inforamation">

            <livewire:company.index/>

        </div>
    </div>

    <div class="dashborad-box mt-5">
        <h3 class="heading pt-0">{{ __('Adresgegevens') }}</h3>
        <div class="section-inforamation">

            <livewire:company.company-address/>

        </div>
    </div>

@endsection
