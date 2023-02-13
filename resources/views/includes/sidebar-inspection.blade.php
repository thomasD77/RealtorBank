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
                    <a data-toggle="collapse"
                       href="#collapseSituation"
                       role="button"
                       aria-expanded="false"
                       aria-controls="collapseSituation"
                    >
                        <i class="fa fa-folder"></i>{{ __('In/uittrede') }}
                    </a>
                    <div class="collapse" id="collapseSituation">

                        <ul>
                            <li class="mx-3">
                                <a href="{{ route('situation.index', $inspection) }}">
                                    <i class="fa fa-list"></i>{{ __('Lijst') }}
                                </a>
                                <a href="{{ route('create.situation', $inspection) }}">
                                    <i class="fa fa-plus"></i>{{ __('Toevoegen') }}
                                </a>
                            <li>
                        </ul>

                    </div>
                </li>
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

                        <livewire:sidebar.sidebar
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

                        <livewire:sidebar.sidebar
                            :Inspection="$inspection"
                        />

                    </div>
                </li>
                <li>
                    <a data-toggle="collapse"
                       href="#collapseTechnique"
                       role="button" aria-expanded="false"
                       aria-controls="collapseTechnique"
                    >
                        <i class="fa fa-folder" aria-hidden="true"></i>{{ __('Technieken') }}
                    </a>
                    <div>
                        <ul class="collapse" id="collapseTechnique">
                            @foreach($inspection->techniques as $item)
                                <li class="mx-3">
                                    <a href="{{ route('area.technique', [$inspection, $item->technique]) }}">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{ $item->technique->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
