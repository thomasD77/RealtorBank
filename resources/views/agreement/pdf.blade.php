<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('Akkoord schade') }}</title>

        @include('agreement.css')

    </head>
    <body>
        <header style="margin-bottom: 3rem">
            PB: {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif
            @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
        </header>

        <div style="text-align: center; margin-top: 10px; margin-bottom: 0">
            <h2>{{ __('AKKOORD ') }} {{ __('SCHADE ') }}</h2>
        </div>

        @if($damages && $damages->isNotEmpty())
            <table class="table table-striped table-bordered" style="margin-top: 5px; padding-top: 5px">
                <thead>
                <tr>
                    <th class="location-column">{{ __('Locatie') }}</th>
                    <th class="title-column">{{ __('Titel') }}</th>
                    <th class="description-column">{{ __('Beschrijving') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($damages as $damage)
                    <tr>
                        <td class="location-column">
                            <strong>{{ $damage->damage_date ? $damage->damage_date : '-' }}</strong><br>
                            <p style="text-decoration: underline">
                                @if($damage->basicArea)
                                    {{ $damage->basicArea->floor->title ?? '-' }} >>
                                    {{ $damage->basicArea->room->title ?? '-' }} >>
                                    {{ $damage->basicArea->area->title ?? '-' }}
                                @elseif($damage->general)
                                    {{ $damage->general->room->floor->title ?? '-' }} >>
                                    {{ $damage->general->room->title ?? '-' }}
                                @elseif($damage->specificArea)
                                    {{ $damage->specificArea->room->floor->title ?? '-' }} >>
                                    {{ $damage->specificArea->room->title ?? '-' }} >>
                                    {{ $damage->specificArea->specific->title ?? '-' }}
                                @elseif($damage->conformArea)
                                    {{ $damage->conformArea->floor->title ?? '-' }} >>
                                    {{ $damage->conformArea->room->title ?? '-' }} >>
                                    {{ $damage->conformArea->conform->title ?? '-' }}
                                @elseif($damage->techniqueArea)
                                    {{ $damage->techniqueArea->technique->title ?? '-' }}
                                @elseif($damage->outdoorArea)
                                    {{ $damage->outdoorArea->room->title ?? '-' }} >>
                                    {{ $damage->outdoorArea->outdoor->title ?? '-' }}
                                @endif
                            </p>

                            {{--@include('livewire.quote.calculations')--}}

                        </td>
                        <td class="title-column">{{ $damage->damage_title ?? '-' }}</td>
                        <td class="description-column">{{ $damage->damage_description ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
                {{--<tfoot>
                <tr class="py-4">
                    <td colspan="3" class="text-right font-weight-bold">{{ __('Totaal') }}: <br>
                        <small>*{{ __('Totaal van alle opgemaakte prijzen incl. de vetustate.') }} <br></small>
                    </td>
                    <td class="font-weight-bold text-right">{{ number_format($quoteTotal, 2, ',', '.') }} €
                        <br>
                        <small>*{{ __('incl. btw') }} <br></small>
                    </td>
                </tr>
                </tfoot>--}}
            </table>
            <div class="col-12">
                <p>Opgemaakt op: {{ today()->format('d-m-Y')}}</p>
            </div>
        @else
            <p>{{ __('Geen schades geselecteerd.') }}</p>
        @endif

        <!-- Signatures -->
        <section class="signature" style="margin-top: 25px; margin-bottom: 8px;">

            <div class="row">
                <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                    @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                    , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                    en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd een schade opmeting gedaan
                    door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
                </p>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="column">
                    <strong>{{ __('HUURDERS') }}</strong><br>
                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                    <p>{{  $agreement->situation->tenant ? $agreement->situation->tenant->name : "" }}</p>
                    @if($agreement->signature_tenant)
                        <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_tenant) }}">
                    @endif
                </div>

                <div class="column-half text-right">
                    <strong>{{ __('VERHUURDERS') }}</strong><br>
                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                    <p>{{  $agreement->situation->owner ? $agreement->situation->owner->name : "" }}</p>
                    @if($agreement->signature_owner)
                        <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_owner) }}">
                    @endif
                </div>
            </div>
        </section>

        <footer>
            {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : ""  }} | {{ __('EstateMetrics') }} | &copy; {{ now()->format('Y') }}
        </footer>
    </body>
</html>
