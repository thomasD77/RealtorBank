<li>
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-map-marker mx-2"></i>{{ __('Dashboard') }}
    </a>
</li>
<li>
    <a href="{{ route('create.inspection') }}">
        <i class="fa fa-plus mx-2" aria-hidden="true"></i>{{ __('Nieuw') }}
    </a>
</li>
<li>
    <a href="{{ route('inspections.index') }}">
        <i class="fa fa-list mx-2" aria-hidden="true"></i>{{ __('Mijn inspecties') }}
    </a>
</li>
<li>
    <a href="{{ route('profile') }}">
        <i class="fa fa-user mx-2"></i>{{ __('Profiel') }}
    </a>
</li>
{{--<li>--}}
{{--    <a href="{{ route('company') }}">--}}
{{--        <i class="fa fa-building"></i>{{ __('Bedrijf') }}--}}
{{--    </a>--}}
{{--</li>--}}
<li>
    <a href="{{ route('update.password') }}">
        <i class="fa fa-lock mx-2"></i>{{ __('Wachtwoord') }}
    </a>
</li>
@if(Auth::user()->id != 2)
    <li>
        <a href="{{ route('pricing') }}">
            <i class="fa fa-money-bill mx-2"></i>{{ __('Prijzen') }}
        </a>
    </li>
@endif
