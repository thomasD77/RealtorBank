<!-- Header -->
<div id="header">
    <div class="container-fluid">
        <!-- Left Side Content -->
        <div class="left-side">
            <!-- Logo -->
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"></a>
            </div>

            <!-- Mobile Navigation Mobile -->
            <div class="d-md-none">
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                    </span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation MD -->
            <div class="d-none d-md-block d-lg-none">
                <button onclick="getSidebar()"
                        class="hamburger hamburger--collapse"
                        type="button"
                >
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
            </div>

            <!-- Custom Sidebar Tablet M  -->
            @if(isset($inspection))
                <div id="sidebarResp" class="overlay d-none d-xl-none pt-3">
                    <div class="text-right">
                        <button onclick="closeSidebar()" class="p-2 btn-close">X</button>
                    </div>
                    <livewire:sidebar.sidebar
                        :Inspection="$inspection"
                        :Responsive="false"
                    />
                </div>
            @endif

            <!-- Sidebar Mobile  -->
            @if(isset($inspection))
                <div class="d-md-none">
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <livewire:sidebar.sidebar
                            :Inspection="$inspection"
                            :Responsive="true"
                        />
                    </nav>
                </div>
            @endif
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
