@extends('layout')

@section('content')
    <div class="dashborad-box mb-0">
        @if (session()->has('success'))
            <div class="btn btn-success flash_message mb-3">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="heading pt-0">{{ __('Persoonlijke informatie') }}</h3>
        <div class="section-inforamation">

            <livewire:profile.index/>

        </div>
    </div>

    <div class="dashborad-box mt-5">
        <h3 class="heading pt-0">{{ __('Logo(s)') }}</h3>

        <div class="section-inforamation mt-5">

            <livewire:profile.logo/>

        </div>
    </div>

    <div class="dashborad-box mt-5">
        <h3 class="heading pt-0">{{ __('Mijn adresgegevens') }}</h3>
        <div class="section-inforamation">

            <livewire:profile.profile-address/>

        </div>
    </div>

    <div class="dashborad-box mt-5">
        <h3 class="heading pt-0">{{ __('Mijn handtekening') }}</h3>
        <div class="section-inforamation">

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('create.signature') }}">
                        <input type="hidden" name="user" value="1">
                        @csrf
                        <div class="col-md-11">
                            <br/>
                            <div id="sig"></div>
                            <br/>
                            <div class="text-right">
                                <button id="clear" class="btn btn-danger btn-sm">{{ __('wissen') }}</button>
                            </div>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-common m-3">{{ __('Submit') }}</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . Auth()->user()->signature) }}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
