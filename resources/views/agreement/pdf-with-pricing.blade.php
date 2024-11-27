<html>
    <style>
        /* Table layout and column widths */
        .table {
            table-layout: fixed; /* Forces fixed column widths */
            width: 100%; /* Full width of the container */
            border-collapse: collapse; /* Removes spacing between table cells */
        }

        /* Styling table headers and cells */
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
            text-align: left;
            word-wrap: break-word; /* Ensures text wraps within cells */
        }

        /* Specific column widths */
        .location-column {
            width: 50%; /* Adjusts the width of the first column */
        }
        .title-column{
            width: 20%; /* Equal width for the remaining columns */
        }
        .description-column{
            width: 20%; /* Equal width for the remaining columns */
        }
        .approved-column {
            width: 5%; /* Equal width for the remaining columns */
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('Akkoord schade') }}</title>
    </head>
    <body>
        <header style="margin-bottom: 3rem">
            PB: {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif
            @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
        </header>

        <div style="text-align: center; margin-top: 10px">
            <h2>{{ __('AKKOORD ') }} <br> {{ __('SCHADE & PRIJZEN') }}</h2>
        </div>

        @if($damages && $damages->isNotEmpty())
            <table class="table table-striped table-bordered">
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

                            @include('livewire.quote.calculations')

                        </td>
                        <td class="title-column">{{ $damage->damage_title ?? '-' }}</td>
                        <td class="description-column">{{ $damage->damage_description ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="py-4">
                    <td colspan="3" class="text-right font-weight-bold">{{ __('Sub-Totaal') }}: <br>
                        <small>*{{ __('Totaal van alle opgemaakte prijzen incl. de vetustate.') }} <br></small>
                    </td>
                    <td class="font-weight-bold text-right">{{ number_format($subsTotal, 2, ',', '.') }} €
                        <br>
                        <small>*{{ __('incl. btw') }} <br></small>
                    </td>
                </tr>
                <tr class="py-4">
                    <td colspan="3" class="text-right font-weight-bold">{{ __('Gecorrigeerd totaal') }}: <br>
                        <small>*{{ __('Geef een bedrag in, geen percentage.') }} <br></small>
                    </td>
                    <td class="font-weight-bold text-right" style="width: 100px; background-color: yellow">
                        {{ __('€') }}
                        <input
                            type="number"
                            step="0.01"
                            placeholder="{{ $adjustedTotal ?? 'Voer bedrag in...' }}"
                            class="p-2 border rounded"
                            style="width: 100px; background-color: yellow"
                        />
                    </td>
                </tr>
                <tr class="py-4">
                    <td colspan="3" class="text-right font-weight-bold">{{ __('Totaal') }}: <br>
                        <small>*{{ __('Totaal van alle opgemaakte prijzen incl. de vetustate & gecorigeerd bedrag.') }} <br></small>
                    </td>
                    <td class="font-weight-bold text-right">{{ number_format($agreement->total, 2, ',', '.') }} €
                        <br>
                        <small>*{{ __('incl. btw') }} <br></small>
                    </td>
                </tr>
                <tr class="py-4">
                    <td colspan="1" class="text-right font-weight-bold">{{ __('Notities') }}: <br>
                        <small>*{{ __('Extra notities die in rekening moeten worden gebracht.') }} <br></small>
                    </td>
                    <td colspan="3" class="font-weight-bold text-right">
                                    <textarea
                                        placeholder="{{ $remarks ?? 'Type your remarks here...' }}"
                                        class="w-full p-2 border rounded"
                                    ></textarea>
                    </td>
                </tr>
                </tfoot>
            </table>
        @else
            <p>{{ __('Geen schades geselecteerd.') }}</p>
        @endif

        <div class="row p-5 the-five">
            <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd een schade opmeting gedaan
                door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
            </p>
        </div>

        <!-- Signatures -->
        <section class="signature">
            <div class="row p-5 the-five">
                <div class="col-12">
                    <p>{{ today()->format('d-m-Y')}}</p>
                </div>

                <div class="col-md-6 ">
                    <strong>{{ __('HUURDERS') }}</strong><br>
                    <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                    <p>{{  $agreement->situation->tenant ? $agreement->situation->tenant->name : "" }}</p>
                    @if($agreement->signature_tenant)
                        <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_tenant) }}">
                    @endif
                </div>

                <div class="col-md-6 text-right">
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
