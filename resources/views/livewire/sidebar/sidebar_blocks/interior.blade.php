@if($interior == $activeCat || $activeCat == null)
    {{--Interieur--}}
    <li class="sidebar-border">
        <a data-toggle="collapse"
           href="#collapseInterior"
           role="button"
           aria-expanded="false"
           aria-controls="collapseInterior"
           wire:click="toggleCategory({{ $interior }})"
           class="custom-sidebar-padding @if($interior == $activeCat) active @endif"
        >
            @if($interior == $activeCat)
                <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Interieur') }}
            @else
                <i class="fa fa-folder text-warning"></i>{{ __('Interieur') }}
            @endif
        </a>
        <div class="collapse @if($interior == $activeCat) show @endif"

             id="collapseInterior"
        >
            <ul class="special">

                @if($basement == $activeFloor || $activeFloor == null)
                    {{-- BasementFloor--}}
                    <a data-toggle="collapse"
                       href="#collapseBasement"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseBasement"
                       class="@if($basement == $activeFloor) active @endif"
                       wire:click="toggleFloor({{ $basement }})"
                    >
                        @if($basement == $activeFloor)
                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Kelder verdieping') }}
                        @else
                            <i class="fa fa-bookmark"></i>{{ __('Kelder verdieping') }}
                        @endif
                    </a>
                    <div class="collapse @if($basement == $activeFloor) show @endif"

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
                                            <li class="pt-3 pt-lg-0">
                                                <a href="{{ route('area.general',  [$inspection, $room]) }}">
                                                    <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                                </a>
                                            </li>
                                            <li class="pt-3 pt-lg-0">
                                                <a href="{{ route('calculations',  [$inspection, $room->floor, $room]) }}">
                                                    <i class="fa fa-calculator text-success" aria-hidden="true"></i>{{ __('Calculatie') }}
                                                </a>
                                            </li>
                                            {{-- Basic--}}
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

                                            {{--  Spec--}}
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
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </div>
                @endif

                @if($groundFloor == $activeFloor || $activeFloor == null)
                    {{-- groundFloor--}}
                    <a data-toggle="collapse"
                       href="#collapseGroundFloor"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseGroundFloor"
                       class="@if($groundFloor == $activeFloor) active @endif"
                       wire:click="toggleFloor({{ $groundFloor }})"
                    >
                        @if($groundFloor == $activeFloor)
                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Gelijkvloers') }}
                        @else
                            <i class="fa fa-bookmark"></i>{{ __('Gelijkvloers') }}
                        @endif
                    </a>
                    <div class="collapse @if($groundFloor == $activeFloor) show @endif"

                         id="collapseGroundFloor"
                    >
                        @if($groundFloorParam)
                            @foreach($groundFloorParam as $room)
                                @if($room->id == $activeRoom || $activeRoom == null)
                                    <li class="mx-2">

                                        <a data-toggle="collapse"
                                           href="#collapseRoom{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseRoom"
                                           wire:click="toggleRoom({{ $room->id }})"
                                        >
                                            @if($room->id == $activeRoom)
                                                <i class="fa fa-angle-down text-warning fa-2x"></i>
                                            @else
                                                <i class="fa fa-list @if($room->id == $activeRoom) text-white @endif " aria-hidden="true"></i>
                                            @endif

                                            <span class="bold @if($room->id == $activeRoom) text-white @endif ">
                                                {{ $room->title }}

                                            </span>
                                        </a>
                                        <div class="collapse @if($room->id == $activeRoom) show @endif"

                                             id="collapseRoom{{ $room->id }}"
                                        >
                                            <ul>
                                                <li class="pt-3 pt-lg-0">
                                                    <a href="{{ route('area.general',  [$inspection, $room]) }}">
                                                        <i class="fa fa-flag text-info" aria-hidden="true"></i>{{ __('Overzicht') }}
                                                    </a>
                                                </li>
                                                {{-- Basic--}}
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
                                                            @endif                                                    </a>
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

                                                {{-- Spec--}}
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
                                                                        <a class="@if($activeArea == $item->specific->id) activeLink @else noppes @endif " href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
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
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endif


                @if($upperFloor == $activeFloor || $activeFloor == null)
                    {{--  upperFloor--}}
                    <a data-toggle="collapse"
                       href="#collapseUpperFloor"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseUpperFloor"
                       wire:click="toggleFloor({{ $upperFloor }})"
                    >
                        @if($upperFloor == $activeFloor)
                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Bovenverdieping') }}
                        @else
                            <i class="fa fa-bookmark"></i>{{ __('Bovenverdieping') }}
                        @endif

                    </a>
                    <div class="collapse @if($upperFloor == $activeFloor) show @endif"

                         id="collapseUpperFloor"
                    >
                        @if($upperFloorParam)
                            @foreach($upperFloorParam as $room)
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
                                                {{--  Basic--}}
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

                                                {{-- Spec--}}
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
                                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
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


                                                {{--  Conform--}}
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
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endif

                @if($attic == $activeFloor || $activeFloor == null)
                    {{--  attic--}}
                    <a data-toggle="collapse"
                       href="#collapseAttic"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseAttic"
                       wire:click="toggleFloor({{ $attic }})"
                    >
                        @if($attic == $activeFloor)
                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Zolderverdiep') }}
                        @else
                            <i class="fa fa-bookmark"></i>{{ __('Zolderverdiep') }}
                        @endif
                    </a>
                    <div class="collapse @if($attic == $activeFloor) show @endif"

                         id="collapseAttic"
                    >
                        @if($atticParam)
                            @foreach($atticParam as $room)
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
                                                {{-- Basic--}}
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

                                                {{-- Spec--}}
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
                                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
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
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                    </div>
                @endif

                @if($garage == $activeFloor || $activeFloor == null)
                    {{-- Garage--}}
                    <a data-toggle="collapse"
                       href="#collapseGarage"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseGarage"
                       wire:click="toggleFloor({{ $garage }})"
                    >
                        @if($garage == $activeFloor)
                            <i class="fa fa-angle-down text-warning fa-2x"></i>{{ __('Zone garage') }}
                        @else
                            <i class="fa fa-bookmark"></i>{{ __('Zone garage') }}
                        @endif
                    </a>
                    <div class="collapse @if($garage == $activeFloor) show @endif"

                         id="collapseGarage"
                    >
                        @if($garageParam)
                            @foreach($garageParam as $room)
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
                                                {{-- Basic--}}
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

                                                {{-- Spec--}}
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
                                                                @foreach($room->specificAreas->where('room_id', $room->id) as $item)
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

                                                {{--  Conform--}}
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
