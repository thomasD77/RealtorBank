@if($room->generalArea->order || $room->generalArea->cleanliness || $room->generalArea->painting ||
    $room->generalArea->analysis || $room->generalArea->extra)
    <table class="table">
        <tr class="row--head--list">
            <th>{{ $room->floor->title }} | {{ $room->title }} | {{ __('Overzicht') }}</th>
            <th></th>
        </tr>

        @if($room->generalArea->order)
            <tr class="row--text--list">
                <th>{{ __('Toestand') }}</th>
                <th>{{ $room->generalArea->order }}</th>
            </tr>
        @endif
        @if($room->generalArea->cleanliness)
            <tr class="row--text--list">
                <th>{{ __('Proper') }}</th>
                <th>{{ $room->generalArea->cleanliness }}</th>
            </tr>
        @endif
        @if($room->generalArea->painting)
            <tr class="row--text--list">
                <th>{{ __('Verfwerken') }}</th>
                <th>{{ $room->generalArea->painting }}</th>
            </tr>
        @endif
        @if($room->generalArea->analysis)
            <tr class="row--text--list">
                <th>{{ __('Analyse') }}</th>
                <th>{{ $room->generalArea->analysis }}</th>
            </tr>
        @endif
        @if($room->generalArea->extra)
            <tr class="row--text--list textareaExtra">
                <th>{{ __('Extra') }}</th>
                <th class="">{{ $room->generalArea->extra }}</th>
            </tr>
        @endif
    </table>
@endif

@include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::General->value, 'item' => $room->generalArea ])

@if($room->generalArea->damages)
    @foreach($room->generalArea->damages as $damage)
        @if($damage->situations()->where('damage_id', $damage->id)->where('situation_id', $situation->id)->pluck('print_pdf')->first() == 1)
            <table class="table">
                <tr class="damages">
                    <th>{{ $room->floor->title }} | {{ $room->title }} | {{ __('Overzicht') }} | {{ __('Schade') }}</th>
                    <th>{{ $damage->title }}</th>
                </tr>

                <tr class="row--text--list">
                    <th>{{ __('Datum') }}</th>
                    <th>{{ $damage->date }}</th>
                </tr>
                <tr class="row--text--list">
                    <th>{{ __('Beschrijving') }}</th>
                    <th>{{ $damage->description }}</th>
                </tr>
            </table>

            @include('inspections.sections.media' , [ 'folder' => 'damages' , 'item' => $damage ])
            
        @endif
    @endforeach
@endif






