<style>
    .user-profile-box {
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
    <div class="sidebar-header"><a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo-blue.svg') }}" alt="header-logo2.png"></a></div>
    <div class="detail clearfix">
        <ul class="mb-0">
            <li>
                <a class="active" href="dashboard.html">
                    <i class="fa fa-map-marker"></i> {{ $inspection->title }}
                </a>
            </li>
            <li>
                <a class="active" href="dashboard.html">
                    <i class="fas fa-paste"></i>{{ __('Interieur') }}
                </a>
                <p>
                <ul>
                    @foreach($inspection->rooms as $room)
                        <li class="mx-3">

                            <a data-toggle="collapse"
                               href="#collapseRoom{{ $room->id }}"
                               role="button" aria-expanded="false"
                               aria-controls="collapseRoom"
                            >
                                <i class="fa fa-list" aria-hidden="true"></i>{{ $room->title }}
                            </a>

                            <div class="collapse" id="collapseRoom{{ $room->id }}">
                                <ul>

                                    {{--   Basic--}}
                                    <li>
                                        <a data-toggle="collapse"
                                           href="#collapseBasic{{ $room->id }}"
                                           role="button" aria-expanded="false"
                                           aria-controls="collapseExample"
                                        >
                                            {{ __('Basis') }}
                                        </a>
                                        <div>
                                            <ul class="collapse" id="collapseBasic{{ $room->id }}">
                                                @foreach($room->basicAreas as $item)
                                                    <li class="mx-3">
                                                        <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                            <i class="fa fa-list" aria-hidden="true"></i>{{ $item->area->title }}
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
                                            {{ __('Specifiek') }}
                                        </a>
                                        <div>
                                            <ul class="collapse" id="collapseSpec{{ $room->id }}">
                                               <li><a href="">element 1</a></li>
                                               <li><a href="">element 2</a></li>
                                               <li><a href="">element 3</a></li>
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
                                            {{ __('Conformiteit') }}
                                        </a>
                                        <div>
                                            <ul class="collapse" id="collapseConform{{ $room->id }}">
                                                <li><a href="">element 1</a></li>
                                                <li><a href="">element 2</a></li>
                                                <li><a href="">element 3</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>
