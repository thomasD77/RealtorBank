<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->

<!-- START PRELOADER -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- END PRELOADER -->

<!-- SIGNATURE -->
<script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG', drawOnly:true, drawBezierCurves:true, lineTop:90});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    var sig_tenant = $('#sig_tenant').signature({syncField: '#signature65', syncFormat: 'PNG'});
    $('#clear65').click(function(e) {
        e.preventDefault();
        sig_tenant.signature('clear');
        $("#signature65").val('');
    });
</script>

<!-- SIDEBAR -->
<script>
    function getSidebar() {
        var filter = document.getElementById("sidebarResp");
        filter.classList.add("d-md-block");
    }
    function closeSidebar() {
        var filter = document.getElementById("sidebarResp");
        filter.classList.remove("d-md-block");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<!-- ARCHIVES JS -->
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/mmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/mmenu.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/slick2.js') }}"></script>
<script src="{{ asset('assets/js/fitvids.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('assets/js/lightcase.js') }}"></script>
<script src="{{ asset('assets/js/search.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/newsletter.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/searched.js') }}"></script>
<script src="{{ asset('assets/js/dashbord-mobile-menu.js') }}"></script>
<script src="{{ asset('assets/js/forms-2.js') }}"></script>
<script src="{{ asset('assets/js/color-switcher.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/range-slider.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
<script src="{{ asset('assets/js/barfiller.js') }}"></script>
{{--<script src="{{ asset('assets/js/Countdown.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/ui-lement.js') }}"></script>

<!-- MAIN JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>


