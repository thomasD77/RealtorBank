<!-- Header -->
<div id="header">
    <div class="container-fluid">
        <!-- Left Side Content -->
        <div class="left-side">
            <!-- Logo -->
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a>
            </div>

            <!-- Mobile Navigation MD -->
            <div class="d-xl-none">
                <button onclick="getSidebar()"
                        class="hamburger hamburger--collapse"
                        type="button"
                >
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
            </div>

            <!-- Custom Sidebar Tablet M  -->
            @if(isset($inspection))
                <div id="sidebarResp" class="overlay d-none pt-3">
                    <div class="text-right">
                        <button onclick="closeSidebar()" class="p-2 btn-close">X</button>
                    </div>
                    <livewire:sidebar.sidebar
                        :Inspection="$inspection"
                        :Responsive="false"
                    />
                </div>
            @endif
            <div class="clearfix"></div>
            <!-- Main Navigation / End -->
        </div>
        <!-- Left Side Content / End -->
        <!-- Right Side Content / -->
        <div class="header-user-menu user-menu">
            <div class="header-user-name">
                <span><img src="{{ asset('assets/images/avatar/avatar-small.png') }}" alt="logo"></span>
                {{ __('Hi,') }} {{ Auth()->user()->firstName }}
            </div>
            <ul>
                <li><a href="{{ route('profile') }}">{{ __('Mijn profiel') }}</a></li>
                <li><a href="{{ route('inspections.index') }}">{{ __('Inspecties') }}</a></li>
                <li><a href="{{ route('update.password') }}">{{ __('Wachtwoord') }}</a></li>
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
