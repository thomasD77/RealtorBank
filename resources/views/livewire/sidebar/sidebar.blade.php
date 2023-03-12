<ul id="{{ $responsive }}">
    <li>
        <a class="custom-sidebar-padding" href="{{ route('inspection.edit', $inspection) }}">
            <i class="fa fa-map-marker"></i>{{ $inspection->title }}
        </a>
    </li>

    {{--In/Uittrede--}}
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

    {{--Interieur--}}
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
                {{--                BasementFloor--}}
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
                    @if($basementParam)
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
                                    Basic
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

                                    {{--                                  Spec--}}
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

                                    {{--                                 Conform--}}
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
                    @endif
                </div>

                {{--                groundFloor--}}
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
                    @if($groundFloorParam)
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
                                        {{--                                       Basic--}}
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

                                        {{--                                      Spec--}}
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

                                        {{--                                     Conform--}}
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
                    @endif
                </div>

                {{--                upperFloor--}}
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
                    @if($upperFloorParam)
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
                                        {{--                                       Basic--}}
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

                                        {{--                                      Spec--}}
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

                                        {{--                                     Conform--}}
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
                    @endif
                </div>

                {{--                attic--}}
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
                    @if($atticParam)
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
                                        {{--                                       Basic--}}
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

                                        {{--                                      Spec--}}
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

                                        {{--                                     Conform--}}
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
                    @endif

                </div>

                {{--                Garage--}}
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
                    @if($garageParam)
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
                                        {{--                                       Basic--}}
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

                                        {{--                                      Spec--}}
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

                                        {{--                                     Conform--}}
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
                    @endif

                </div>
            </ul>
        </div>
    </li>



    {{--Exterieur--}}
    <li>
        <a data-toggle="collapse"
           href="#collapseExterieur"
           role="button"
           aria-expanded="false"
           aria-controls="collapseExterieur"
           wire:click="toggleCategory({{ $exterior }})"
           class="custom-sidebar-padding @if($exterior == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Exterieur') }}
        </a>
        <div class="collapse @if($exterior == $activeCat) show @endif"
             wire:ignore.self
             id="collapseExterieur"
        >
            <ul>

                {{-- Building--}}
                <a data-toggle="collapse"
                   href="#collapseBuilding"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseBuilding"
                   wire:click="toggleFloor({{ $building }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Algemeen gebouw') }}
                </a>
                <div class="collapse @if($building == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseBuilding"
                >
                    @if($buildingParam)
                        @foreach($buildingParam as $building)
                            <li class="mx-2">

                                <a data-toggle="collapse"
                                   href="#collapseRoom{{ $building->id }}"
                                   role="button" aria-expanded="false"
                                   aria-controls="collapseRoom"
                                   wire:click="toggleRoom({{ $building->id }})"
                                >
                                    <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $building->title }}</span>
                                </a>

                                <div class="collapse @if($building->id == $activeRoom) show @endif"
                                     wire:ignore.self
                                     id="collapseRoom{{ $building->id }}"
                                >
                                    <ul>
                                        <li>
                                            <a href="{{ route('general.detail',  [$inspection, $building]) }}">
                                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                                            </a>
                                        </li>

                                        @foreach($building->outdoorAreas as $item)
                                            <li class="mx-3">
                                                <a href="{{ route('area.outdoor', [$inspection, $item->outdoor]) }}">
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->outdoor->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </div>

                {{--Driveway--}}
                <a data-toggle="collapse"
                   href="#collapseDriveWay"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseDriveWay"
                   wire:click="toggleFloor({{ $driveWay }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Algemeen aanleg') }}
                </a>
                <div class="collapse @if($driveWay == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseDriveWay"
                >
                    @if($driveWayParam)
                        @foreach($driveWayParam as $room)
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

                                        @foreach($room->outdoorAreas->where('room_id', $room->id) as $item)
                                            <li class="mx-3">
                                                <a href="{{ route('area.outdoor', [$inspection, $item->outdoor]) }}">
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->outdoor->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </div>
            </ul>
        </div>
    </li>

    {{--Technieken--}}
    <li>
        <a data-toggle="collapse"
           href="#collapseTechnique"
           role="button" aria-expanded="false"
           aria-controls="collapseTechnique"
           wire:click="toggleCategory({{ $techniques }})"
           class="custom-sidebar-padding @if($techniques == $activeCat) active @endif"
        >
            <i class="fa fa-folder" aria-hidden="true"></i>{{ __('Technieken') }}
        </a>
        <div>
            <ul class="collapse @if($techniques == $activeCat) show @endif"
                wire:ignore.self
                id="collapseTechnique"
            >
                @if($techniqueParam)
                    @foreach($techniqueParam as $item)
                        <li class="mx-3">
                            <a href="{{ route('area.technique', [$inspection, $item]) }}">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </li>

    {{--Sleutels--}}
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

    {{--Meters--}}
    <li>
        <a data-toggle="collapse"
           href="#collapseMeter"
           role="button"
           aria-expanded="false"
           aria-controls="collapseMeter"
           wire:click="toggleCategory({{ $meters }})"
           class="custom-sidebar-padding @if($meters == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Meters') }}
        </a>
        <div class="collapse @if($meters == $activeCat) show @endif"
             wire:ignore.self
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

    {{--Documenten--}}
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

    {{--OutHouse--}}
    <li>
        <a data-toggle="collapse"
           href="#collapseOuthouse"
           role="button"
           aria-expanded="false"
           aria-controls="collapseOuthouse"
           wire:click="toggleCategory({{ $outHouse }})"
           class="custom-sidebar-padding @if($outHouse == $activeCat) active @endif"
        >
            <i class="fa fa-folder"></i>{{ __('Bijgebouw') }}
        </a>
        <div class="collapse @if($outHouse == $activeCat) show @endif"
             wire:ignore.self
             id="collapseOuthouse"
        >

            <ul>
                {{-- OutHouseIn--}}
                <a data-toggle="collapse"
                   href="#collapseOutHouseIn"
                   role="button"
                   aria-expanded="false"
                   aria-controls="collapseOutHouseIn"
                   wire:click="toggleFloor({{ $outHouseIn }})"
                >
                    <i class="fa fa-bookmark"></i>{{ __('Bijgebouw binnen') }}
                </a>
                <div class="collapse @if($outHouseIn == $activeFloor) show @endif"
                     wire:ignore.self
                     id="collapseOutHouseIn"
                >
                    <ul>
                        <li>
                            <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Algemeen') }}
                            </a>
                        </li>
                        {{-- Basic--}}
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

                        {{--   Spec--}}
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

            </ul>
        </div>
    </li>













</ul>


