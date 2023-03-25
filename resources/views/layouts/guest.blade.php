<!DOCTYPE html>
<html lang="zxx">

@include('includes.head')

<body class="inner-pages hd-white">
<!-- Wrapper -->
<div id="wrapper">

    <section class="headings" style="background-image: url('{{ asset('assets/images/banner.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: bottom center">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Login</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; login</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION LOGIN -->
    <div id="login" class="my-5">
        <div class="login my-lg-5 py-lg-5">
            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full form-control"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{--                <div class="block mt-4">--}}
                {{--                    <label for="remember_me" class="inline-flex items-center">--}}
                {{--                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
                {{--                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
                {{--                    </label>--}}
                {{--                </div>--}}


                <div class="flex items-center justify-end my-4">
{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}" class="mx-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register') }}</a>--}}
{{--                    @endif--}}

{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}

                    <x-primary-button class="btn_1 rounded full-width">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->

    <br>
    <br>

    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="second-footer">
            <div class="container">
                <p>2023 © Copyright | Innova Webcreations | All Rights Reserved.</p>
                <ul class="netsocials">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

</div>
<!-- Wrapper / End -->
@livewireScripts
</body>



</html>
