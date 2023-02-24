<section class="areas">
    @if($inspection)

        <h2>{{ __('Interieur') }}</h2>

        @foreach($inspection->rooms as $room)
            @foreach($room->basicAreas as $item)
                @if($item->material || $item->color || $item->plinth || $item->analysis || $item->type || $item->handle || $item->lists || $item->key || $item->doorPump || $item->doorStop || $item->plaster || $item->finish || $item->ventilationGrille || $item->glazing || $item->windowsill || $item->rollerShutter || $item->windowDecoration || $item->hor || $item->fallProtection || $item->energy || $item->extra)
                    <table class="table">
                        <tr class="row--head--list">
                            <th>{{ $room->title }} | {{  $item->area->title }}</th>
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
                        @if($item->plinth)
                            <tr class="row--text--list">
                                <th>{{ __('Plinten') }}</th>
                                <th>{{ $item->plinth }}</th>
                            </tr>
                        @endif
                        @if($item->analysis)
                            <tr class="row--text--list">
                                <th>{{ __('Analyse') }}</th>
                                <th>{{ $item->analysis }}</th>
                            </tr>
                        @endif
                        @if($item->type)
                            <tr class="row--text--list">
                                <th>{{ __('Type') }}</th>
                                <th>{{ $item->type }}</th>
                            </tr>
                        @endif
                        @if($item->handle)
                            <tr class="row--text--list">
                                <th>{{ __('Klink') }}</th>
                                <th>{{ $item->handle }}</th>
                            </tr>
                        @endif
                        @if($item->lists)
                            <tr class="row--text--list">
                                <th>{{ __('Lijsten') }}</th>
                                <th>{{ $item->lists }}</th>
                            </tr>
                        @endif
                        @if($item->key)
                            <tr class="row--text--list">
                                <th>{{ __('Sleutel') }}</th>
                                <th class="">{{ $item->key }}</th>
                            </tr>
                        @endif
                        @if($item->doorPump)
                            <tr class="row--text--list">
                                <th>{{ __('Deurpomp') }}</th>
                                <th class="">{{ $item->doorPump }}</th>
                            </tr>
                        @endif
                        @if($item->doorStop)
                            <tr class="row--text--list">
                                <th>{{ __('Deurstop') }}</th>
                                <th class="">{{ $item->doorStop }}</th>
                            </tr>
                        @endif
                        @if($item->plaster)
                            <tr class="row--text--list">
                                <th>{{ __('Pleisterwerk') }}</th>
                                <th class="">{{ $item->plaster }}</th>
                            </tr>
                        @endif
                        @if($item->finish)
                            <tr class="row--text--list">
                                <th>{{ __('Afwerking') }}</th>
                                <th class="">{{ $item->finish }}</th>
                            </tr>
                        @endif
                        @if($item->ventilationGrille)
                            <tr class="row--text--list">
                                <th>{{ __('Ventilatierooster') }}</th>
                                <th class="">{{ $item->ventilationGrille }}</th>
                            </tr>
                        @endif
                        @if($item->glazing)
                            <tr class="row--text--list">
                                <th>{{ __('Beglazing') }}</th>
                                <th class="">{{ $item->glazing }}</th>
                            </tr>
                        @endif
                        @if($item->windowsill)
                            <tr class="row--text--list">
                                <th>{{ __('Vensterbank') }}</th>
                                <th class="">{{ $item->windowsill }}</th>
                            </tr>
                        @endif
                        @if($item->rollerShutter)
                            <tr class="row--text--list">
                                <th>{{ __('Rolluiken') }}</th>
                                <th class="">{{ $item->rollerShutter }}</th>
                            </tr>
                        @endif
                        @if($item->windowDecoration)
                            <tr class="row--text--list">
                                <th>{{ __('Raamdecoratie') }}</th>
                                <th class="">{{ $item->windowDecoration }}</th>
                            </tr>
                        @endif
                        @if($item->hor)
                            <tr class="row--text--list">
                                <th>{{ __('Hor') }}</th>
                                <th class="">{{ $item->hor }}</th>
                            </tr>
                        @endif
                        @if($item->fallProtection)
                            <tr class="row--text--list">
                                <th>{{ __('Valbeveiliging') }}</th>
                                <th class="">{{ $item->fallProtection }}</th>
                            </tr>
                        @endif
                        @if($item->energy)
                            <tr class="row--text--list">
                                <th>{{ __('Energie') }}</th>
                                <th class="">{{ $item->energy }}</th>
                            </tr>
                        @endif
                        @if($item->extra)
                            <tr class="row--text--list textareaExtra">
                                <th>{{ __('Extra') }}</th>
                                <th class="">{{ $item->extra }}</th>
                            </tr>
                        @endif
                    </table>
                @endif
            @endforeach


{{--            @if($item->media)--}}
{{--                @for ($i = 0; $i <= count($item->media); $i++ )--}}
{{--                    <div class="row">--}}
{{--                        @if(isset($item->media[$i]))--}}
{{--                            <div class="column">--}}
{{--                                <img src="{{ asset('assets/images/area/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @php--}}
{{--                            $i += 1;--}}
{{--                        @endphp--}}
{{--                        @if(isset($item->media[$i]))--}}
{{--                            <div class="column">--}}
{{--                                <img src="{{ asset('assets/images/area/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                @endfor--}}
{{--            @endif--}}

        @endforeach
    @endif
</section>
