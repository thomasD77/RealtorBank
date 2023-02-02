<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
    <div class="sidebar-header"><img src="{{ asset('assets/images/logo-blue.svg') }}" alt="header-logo2.png"> </div>
    <div class="header clearfix">
        <img src="{{ asset('assets/images/testimonials/ts-1.jpg') }}" alt="avatar" class="img-fluid profile-img">
    </div>
    <div class="active-user">
        <h2>Mary Smith</h2>
    </div>
    <div class="detail clearfix">
        <ul class="mb-0">
            <li>
                <a class="active" href="{{ route('dashboard') }}">
                    <i class="fa fa-map-marker"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('create.inspection') }}">
                    <i class="fa fa-list" aria-hidden="true"></i>Add Property
                </a>
            </li>
            <li>
                <a href="{{ route('inspections.index') }}">
                    <i class="fa fa-list" aria-hidden="true"></i>My Properties
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}">
                    <i class="fa fa-user"></i>Profile
                </a>
            </li>
            <li>
                <a href="{{ route('update.password') }}">
                    <i class="fa fa-lock"></i>Change Passwords
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
