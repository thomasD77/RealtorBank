<div>
    @if($damages)
        @foreach($damages as $damage)
            @if($damage->situations()->where('damage_id', $damage->id)->where('situation_id', $situation->id)->pluck('print_pdf')->first() == 1)
                <table class="table">
                    <tr class="damages">
                        <th>{{ $room->floor->title }} | {{ $item->room->title }} | {{  $title }} >> {{ __('Schade') }}</th>
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
</div>
