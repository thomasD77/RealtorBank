<div>
    <ul>
        @foreach($inspection->rooms as $room)
            <li class="mx-2">

                <a data-toggle="collapse"
                   href="#collapseRoom{{ $room->id }}"
                   role="button" aria-expanded="{{ $ariaExpanded }}"
                   aria-controls="collapseRoom"
                   wire:click="toggleCollapse"
                >
                    <i class="fa fa-list" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span>
                </a>

                <div class="collapse {{ $show }}" id="collapseRoom{{ $room->id }}">
                    <ul>
                        <li>
                            <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Overzicht') }}
                            </a>
                        </li>
                        {{--   Basic--}}
                        <li>
                            <a data-toggle="collapse"
                               href="#collapseBasic{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseExample"
                            >
                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Basis') }}
                            </a>
                            <div>
                                <ul class="collapse" id="collapseBasic{{ $room->id }}">
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
                            >
                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Specifiek') }}
                            </a>
                            <div>
                                <ul class="collapse" id="collapseSpec{{ $room->id }}">
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
                            >
                                <i class="fa fa-circle" aria-hidden="true"></i>{{ __('Conformiteit') }}
                            </a>
                            <div>
                                <ul class="collapse" id="collapseConform{{ $room->id }}">
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
    </ul>
</div>
