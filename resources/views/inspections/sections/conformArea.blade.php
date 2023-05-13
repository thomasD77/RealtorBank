@foreach($room->conformAreas as $item)
    @if($item->material || $item->color || $item->present ||
        $item->single || $item->multiple || $item->brand ||
        $item->electronics || $item->phone || $item->internet ||
        $item->audio || $item->type || $item->count ||
        $item->analysis || $item->extra)
        <section>
            <table class="table">
            <tr class="row--head--list">
                <th>{{ $room->floor->title }} | {{ $item->room->title }} | {{  $item->conform->title }}</th>
                <th></th>
            </tr>
            @if($item->material)
                <tr class="row--text--list">
                    <th>{{ __('Materiaal') }}</th>
                    <th>{{ $item->material }}</th>
                </tr>
            @endif
            @if($item->color)
                <tr class="row--text--list">
                    <th>{{ __('Kleur') }}</th>
                    <th>{{ $item->color }}</th>
                </tr>
            @endif
            @if($item->present)
                <tr class="row--text--list">
                    <th>{{ __('Aanwezig') }}</th>
                    <th>{{ $item->present }}</th>
                </tr>
            @endif
            @if($item->single)
                <tr class="row--text--list">
                    <th>{{ __('Enkelvoudig') }}</th>
                    <th>{{ $item->single }}</th>
                </tr>
            @endif
            @if($item->multiple)
                <tr class="row--text--list">
                    <th>{{ __('Meervoudig') }}</th>
                    <th>{{ $item->multiple }}</th>
                </tr>
            @endif
            @if($item->brand)
                <tr class="row--text--list">
                    <th>{{ __('Merk') }}</th>
                    <th>{{ $item->brand }}</th>
                </tr>
            @endif
            @if($item->electronics)
                <tr class="row--text--list">
                    <th>{{ __('Elektronica') }}</th>
                    <th>{{ $item->electronics }}</th>
                </tr>
            @endif
            @if($item->phone)
                <tr class="row--text--list">
                    <th>{{ __('Telefoon') }}</th>
                    <th>{{ $item->phone }}</th>
                </tr>
            @endif
            @if($item->internet)
                <tr class="row--text--list">
                    <th>{{ __('Internet') }}</th>
                    <th>{{ $item->internet }}</th>
                </tr>
            @endif
            @if($item->audio)
                <tr class="row--text--list">
                    <th>{{ __('Audio') }}</th>
                    <th>{{ $item->audio }}</th>
                </tr>
            @endif
            @if($item->type)
                <tr class="row--text--list">
                    <th>{{ __('Type') }}</th>
                    <th>{{ $item->type }}</th>
                </tr>
            @endif
            @if($item->count)
                <tr class="row--text--list">
                    <th>{{ __('Aantal') }}</th>
                    <th>{{ $item->count }}</th>
                </tr>
            @endif
            @if($item->analysis)
                <tr class="row--text--list">
                    <th>{{ __('Analyse') }}</th>
                    <th>{{ $item->analysis }}</th>
                </tr>
            @endif
            @if($item->extra)
                <tr class="row--text--list textareaExtra">
                    <th>{{ __('Extra') }}</th>
                    <th>{{ $item->extra }}</th>
                </tr>
            @endif
        </table>
        </section>
    @endif

    @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::ConformArea->value ])
@endforeach

