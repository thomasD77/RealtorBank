<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
    <div class="sidebar-header"><a href="{{ asset('/dashboard') }}"><img src="{{ asset('assets/images/logo-blue.svg') }}" alt="header-logo2.png"></a> </div>
    <div class="header clearfix">
        <a href="{{ asset('/dashboard') }}"><img src="{{ asset('assets/images/avatar/avatar-big.png') }}" alt="avatar" class="img-fluid profile-img"></a>
    </div>
    <div class="active-user">
        <h2>{{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}</h2>
    </div>
    <div class="detail clearfix">
        <ul class="mb-0">

            @include('includes.sidebar.list-items')

        </ul>
    </div>
</div>
</div>
