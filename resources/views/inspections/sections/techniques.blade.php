<section class="techniques">
    <h2>{{ __('Technieken') }}</h2>
    @if($techniqueArea)
        @foreach($techniqueArea as $item)
            @if($item->type || $item->analysis || $item->fuel || $item->brand || $item->model || $item->type || $item->count || $item->extra)
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
                    @if($item->analysis)
                        <tr class="row--text--list">
                            <th>{{ __('Analyse') }}</th>
                            <th>{{ $item->analysis }}</th>
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
                    @if($item->extra)
                        <tr class="row--text--list textareaExtra">
                            <th class="">{{ $item->extra }}</th>
                            <th></th>
                        </tr>
                    @endif
                </table>
            @endif

            @if($item->media)
                @for ($i = 0; $i <= count($item->media); $i++ )
                    <div class="row">
                        @if(isset($item->media[$i]))
                            <div class="column">
                                <img src="{{ asset('assets/images/technique/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">
                            </div>
                        @endif
                        @php
                            $i += 1;
                        @endphp
                        @if(isset($item->media[$i]))
                            <div class="column">
                                <img src="{{ asset('assets/images/technique/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">
                            </div>
                        @endif
                    </div>
                @endfor
            @endif

        @endforeach
    @endif
</section>
