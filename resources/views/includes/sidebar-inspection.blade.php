<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
        <div class="">
            <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/em_new_blue.png') }}" alt="header-logo2.png"></a>
        </div>
        <div class="detail clearfix">
            <div>

                <livewire:sidebar.sidebar
                    :Inspection="$inspection"
                    :Responsive="false"
                />

            </div>
        </div>
    </div>
</div>



