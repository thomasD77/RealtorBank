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
                <th>{{ __('Netheid') }}</th>
                <th>{{ $room->generalArea->cleanliness }}</th>
            </tr>
        @endif
        @if($room->generalArea->painting)
            <tr class="row--text--list">
                <th>{{ __('Schilderwerken') }}</th>
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

    @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::General->value, 'item' => $room->generalArea ])
@endif
