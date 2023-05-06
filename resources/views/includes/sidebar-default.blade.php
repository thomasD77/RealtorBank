<div class="user-profile-box mb-0">
    <div class="">
        <a href="{{ asset('/dashboard') }}"><img src="{{ asset('assets/images/em_new_blue.png') }}" alt="header-logo2.png"></a>
    </div>
    <div class="header clearfix">
        <a href="{{ route('profile') }}"><img src="{{ asset('assets/images/avatar/avatar-big.png') }}" alt="avatar" class="img-fluid profile-img"></a>
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

