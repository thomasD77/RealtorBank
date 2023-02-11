<style>
    .user-profile-box {
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
    <div class="sidebar-header"><a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo-blue.svg') }}" alt="header-logo2.png"></a></div>
    <div class="detail clearfix">
        <div>
            <ul class="mb-0">
                <li>
                    <a class="active" href="{{ route('inspection.edit', $inspection) }}">
                        <i class="fa fa-user"></i>{{ $inspection->title }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('situation.index', $inspection) }}">
                        <i class="fa fa-folder"></i>{{ __('In/uittrede') }}
                    </a>
                <li>
                <li>
                    <a data-toggle="collapse"
                       href="#collapseInterior"
                       role="button"
                       aria-expanded="true"
                       aria-controls="collapseInterior"
                    >
                        <i class="fa fa-folder"></i>{{ __('Interieur') }}
                    </a>
                    <div class="collapse show" id="collapseInterior">

                        <livewire:sidebar
                            :Inspection="$inspection"
                        />

                    </div>
                </li>
                <li>
                    <a data-toggle="collapse"
                       href="#collapseExterieur"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseExterieur"
                    >
                        <i class="fa fa-folder"></i>{{ __('Exterieur') }}
                    </a>
                    <div class="collapse" id="collapseExterieur">

                        <livewire:sidebar
                            :Inspection="$inspection"
                        />

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
