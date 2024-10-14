<div>
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

    <div class="single-add-property">
        <h3>{{ __('Offerte regels') }}</h3>
        <div class="property-form-group">
            @if($quoteDamages && $quoteDamages->isNotEmpty())
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="location-column">{{ __('Locatie') }}</th>
                        <th class="title-column">{{ __('Titel') }}</th>
                        <th class="description-column">{{ __('Beschrijving') }}</th>
                        <th class="approved-column text-center" style="font-size: 12px">{{ __('Akkoord') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quoteDamages as $damage)
                        <tr>
                            <td class="location-column">
                                <strong>{{ $damage->damage_date ? $damage->damage_date : '-' }}</strong><br>
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

                                @include('livewire.quote.calculations')

                            </td>
                            <td class="title-column">{{ $damage->damage_title ?? '-' }}</td>
                            <td class="description-column">{{ $damage->damage_description ?? '-' }}</td>
                            <td class="approved-column text-center">
                                <input type="checkbox" wire:click="toggleApproval({{ $damage->id }})" {{ $damage->approved ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>{{ __('Geen offerte beschikbaar.') }}</p>
            @endif
        </div>
    </div>
</div>
