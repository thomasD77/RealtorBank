<section>

    <h1>{{ __('PLAATSBESCHRIJVING') }}</h1>

    <br>

    <div class="img--cover"
         style="background-image: url('{{ asset('assets/images/inspections/' . $inspection->media->first()->file_original) }}');
                         background-position: center;
                         background-size: cover; min-height: 450px">
    </div>

    <!-- Signatures -->
    @if($contract)
        <section class="signature main-sig">
            <div class="row keep">
                <hr>
                <p class="date-title">{{ __('Datum opgemaakt') }} | {{ $inspection->created_at }}</p>

                <div class="column-sig">
                    <h3>{{ __('UITVOERDER') }}</h3>
                    <p>{{ $inspection->user->firstName }} {{ $inspection->user->lastName }}</p>
                    <img src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}" alt="">
                </div>

                @if($contract->signature_owner)
                    <div class="column-sig">
                        <h3>{{ __('HUURDER') }}</h3>
                        <p>{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                        <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
                    </div>
                @endif

                @if($contract->signature_tenant)
                    <div class="column-sig">
                        @if($contract->situation->intrede != 2)
                            <h3 class="font-weight-bold mb-4">{{ __('VERHUURDER') }}</h3>
                            <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                            <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
                        @endif
                    </div>
                @endif
            </div>
        </section>
    @endif

</section>

<section class="inspection-information">
    <h2>{{ __('INTRO') }}</h2>

    <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
        @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
        eigendom van {{ $contract->situation->owner ? $contract->situation->owner->name : "" }} en verhuurd aan {{ $contract->situation->tenant ? $contract->situation->tenant->name : "" }},
        werd op datum van {{ \Carbon\Carbon::parse($inspection->date)->format('d-m-Y')}} een gedetailleerde plaatsbeschrijving bij
        @if($contract->situation->intrede == 1)
            Intrede
        @elseif($contract->situation->intrede === 0)
            Uittrede
        @elseif($contract->situation->intrede == 2)
            Aanvang van werken
        @endif gedaan.
        <br>
        De plaatsbeschrijving is uitgevoerd door {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }} voor {{ Auth()->user()->companyName }}</p>
        <br>
    <p>{!! Config('contract.inspection') !!}</p>

</section>
