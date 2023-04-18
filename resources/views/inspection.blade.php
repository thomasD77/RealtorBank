<!DOCTYPE html>
<html lang="zxx">

@include('includes.head')


<body class="inner-pages maxw1600 m0a dashboard-bd ui-elements">

<!-- Wrapper -->
<div id="wrapper" class="int_main_wraapper">
    <!-- START SECTION HEADINGS -->
    <!-- Header Container
    ================================================== -->
    <div class="dash-content-wrap">
        <header id="header-container" class="db-top-header">

          @include('includes.header')

        </header>
    </div>
    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- START SECTION DASHBOARD -->
    <section class="user-page section-padding">
        <div class="container-fluid">
            <div class="row">

                    @include('includes.sidebar-inspection')

                <div class="col-lg-9 col-md-12 col-xs-12 user-dash2 pl-xl-0">

                    @include('includes.sidebar-mobile')

                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->

@include('includes.scripts')

</div>
<!-- Wrapper / End -->
@livewireScripts

<!-- lARAVEL PWA -->
<script src="{{ asset('/sw.js') }}"></script>
<script>
      if ('serviceWorker' in navivigator) {
            window.addEventListener('load',()=>{
                navigator.serviceWorker('/sw.js');
            });
            
        }
    //if (!navigator.serviceWorker.controller) {
     //   navigator.serviceWorker.register("/sw.js").then(function (reg) {
       //     console.log("Service worker has been registered for scope: " + reg.scope);
       // });
    //}
</script>
</body>

</html>
