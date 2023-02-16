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
            <style>
                .overlay {
                    z-index: 10;
                    width: 250px;
                    position: fixed;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background-color: #24324a;
                    display: flex;
                    flex-direction: column;
                    overflow-y: auto;
                }
                .overlay a{
                    color: #aeb7c2;
                    padding: 1rem;
                }
                .overlay ul li {
                    padding: 0.5rem;
                }
                .overlay i {
                    padding-right: 0.5rem;
                }
            </style>
            <div class="overlay d-none d-md-block d-xl-none">
                <livewire:sidebar.sidebar
                    :Inspection="$inspection"
                />
            </div>
            <!-- Main Navigation -->
            <nav id="navigation" class="style-1">
                @if(isset($inspection))
                    <livewire:sidebar.sidebar
                        :Inspection="$inspection"
                    />
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
