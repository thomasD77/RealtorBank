@if($techniqueArea->isNotEmpty())
    <section class="techniques">
        <h2>{{ __('Technieken') }}</h2>
        @foreach($techniqueArea as $item)
            <table class="table">
                <tr class="row--head--list">
                    <th>{{  $item->technique->title }}</th>
                    <th></th>
                </tr>
                @if($item->type)
                    <tr class="row--text--list">
                        <th>{{ __('Type') }}</th>
                        <th>{{ $item->type }}</th>
                    </tr>
                @endif
                @if($item->fuel)
                    <tr class="row--text--list">
                        <th>{{ __('Brandstof') }}</th>
                        <th>{{ $item->fuel }}</th>
                    </tr>
                @endif
                @if($item->brand)
                    <tr class="row--text--list">
                        <th>{{ __('Merk') }}</th>
                        <th>{{ $item->brand }}</th>
                    </tr>
                @endif
                @if($item->model)
                    <tr class="row--text--list">
                        <th>{{ __('Model') }}</th>
                        <th>{{ $item->model }}</th>
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
                        <th class="">{{ $item->extra }}</th>
                        <th></th>
                    </tr>
                @endif
            </table>

        @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::Techniques->value ])

        @if($item->damages)
                @foreach($item->damages as $damage)
                    @if($damage->print_pdf)
                        <table class="table">
                            <tr class="damages">
                                <th>{{ $item->technique->title }} >> {{ __('Schade') }}</th>
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

    @endforeach
    </section>
@endif

