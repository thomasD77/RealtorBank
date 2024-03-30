<section class="slot">
    @if($inspection->owner_present || $inspection->tenant_present || $inspection->new_building || $inspection->inhabited || $inspection->furnished || $inspection->first_resident)
        <h2>{{ __('CONSENSUS') }}</h2>
        <h3 style="margin-top: 2rem; margin-bottom: 0">{{ __('CONTEXT') }}</h3>
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

    <section>
        <h3 style="margin-top: 2rem">{{ __('ALGEMENE BEPALINGEN') }}</h3>
        @if($situation->intrede === 0)
            <div class="row">
                <p>{!! Config('contract.slot_uit') !!}</p>
            </div>
        @elseif($situation->intrede == 1)
            <div class="row">
                <p>{!! Config('contract.slot_in') !!}</p>
            </div>
        @elseif($situation->intrede == 2)
            <div class="row">
                <p>{!! Config('contract.slot_aanvang') !!}</p>
            </div>
        @endif
    </section>


    <!-- Signatures -->
    <section class="signature main-sig">
            <div class="row keep">

                @if($situation->date)
                    <hr>
                    <p class="date-title">{{ __('Opnamedatum') }}: {{ $situation->date }}</p>
                @endif

                {{--This is Intrede or Uittrede--}}
{{--                @if($situation->intrede != 2)--}}
{{--                <div class="column-sig">--}}
{{--                    <h3>{{ __('HUURDER') }}</h3>--}}
{{--                    <p>{{  $situation->tenant ? $situation->tenant->name : "" }}</p>--}}
{{--                    --}}{{-- <p> {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif--}}
{{--                    --}}{{-- @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif</p>--}}
{{--                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>--}}
{{--                    @if($claim->signature_tenant)--}}
{{--                        <img src="{{ asset('assets/signatures'. '/' . $claim->signature_tenant) }}" alt="">--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <div class="column-sig">--}}
{{--                    <h3>{{ __('VERHUURDER') }}</h3>--}}
{{--                    --}}{{--  <p> {{  $inspection->address->address }} @if($inspection->address->postBus) ,{{  $inspection->address->postBus }} @endif--}}
{{--                    --}}{{--  @if($inspection->address->zip || $inspection->address->city) , {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif</p>--}}
{{--                    <p>{{  $situation->owner ? $situation->owner->name : "" }}</p>--}}
{{--                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>--}}
{{--                    @if($claim->signature_owner)--}}
{{--                        <img src="{{ asset('assets/signatures'. '/' . $claim->signature_owner) }}" alt="">--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                @else--}}
{{--                    <div class="column-sig">--}}
{{--                        <h3>{{ __('EIGENAAR') }}</h3>--}}
{{--                        <p>{{  $situation->owner ? $situation->owner->name : "" }}</p>--}}
{{--                        <p> {{  $inspection->address->address }} @if($inspection->address->postBus) ,{{  $inspection->address->postBus }} @endif--}}
{{--                        @if($inspection->address->zip || $inspection->address->city) , {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif</p>--}}
{{--                        <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>--}}
{{--                    </div>--}}

{{--                    <div class="column-sig">--}}
{{--                        <h3>{{ __('OPDRACHTGEVER') }}</h3>--}}
{{--                        <p>{{  $situation->client }}</p>--}}
{{--                        @if($situation->address)--}}
{{--                            <p> {{  $situation->address->address }} @if($situation->address->postBus), {{  $situation->address->postBus }} @endif--}}
{{--                            @if($situation->address->zip || $situation->address->city), {{  $situation->address->zip }} {{  $situation->address->city }} @endif</p>--}}
{{--                        @endif--}}
{{--                        <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div class="column-sig">
                    <h3>{{ __('UITVOERDER') }}</h3>
                    <p>{{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }}</p>
                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                    @if($inspection->user->signature)
                        <img src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}" alt="">
                    @else
                        <div class="spacer"></div>
                    @endif
                </div>

            </div>
        </section>
</section>



