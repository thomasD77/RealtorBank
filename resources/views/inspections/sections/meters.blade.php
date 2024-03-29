@if($meters->isNotEmpty())
    <section class="areas">
        <h2>{{ __('Meters') }}</h2>
        @foreach($meters as $item)
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
                    @if($item->reading)
                        <tr class="row--text--list">
                            <th>{{ __('Meterstand') }}</th>
                            <th>{{ $item->reading }}</th>
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

            @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::Meters->value ])

        @endforeach
    </section>
@endif

