<section>
    @if($inspection->owner_present || $inspection->tenant_present || $inspection->new_building || $inspection->inhabited || $inspection->furnished || $inspection->first_resident)
        <h2>{{ __('CONSENSUS') }}</h2>
        <h3 style="margin-top: 2rem">{{ __('CONTEXT') }}</h3>
        <table class="table" style="margin-top: 0">

            @if($inspection->owner_present)
                <tr class="row--text">
                    <th>{{ __('Eigenaar aanwezig') }}</th>
                    <th><img alt="icon" class="img-fluid" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
            @endif

            @if($inspection->tenant_present)
                <tr class="row--text">
                    <th>{{ __('Huurder aanwezig') }}</th>
                    <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
            @endif

            @if($inspection->new_building)
                <tr class="row--text">
                    <th>{{ __('Nieuwbouw') }}</th>
                    <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
            @endif

            @if($inspection->inhabited)
                <tr class="row--text">
                    <th>{{ __('Bewoond') }}</th>
                    <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
            @endif

            @if($inspection->furnished)
                <tr class="row--text">
                    <th>{{ __('Bemeubeld') }}</th>
                    <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
            @endif

            @if($inspection->first_resident)
                <tr class="row--text">
                    <th>{{ __('Eerste bewoner') }}</th>
                    <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                </tr>
           @endif

        </table>
    @endif

    <h3 style="margin-top: 2rem">{{ __('ALGEMENE BEPALINGEN') }}</h3>

    <p>{!! Config('contract.consensus') !!}</p>

        <!-- Signatures -->
        @if($contract)
            <section class="signature main-sig">
                <div class="row keep">

                    <p class="date-title">{{ __('Datum opgemaakt') }} | {{ $inspection->created_at->format('Y-m-d') }}</p>

                    <div class="column-sig">
                        <h3>{{ __('UITVOERDER') }}</h3>
                        <p>{{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }}</p>
                        <img src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}" alt="">
                    </div>

                    @if($contract->signature_owner)
                        <div class="column-sig">
                            <h3>{{ __('HUURDER') }}</h3>
                            <p>  {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif</p>
                            <p>{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                            <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
                        </div>
                    @endif

                    @if($contract->signature_tenant)
                        <div class="column-sig">
                            @if($contract->situation->intrede != 2)
                                <h3 class="font-weight-bold mb-4">{{ __('VERHUURDER') }}</h3>
                                <p>  {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                                    @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif</p>
                                <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                                <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
                            @endif
                        </div>
                    @endif
                </div>
            </section>
        @endif
</section>



