<ul id="{{ $responsive }}">
    <li>
        <a class="custom-sidebar-padding" href="{{ route('inspection.edit', $inspection) }}">
            <i class="fa fa-map-marker"></i>{{ $inspection->title }}
        </a>
    </li>
    <li>
        <a data-toggle="collapse"
           href="#collapseSituation"
           role="button"
           aria-expanded="false"
           aria-controls="collapseSituation"
           wire:click="toggleCategory({{ $situation }})"
           class="custom-sidebar-padding @if($situation == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('In/uittrede') }}
        </a>
        <div class="collapse @if($situation == $activeCat) show @endif"
             wire:ignore.self
             id="collapseSituation"
        >
            <ul>
                <li class="mx-3">
                    <a href="{{ route('situation.index', $inspection) }}">
                        <i class="fa fa-list"></i>{{ __('Lijst') }}
                    </a>
                    <a href="{{ route('create.situation', $inspection) }}">
                        <i class="fa fa-plus"></i>{{ __('Toevoegen') }}
                    </a>
                <li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse"
           href="#collapseInterior"
           role="button"
           aria-expanded="false"
           aria-controls="collapseInterior"
           wire:click="toggleCategory({{ $interior }})"
           class="custom-sidebar-padding @if($interior == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Interieur') }}
        </a>
        <div class="collapse @if($interior == $activeCat) show @endif"
             wire:ignore.self
             id="collapseInterior"
        >
            <ul>
                {{--BasementFloor--}}
                <a data-toggle="collapse"
                   href="#collapseBasement"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseBasement"
                   wire:click="toggleFloor({{ $basement }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Kelder verdieping') }}
                </a>
                <div class="collapse @if($basement == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseBasement"
                >
                    @foreach($basementParam as $room)
                    <li class="mx-2">

                        <a data-toggle="collapse"
                           href="#collapseRoom{{ $room->id }}"
                           role="button" aria-expanded="false"
                           aria-controls="collapseRoom"
                           wire:click="toggleRoom({{ $room->id }})"
                        >
                            <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                        </a>

                        <div class="collapse @if($room->id == $activeRoom) show @endif"
                             wire:ignore.self
                             id="collapseRoom{{ $room->id }}"
                        >
                            <ul>
                                <li>
                                    <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                        <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                    </a>
                                </li>
                                {{--   Basic--}}
                                <li>
                                    <a data-toggle="collapse"
                                       href="#collapseBasic{{ $room->id }}"
                                       role="button" aria-expanded="false"
                                       aria-controls="collapseExample"
                                       wire:click="toggleTemplate('{{ $basic }}')"
                                    >
                                        <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                                    </a>
                                    <div>
                                        <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"
                                            wire:ignore.self
                                            id="collapseBasic{{ $room->id }}"
                                        >
                                            @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                <li class="mx-3">
                                                    <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->area->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>

                                {{--  Spec--}}
                                <li>
                                    <a data-toggle="collapse"
                                       href="#collapseSpec{{ $room->id }}"
                                       role="button" aria-expanded="false"
                                       aria-controls="collapseExample"
                                       wire:click="toggleTemplate('{{ $specific }}')"
                                    >
                                        <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                                    </a>
                                    <div>
                                        <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"
                                            wire:ignore.self
                                            id="collapseSpec{{ $room->id }}"
                                        >
                                            @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                <li class="mx-3">
                                                    <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>

                                {{-- Conform--}}
                                <li>
                                    <a data-toggle="collapse"
                                       href="#collapseConform{{ $room->id }}"
                                       role="button" aria-expanded="false"
                                       aria-controls="collapseExample"
                                       wire:click="toggleTemplate('{{ $conform }}')"
                                    >
                                        <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                                    </a>
                                    <div>
                                        <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                            wire:ignore.self
                                            id="collapseConform{{ $room->id }}">
                                            @foreach($room->conformAreas as $item)
                                                <li class="mx-3">
                                                    <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->conform->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endforeach
                </div>

                {{--groundFloor--}}
                <a data-toggle="collapse"
                   href="#collapseGroundFloor"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseGroundFloor"
                   wire:click="toggleFloor({{ $groundFloor }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Gelijkvloers') }}
                </a>
                <div class="collapse @if($groundFloor == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseGroundFloor"
                >
                    @foreach($groundFloorParam as $room)
                        <li class="mx-2">

                            <a data-toggle="collapse"
                               href="#collapseRoom{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseRoom"
                               wire:click="toggleRoom({{ $room->id }})"
                            >
                                <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                            </a>

                            <div class="collapse @if($room->id == $activeRoom) show @endif"
                                 wire:ignore.self
                                 id="collapseRoom{{ $room->id }}"
                            >
                                <ul>
                                    <li>
                                        <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                        </a>
                                    </li>
                                    {{--   Basic--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseBasic{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $basic }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"
                                                wire:ignore.self
                                                id="collapseBasic{{ $room->id }}"
                                            >
                                                @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->area->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{--  Spec--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseSpec{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $specific }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"
                                                wire:ignore.self
                                                id="collapseSpec{{ $room->id }}"
                                            >
                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{-- Conform--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseConform{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $conform }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                                        </a>
                                        <div>
                                            <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                                wire:ignore.self
                                                id="collapseConform{{ $room->id }}">
                                                @foreach($room->conformAreas as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->conform->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </div>

                {{--upperFloor--}}
                <a data-toggle="collapse"
                   href="#collapseUpperFloor"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseUpperFloor"
                   wire:click="toggleFloor({{ $groundFloor }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Verdiep') }}
                </a>
                <div class="collapse @if($upperFloor == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseUpperFloor"
                >
                    @foreach($upperFloorParam as $room)
                        <li class="mx-2">

                            <a data-toggle="collapse"
                               href="#collapseRoom{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseRoom"
                               wire:click="toggleRoom({{ $room->id }})"
                            >
                                <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                            </a>

                            <div class="collapse @if($room->id == $activeRoom) show @endif"
                                 wire:ignore.self
                                 id="collapseRoom{{ $room->id }}"
                            >
                                <ul>
                                    <li>
                                        <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                        </a>
                                    </li>
                                    {{--   Basic--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseBasic{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $basic }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"
                                                wire:ignore.self
                                                id="collapseBasic{{ $room->id }}"
                                            >
                                                @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->area->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{--  Spec--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseSpec{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $specific }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"
                                                wire:ignore.self
                                                id="collapseSpec{{ $room->id }}"
                                            >
                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{-- Conform--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseConform{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $conform }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                                        </a>
                                        <div>
                                            <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                                wire:ignore.self
                                                id="collapseConform{{ $room->id }}">
                                                @foreach($room->conformAreas as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->conform->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </div>

                {{--attic--}}
                <a data-toggle="collapse"
                   href="#collapseAttic"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseAttic"
                   wire:click="toggleFloor({{ $attic }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Zolderverdiep') }}
                </a>
                <div class="collapse @if($attic == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseAttic"
                >
                    @foreach($atticParam as $room)
                        <li class="mx-2">

                            <a data-toggle="collapse"
                               href="#collapseRoom{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseRoom"
                               wire:click="toggleRoom({{ $room->id }})"
                            >
                                <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                            </a>

                            <div class="collapse @if($room->id == $activeRoom) show @endif"
                                 wire:ignore.self
                                 id="collapseRoom{{ $room->id }}"
                            >
                                <ul>
                                    <li>
                                        <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                        </a>
                                    </li>
                                    {{--   Basic--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseBasic{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $basic }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"
                                                wire:ignore.self
                                                id="collapseBasic{{ $room->id }}"
                                            >
                                                @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->area->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{--  Spec--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseSpec{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $specific }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"
                                                wire:ignore.self
                                                id="collapseSpec{{ $room->id }}"
                                            >
                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{-- Conform--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseConform{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $conform }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                                        </a>
                                        <div>
                                            <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                                wire:ignore.self
                                                id="collapseConform{{ $room->id }}">
                                                @foreach($room->conformAreas as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->conform->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </div>

                {{--Garage--}}
                <a data-toggle="collapse"
                   href="#collapseGarage"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseGarage"
                   wire:click="toggleFloor({{ $garage }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Zone garage') }}
                </a>
                <div class="collapse @if($garage == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseGarage"
                >
                    @foreach($garageParam as $room)
                        <li class="mx-2">

                            <a data-toggle="collapse"
                               href="#collapseRoom{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseRoom"
                               wire:click="toggleRoom({{ $room->id }})"
                            >
                                <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                            </a>

                            <div class="collapse @if($room->id == $activeRoom) show @endif"
                                 wire:ignore.self
                                 id="collapseRoom{{ $room->id }}"
                            >
                                <ul>
                                    <li>
                                        <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                        </a>
                                    </li>
                                    {{--   Basic--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseBasic{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $basic }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Basic->value) show @endif"
                                                wire:ignore.self
                                                id="collapseBasic{{ $room->id }}"
                                            >
                                                @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->area->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{--  Spec--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseSpec{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $specific }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                                        </a>
                                        <div>
                                            <ul class="collapse @if($activeTemplate == \App\Enums\TemplateKey::Specific->value) show @endif"
                                                wire:ignore.self
                                                id="collapseSpec{{ $room->id }}"
                                            >
                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->specific->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    {{-- Conform--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseConform{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                           wire:click="toggleTemplate('{{ $conform }}')"
                                        >
                                            <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                                        </a>
                                        <div>
                                            <ul class="collapse  @if($activeTemplate == \App\Enums\TemplateKey::Conform->value) show @endif"
                                                wire:ignore.self
                                                id="collapseConform{{ $room->id }}">
                                                @foreach($room->conformAreas as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->conform->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </div>
            </ul>
        </div>
    </li>

    {{--Exterieur--}}
{{--    <li>--}}
{{--        <a data-toggle="collapse"--}}
{{--           href="#collapseExterieur"--}}
{{--           role="button"--}}
{{--           aria-expanded="false"--}}
{{--           aria-controls="collapseExterieur"--}}
{{--           wire:click="toggleCategory({{ $exterior }})"--}}
{{--           class="custom-sidebar-padding @if($exterior == $activeCat) active @endif"--}}
{{--        >--}}
{{--            <i class="fa fa-folder"></i>{{ __('Exterieur') }}--}}
{{--        </a>--}}
{{--        <div class="collapse @if($exterior == $activeCat) show @endif"--}}
{{--             wire:ignore.self--}}
{{--             id="collapseExterieur"--}}
{{--        >--}}
{{--        </div>--}}
{{--    </li>--}}

    {{--Technieken--}}
{{--    <li>--}}
{{--        <a data-toggle="collapse"--}}
{{--           href="#collapseTechnique"--}}
{{--           role="button" aria-expanded="false"--}}
{{--           aria-controls="collapseTechnique"--}}
{{--           wire:click="toggleCategory({{ $techniques }})"--}}
{{--           class="custom-sidebar-padding @if($techniques == $activeCat) active @endif"--}}
{{--        >--}}
{{--            <i class="fa fa-folder" aria-hidden="true"></i>{{ __('Technieken') }}--}}
{{--        </a>--}}
{{--        <div>--}}
{{--            <ul class="collapse @if($techniques == $activeCat) show @endif"--}}
{{--                wire:ignore.self--}}
{{--                id="collapseTechnique"--}}
{{--            >--}}
{{--                @foreach($inspection->techniques as $item)--}}
{{--                    <li class="mx-3">--}}
{{--                        <a href="{{ route('area.technique', [$inspection, $item->technique]) }}">--}}
{{--                            <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->technique->title }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </li>--}}

    <li>
        <a data-toggle="collapse"
           href="#collapseDocument"
           role="button"
           aria-expanded="false"
           aria-controls="collapseDocument"
           wire:click="toggleCategory({{ $documents }})"
           class="custom-sidebar-padding @if($documents == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Documenten') }}
        </a>
        <div class="collapse @if($documents == $activeCat) show @endif"
             wire:ignore.self
             id="collapseDocument"
        >
            <ul>
                <li class="mx-3">
                    <a href="{{ route('documents.index', $inspection) }}">
                        <i class="fa fa-list"></i>{{ __('Lijst') }}
                    </a>
                    <a href="{{ route('create.document', $inspection) }}">
                        <i class="fa fa-plus"></i>{{ __('Toevoegen') }}
                    </a>
                <li>
            </ul>
        </div>
    </li>

    <li>
        <a data-toggle="collapse"
           href="#collapseKey"
           role="button"
           aria-expanded="false"
           aria-controls="collapseKey"
           wire:click="toggleCategory({{ $keys }})"
           class="custom-sidebar-padding @if($keys == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Sleutels') }}
        </a>
        <div class="collapse @if($keys == $activeCat) show @endif"
             wire:ignore.self
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


</ul>


