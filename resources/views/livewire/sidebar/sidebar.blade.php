<ul id="{{ $responsive }}" class="sidebar">
    <li>
        <a class="custom-sidebar-padding" href="{{ route('inspection.edit', $inspection) }}">
            <i class="fa fa-map-marker text-danger"></i>{{ Str::limit($inspection->title, 50) }}
        </a>
    </li>

    @include('livewire.sidebar.sidebar_blocks.interior')

    @if($exterior == $activeCat || $activeCat == null)
        {{--Exterieur--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseExterieur"
               role="button"
               aria-expanded="false"
               aria-controls="collapseExterieur"
               wire:click="toggleCategory({{ $exterior }})"
               class="custom-sidebar-padding @if($exterior == $activeCat) active @endif"
            >

                @if($exterior == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Exterieur') }}
                @else
                    <i class="fa fa-folder text-warning"></i>{{ __('Exterieur') }}
                @endif
            </a>
            <div class="collapse @if($exterior == $activeCat) show @endif"

                 id="collapseExterieur"
            >
                <ul class="special">

                    {{-- Building--}}
                    @if($building == $activeFloor || $activeFloor == null)
                        <a data-toggle="collapse"
                           href="#collapseBuilding"
                           role="button"
                           aria-expanded="false"
                           aria-controls="collapseBuilding"
                           wire:click="toggleFloor({{ $building }})"
                        >
                            @if($building == $activeFloor)
                                <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Algemeen gebouw') }}
                            @else
                                <i class="fa fa-bookmark"></i>{{ __('Algemeen gebouw') }}
                            @endif

                        </a>
                        <div class="collapse @if($building == $activeFloor) show @endif"

                             id="collapseBuilding"
                        >
                            @if($buildingParam)
                                @foreach($buildingParam as $building)
                                    @if($building->id == $activeRoom || $activeRoom == null)
                                    <li class="mx-2">
                                        <a data-toggle="collapse"
                                           href="#collapseRoom{{ $building->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseRoom"
                                           wire:click="toggleRoom({{ $building->id }})"
                                        >
                                            @if($building->id == $activeRoom)
                                                <i class="fa fa-angle-down text-warning fa-2x"></i>{{ $building->title }}
                                            @else
                                                <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $building->title }}</span>
                                            @endif

                                        </a>

                                        <div class="collapse @if($building->id == $activeRoom) show @endif"

                                             id="collapseRoom{{ $building->id }}"
                                        >
                                            <ul>
                                                <li>
                                                    <a href="{{ route('area.general',  [$inspection, $building]) }}">
                                                        <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                                    </a>
                                                </li>

                                                @foreach($building->outdoorAreas as $item)
                                                    <li class="mx-3">
                                                        <a class="@if($activeArea == $item->outdoor->id) activeLink @endif" href="{{ route('area.outdoor', [$inspection, $item->outdoor]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->outdoor->title }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endif

                    {{--Driveway--}}
                    @if($driveWay == $activeFloor || $activeFloor == null)
                        <a data-toggle="collapse"
                           href="#collapseDriveWay"
                           role="button"
                           aria-expanded="false"
                           aria-controls="collapseDriveWay"
                           wire:click="toggleFloor({{ $driveWay }})"
                        >
                            @if($driveWay == $activeFloor)
                                <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Algemeen aanleg') }}
                            @else
                                <i class="fa fa-bookmark"></i>{{ __('Algemeen aanleg') }}
                            @endif
                        </a>
                        <div class="collapse @if($driveWay == $activeFloor) show @endif"

                             id="collapseDriveWay"
                        >
                            @if($driveWayParam)
                                @foreach($driveWayParam as $room)
                                    @if($room->id == $activeRoom || $activeRoom == null)
                                        <li class="mx-2">
                                            <a data-toggle="collapse"
                                               href="#collapseRoom{{ $room->id }}"
                                               role="button" aria-expanded="false"
                                               aria-controls="collapseRoom"
                                               wire:click="toggleRoom({{ $room->id }})"
                                            >
                                                @if($room->id == $activeRoom)
                                                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ $room->title }}
                                                @else
                                                    <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                                                @endif

                                            </a>

                                            <div class="collapse @if($room->id == $activeRoom) show @endif"

                                                 id="collapseRoom{{ $room->id }}"
                                            >
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('area.general',  [$inspection, $room]) }}">
                                                            <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                                        </a>
                                                    </li>

                                                    @foreach($room->outdoorAreas->where('room_id', $room->id) as $item)
                                                        <li class="mx-3">
                                                            <a class="@if($activeArea == $item->outdoor->id) activeLink @endif" href="{{ route('area.outdoor', [$inspection, $item->outdoor]) }}">
                                                                <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->outdoor->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endif
                </ul>
            </div>
        </li>
    @endif

    @if($outHouse == $activeCat || $activeCat == null)
        {{--    OutHouse--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseOuthouse"
               role="button"
               aria-expanded="false"
               aria-controls="collapseOuthouse"
               wire:click="toggleCategory({{ $outHouse }})"
               class="custom-sidebar-padding @if($outHouse == $activeCat) active @endif"
            >
                @if($outHouse == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Bijgebouw') }}
                @else
                    <i class="fa fa-folder text-warning"></i>{{ __('Bijgebouw') }}
                @endif
            </a>
            <div class="collapse @if($outHouse == $activeCat) show @endif"

                 id="collapseOuthouse"
            >

                <ul class="special">
                    {{--   OutHouseIn--}}
                    @if($outHouseIn == $activeFloor || $activeFloor == null)
                        @if($activeRoom != $outHouseEx)
                            <a data-toggle="collapse"
                               href="#collapseOutHouseIn"
                               role="button"
                               aria-expanded="false"
                               aria-controls="collapseOutHouseIn"
                               wire:click="toggleFloor({{ $outHouseIn }})"
                            >
                                @if($outHouse == $activeFloor)
                                    @if($outHouseInParam)
                                        <i class="fa fa-angle-down text-warning fa-2x"></i>{{ $outHouseInParam[0]['title'] }}
                                    @endif
                                @else
                                    @if($outHouseInParam)
                                        <i class="fa fa-bookmark"></i>{{ $outHouseInParam[0]['title'] }}
                                    @endif
                                @endif
                            </a>
                            <div class="collapse @if($outHouseIn == $activeFloor) show @endif"

                                 id="collapseOutHouseIn"
                            >
                                <ul>
                                    @if($outHouseInParam)
                                        @foreach($outHouseInParam as $room)
                                            <li>
                                                <a href="{{ route('area.general',  [$inspection, $room]) }}">
                                                    <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                                </a>
                                            </li>
                                            {{--          Basic--}}
                                            @if($activeTemplate == \App\Enums\TemplateKey::Basic->value || $activeTemplate == null)
                                                <li>
                                                    <a data-toggle="collapse"
                                                       href="#collapseBasic{{ $room->id }}"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapseExample"
                                                       wire:click="toggleTemplate('{{ $basic }}')"
                                                    >
                                                        @if($activeTemplate == \App\Enums\TemplateKey::Basic->value)
                                                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Standaard') }}
                                                        @else
                                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Standaard') }}
                                                        @endif
                                                    </a>
                                                    <div>
                                                        <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"

                                                            id="collapseBasic{{ $room->id }}"
                                                        >
                                                            @foreach(\App\Models\BasicArea::where('room_id', $room->id)->orderBy('order', 'asc')->orderBy('sidebar_count', 'asc')->get() as $item)
                                                                <li class="mx-3">
                                                                    <a class="@if($activeArea == $item->area->id) activeLink @endif" href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->sidebar_count }}@if($item->sidebar_count).@endif{{ $item->area->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif

                                            {{--         Spec--}}
                                            @if($activeTemplate == \App\Enums\TemplateKey::Specific->value || $activeTemplate == null)
                                                <li>
                                                    <a data-toggle="collapse"
                                                       href="#collapseSpec{{ $room->id }}"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapseExample"
                                                       wire:click="toggleTemplate('{{ $specific }}')"
                                                    >
                                                        @if($activeTemplate == \App\Enums\TemplateKey::Specific->value)
                                                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Typerend') }}
                                                        @else
                                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Typerend') }}
                                                        @endif
                                                    </a>
                                                    <div>
                                                        <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"

                                                            id="collapseSpec{{ $room->id }}"
                                                        >
                                                            @foreach($room->specificAreas as $item)
                                                                <li class="mx-3">
                                                                    <a class="@if($activeArea == $item->specific->id) activeLink @endif" href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif

                                            {{-- Conform--}}
                                            @if($activeTemplate == \App\Enums\TemplateKey::Conform->value || $activeTemplate == null)
                                                <li>
                                                    <a data-toggle="collapse"
                                                       href="#collapseConform{{ $room->id }}"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapseExample"
                                                       wire:click="toggleTemplate('{{ $conform }}')"
                                                    >
                                                        @if($activeTemplate == \App\Enums\TemplateKey::Conform->value)
                                                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Elektriciteit') }}
                                                        @else
                                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Elektriciteit') }}
                                                        @endif
                                                    </a>
                                                    <div>
                                                        <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                                            id="collapseConform{{ $room->id }}">
                                                            @foreach(\App\Models\ConformArea::where('room_id', $room->id)->get() as $item)
                                                                @if($item->$conform->code != 'lighting')
                                                                    <li class="mx-3">
                                                                        <a class="@if($activeArea == $item->conform->id) activeLink @endif" href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                            {{ $item->conform->title }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            @foreach(\App\Models\ConformArea::where('room_id', $room->id)->orderBy('sidebar_count', 'asc')->get() as $item)
                                                                @if($item->$conform->code == 'lighting')
                                                                    <li class="mx-3">
                                                                        <a class="@if($activeArea == $item->conform->id) activeLink @endif" href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                            @if($item->$conform->code == 'lighting' && $item->sidebar_count != null)
                                                                                {{ $item->sidebar_count }}.
                                                                            @endif
                                                                            {{ $item->conform->title }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @endif
                    @endif

                    {{--OutHouseEx--}}
                    @if($outHouseIn != $activeFloor || $activeFloor == null)
                        @if($outHouseExParam)
                            @foreach($outHouseExParam as $room)
                                <a data-toggle="collapse"
                                   href="#collapseRoom{{ $room->id }}"
                                   role="button" aria-expanded="false"
                                   aria-controls="collapseRoom"
                                   wire:click="toggleRoom({{ $room->id }})"
                                >
                                    @if($room->id == $activeRoom)
                                        @if($outHouseExParam)
                                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ $outHouseExParam[0]['title'] }}
                                        @endif
                                    @else
                                        @if($outHouseExParam)
                                            <i class="fa fa-bookmark"></i>{{ $outHouseExParam[0]['title'] }}
                                        @endif
                                    @endif
                                </a>
                                <div class="collapse @if($room->id == $activeRoom) show @endif"

                                     id="collapseRoom{{ $room->id }}"
                                >
                                    <ul>
                                        <li>
                                            <a href="{{ route('area.general',  [$inspection, $room]) }}">
                                                <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                            </a>
                                        </li>

                                        @foreach($room->outdoorAreas as $item)
                                            <li class="mx-3">
                                                <a class="@if($activeArea == $item->outdoor->id) activeLink @endif" href="{{ route('area.outdoor', [$inspection, $item->outdoor]) }}">
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->outdoor->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    @endif

                </ul>
            </div>
        </li>
    @endif

    @if($techniques == $activeCat || $activeCat == null)
        {{--Technieken--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseTechnique"
               role="button" aria-expanded="false"
               aria-controls="collapseTechnique"
               wire:click="toggleCategory({{ $techniques }})"
               class="custom-sidebar-padding @if($techniques == $activeCat) active @endif"
            >
                @if($techniques == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Technieken') }}
                @else
                    <i class="fa fa-folder text-info" aria-hidden="true"></i>{{ __('Technieken') }}
                @endif
            </a>
            <div>
                <ul class="collapse @if($techniques == $activeCat) show @endif"

                    id="collapseTechnique"
                >
                    @if($techniqueParam)
                        @foreach($techniqueParam as $item)
                            <li class="mx-3">
                                <a class="@if($activeArea == $item->id) activeLink @endif" href="{{ route('area.technique', [$inspection, $item]) }}">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </li>
    @endif

    @if($keys == $activeCat || $activeCat == null)
        {{--Sleutels--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseKey"
               role="button"
               aria-expanded="false"
               aria-controls="collapseKey"
               wire:click="toggleCategory({{ $keys }})"
               class="custom-sidebar-padding @if($keys == $activeCat) active @endif"
            >
                @if($keys == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Sleutels') }}
                @else
                    <i class="fa fa-folder text-info"></i>{{ __('Sleutels') }}
                @endif
            </a>
            <div class="collapse @if($keys == $activeCat) show @endif"

                 id="collapseKey"
            >
                <ul>
                    <li class="mx-3">
                        <a href="{{ route('keys.index', $inspection) }}">
                            <i class="fa fa-list"></i>{{ __('Lijst') }}
                        </a>
                    <li>
                </ul>
            </div>
        </li>
    @endif

    @if($meters == $activeCat || $activeCat == null)
        {{--Meters--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseMeter"
               role="button"
               aria-expanded="false"
               aria-controls="collapseMeter"
               wire:click="toggleCategory({{ $meters }})"
               class="custom-sidebar-padding @if($meters == $activeCat) active @endif"
            >
                @if($meters == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Meters') }}
                @else
                    <i class="fa fa-folder text-info"></i>{{ __('Meters') }}
                @endif
            </a>
            <div class="collapse @if($meters == $activeCat) show @endif"

                 id="collapseMeter"
            >
                <ul>
                    <li class="mx-3">
                        <a href="{{ route('meters.index', $inspection) }}">
                            <i class="fa fa-list"></i>{{ __('Lijst') }}
                        </a>
                    <li>
                </ul>
            </div>
        </li>
    @endif

    @if($situation == $activeCat || $activeCat == null)
        {{--Beschrijvingen--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseSituation"
               role="button"
               aria-expanded="false"
               aria-controls="collapseSituation"
               wire:click="toggleCategory({{ $situation }})"
               class="custom-sidebar-padding @if($situation == $activeCat) active @endif"
            >
                @if($situation == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Beschrijvingen') }}
                @else
                    <i class="fa fa-folder text-success"></i>{{ __('Beschrijvingen') }}
                @endif

            </a>
            <div class="collapse @if($situation == $activeCat) show @endif"

                 id="collapseSituation"
            >
                <ul>
                    <li class="mx-4">
                        <a href="{{ route('situation.index', $inspection) }}">
                            <i class="fa fa-list"></i>{{ __('Lijst') }}
                        </a>
                    </li>
                    <li class="mx-4">
                        <a href="{{ route('create.situation', $inspection) }}">
                            <i class="fa fa-plus"></i>{{ __('Toevoegen') }}
                        </a>
                    </li>
                </ul>

            </div>
        </li>
    @endif
{{--    @if($contracts == $activeCat || $activeCat == null)--}}
{{--        Contracts--}}
{{--        <li class="sidebar-border">--}}
{{--            <a data-toggle="collapse"--}}
{{--               href="#collapseContract"--}}
{{--               role="button"--}}
{{--               aria-expanded="false"--}}
{{--               aria-controls="collapseContract"--}}
{{--               wire:click="toggleCategory({{ $contracts }})"--}}
{{--               class="custom-sidebar-padding @if($contracts == $activeCat) active @endif"--}}
{{--            >--}}
{{--                @if($contracts == $activeCat)--}}
{{--                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Contracten') }}--}}
{{--                @else--}}
{{--                    <i class="fa fa-folder text-success"></i>{{ __('Contracten') }}--}}
{{--                @endif--}}
{{--            </a>--}}
{{--            <div class="collapse @if($contracts == $activeCat) show @endif"--}}

{{--                 id="collapseContract"--}}
{{--            >--}}
{{--                <ul>--}}
{{--                    <li class="mx-3">--}}
{{--                        <a href="{{ route('contracts.index', $inspection) }}">--}}
{{--                            <i class="fa fa-list"></i>{{ __('Lijst') }}--}}
{{--                        </a>--}}
{{--                    <li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endif--}}
    @if($documents == $activeCat || $activeCat == null)
        {{--Documenten--}}
        <li class="sidebar-border">
            <a data-toggle="collapse"
               href="#collapseDocument"
               role="button"
               aria-expanded="false"
               aria-controls="collapseDocument"
               wire:click="toggleCategory({{ $documents }})"
               class="custom-sidebar-padding @if($documents == $activeCat) active @endif"
            >
                @if($documents == $activeCat)
                    <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Documenten') }}
                @else
                    <i class="fa fa-folder text-success"></i>{{ __('Documenten') }}
                @endif
            </a>
            <div class="collapse @if($documents == $activeCat) show @endif"

                 id="collapseDocument"
            >
                <ul>
                    <li class="mx-4">
                        <a href="{{ route('documents.index', $inspection) }}">
                            <i class="fa fa-list"></i>{{ __('Lijst') }}
                        </a>
                    </li>
                    <li class="mx-4">
                        <a href="{{ route('create.document', $inspection) }}">
                            <i class="fa fa-plus"></i>{{ __('Toevoegen') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @endif

</ul>


