<li>
    <a class="active" href="{{ route('dashboard') }}">
        <i class="fa fa-map-marker"></i>{{ __('Dashboard') }}
    </a>
</li>
<li>
    <a href="{{ route('create.inspection') }}">
        <i class="fa fa-plus" aria-hidden="true"></i>{{ __('Nieuw') }}
    </a>
</li>
<li>
    <a href="{{ route('inspections.index') }}">
        <i class="fa fa-list" aria-hidden="true"></i>{{ __('Mijn inspecties') }}
    </a>
</li>
<li>
    <a href="{{ route('profile') }}">
        <i class="fa fa-user"></i>{{ __('Profiel') }}
    </a>
</li>
{{--<li>--}}
{{--    <a href="{{ route('company') }}">--}}
{{--        <i class="fa fa-building"></i>{{ __('Bedrijf') }}--}}
{{--    </a>--}}
{{--</li>--}}
<li>
    <a href="{{ route('update.password') }}">
        <i class="fa fa-lock"></i>{{ __('Wachtwoord') }}
    </a>
</li>
