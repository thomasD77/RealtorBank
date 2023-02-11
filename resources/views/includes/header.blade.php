<!-- Header -->
<div id="header">
    <div class="container-fluid">
        <!-- Left Side Content -->
        <div class="left-side">
            <!-- Logo -->
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a>
            </div>
            <!-- Mobile Navigation -->
            <div class="mmenu-trigger">
                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
            <!-- Main Navigation -->
            <nav id="navigation" class="style-1">
                @if(isset($inspection))
                    <ul id="responsive">
                            <li>
                                <a href=""><i class="fa fa-folder mx-2"></i>{{ __('In/uittrede') }}</a>
                                <ul>
                                    <li>
                                        <a href="{{ route('situation.index', $inspection) }}">
                                            <i class="fa fa-list mr-2"></i>{{ __('Lijst') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('create.situation', $inspection) }}">
                                            <i class="fa fa-plus mr-2"></i>{{ __('Toevoegen') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-folder mx-2"></i>{{ __('Interieur') }}</a>
                                <ul>
                                    @foreach($inspection->rooms as $room)
                                        <li>
                                            <a><i class="fa fa-list mr-2" aria-hidden="true"></i><span class="bold">{{ $room->title }}</span></a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('general.detail',  [$inspection, $room]) }}">
                                                        <i class="fa fa-circle mr-2" aria-hidden="true"></i>{{ __('Algemeen') }}
                                                    </a>
                                                </li>
                                                {{--   Basic--}}
                                                <li>
                                                    <a><i class="fa fa-circle mr-2" aria-hidden="true"></i>{{ __('Basis') }}</a>
                                                    <ul>
                                                        @foreach($room->basicAreas->sortByDesc('title') as $item)
                                                            <li>
                                                                <a href="{{ route('area.detail', [$inspection, $room, $item->area]) }}">
                                                                    <i class="fa fa-chevron-right mr-2" aria-hidden="true"></i>{{ $item->area->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                {{--  Spec--}}
                                                <li>
                                                    <a><i class="fa fa-circle mr-2" aria-hidden="true"></i>{{ __('Specifiek') }}</a>
                                                    <ul>
                                                        @foreach($room->specificAreas->where('room_id', $room->id) as $item)
                                                            <li>
                                                                <a href="{{ route('area.specific', [$inspection, $room, $item->specific]) }}">
                                                                    <i class="fa fa-chevron-right mr-2" aria-hidden="true"></i>{{ $item->specific->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                {{-- Conform--}}
                                                <li>
                                                    <a><i class="fa fa-circle mr-2" aria-hidden="true"></i>{{ __('Conformiteit') }}</a>
                                                    <ul>
                                                        @foreach($room->conformAreas as $item)
                                                            <li>
                                                                <a href="{{ route('area.conform', [$inspection, $room, $item->conform]) }}">
                                                                    <i class="fa fa-chevron-right mr-2" aria-hidden="true"></i>{{ $item->conform->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-folder mx-2"></i>{{ __('Exterieur') }}</a>
                            </li>
                        </ul>
                @endif
            </nav>
            <div class="clearfix"></div>
            <!-- Main Navigation / End -->
        </div>
        <!-- Left Side Content / End -->
        <!-- Right Side Content / -->
        <div class="header-user-menu user-menu">
            <div class="header-user-name">
                <span><img src="{{ asset('assets/images/testimonials/ts-1.jpg') }}" alt="logo"></span>
                {{ __('Hi,') }} {{ Auth()->user()->name }}
            </div>
            <ul>
                <li><a href="user-profile.html"> Edit profile</a></li>
                <li><a href="add-property.html"> Add Property</a></li>
                <li><a href="payment-method.html">  Payments</a></li>
                <li><a href="change-password.html"> Change Password</a></li>
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
        <!-- Right Side Content / End -->
    </div>
</div>
<!-- Header / End -->
