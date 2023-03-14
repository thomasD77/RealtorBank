<section class="areas">
    @if($meters)

        <h2>{{ __('Meters') }}</h2>

        @foreach($meters as $item)
            @if($item->reference || $item->EAN || $item->date || $item->media->count() > 0)
                <table class="table">
                    <tr class="row--head--list">
                        <th>{{ $item->title }}</th>
                        <th></th>
                    </tr>
                    @if($item->reference)
                        <tr class="row--text--list">
                            <th>{{ __('Referentie') }}</th>
                            <th>{{ $item->reference }}</th>
                        </tr>
                    @endif
                    @if($item->EAN)
                        <tr class="row--text--list">
                            <th>{{ __('EAN') }}</th>
                            <th>{{ $item->EAN }}</th>
                        </tr>
                    @endif
                    @if($item->date)
                        <tr class="row--text--list">
                            <th>{{ __('Datum') }}</th>
                            <th>{{ $item->date }}</th>
                        </tr>
                    @endif
                </table>
            @endif

            @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::Meters->value ])

        @endforeach
    @endif
</section>
