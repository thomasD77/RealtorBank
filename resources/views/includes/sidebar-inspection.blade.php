<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
    <div class="sidebar-header"><img src="{{ asset('assets/images/logo-blue.svg') }}" alt="header-logo2.png"></div>
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
            </li>
            @foreach($inspection->rooms as $room)
                <li class="mx-3">
                    <a href="add-property.html">
                        <i class="fa fa-list" aria-hidden="true"></i>{{ $room->title }}
                    </a>
                    <ul>
                        <li><a href="">{{ __('Basic') }}</a></li>
                        @foreach($room->basicAreas as $item)
                            <li class="mx-3">
                                <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                    <i class="fa fa-list" aria-hidden="true"></i>{{ $item->area->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
