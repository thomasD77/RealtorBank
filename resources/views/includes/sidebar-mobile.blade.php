<div class="col-lg-12 mobile-dashbord dashbord px-0">
    <div class="dashboard_navigationbar dashxl">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn text-dark"><i class="fa fa-bars pr10 mr-2"></i>{{ __('Dashboard navigatie') }}</button>
            <ul id="myDropdown" class="dropdown-content">

                @include('includes.sidebar.list-items')

            </ul>
        </div>
    </div>
</div>
