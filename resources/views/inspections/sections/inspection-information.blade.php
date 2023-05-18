<section>

    <h1>
        {{ __('PLAATSBESCHRIJVING') }}
        @if($situation->intrede == 0 && !$claim)
            {{ __('UITTREDE') }}
        @elseif($situation->intrede == 0 && $claim)
            {{ __('HUURSCHADE') }}
        @elseif($situation->intrede == 1)
            {{ __('INTREDE') }}
        @elseif($situation->intrede == 2)
            <br>
            {{ __('AANVANG VAN WERKEN') }}
        @endif
    </h1>

    <br>

    @if($inspection->media->isNotEmpty())
    <div class="img--cover"
         style="background-image:
         url('{{ asset('assets/images/inspections/' . $inspection->media->first()->file_original) }}');
         background-position: center;
         background-size: cover; min-height: 450px">
    </div>
    @endif

    <!-- Signatures -->
    <section class="signature main-sig">
        <div class="row keep">
            @if($situation->date)
                <hr>
                <p class="date-title">{{ __('Opnamedatum') }}: {{ $situation->date }}</p>
            @endif

            {{--This is Intrede or Uittrede--}}
            @if($situation->intrede != 2)
                <div class="column-sig">
                    <h3>{{ __('HUURDER') }}</h3>
                    <p>{{  $situation->owner ? $situation->owner->name : "" }}</p>
                </div>

                <div class="column-sig">
                    @if($situation->intrede != 2)
                        <h3 class="font-weight-bold mb-4">{{ __('VERHUURDER') }}</h3>
                        <p>{{  $situation->tenant ? $situation->tenant->name : "" }}</p>
                    @endif
                </div>
            @else
                <div class="column-sig">
                    <h3>{{ __('EIGENAAR') }}</h3>
                    <p>{{  $situation->owner ? $situation->owner->name : "" }}</p>
                </div>

                <div class="column-sig">
                    <h3>{{ __('OPDRACHTGEVER') }}</h3>
                    <p>{{  $situation->client }}</p>
                </div>
            @endif

            <div class="column-sig">
                <h3>{{ __('UITVOERDER') }}</h3>
                <p>{{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }}</p>
                @if($inspection->user->signature)
                    <img src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}" alt="">
                @endif
            </div>
        </div>
    </section>
</section>

