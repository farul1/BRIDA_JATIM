<link id="bootstrap" href="{{ asset('asset_frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link id="bootstrap-grid" href="{{ asset('asset_frontend/css/bootstrap-grid.min.css') }}" rel="stylesheet"
    type="text/css" />
<link id="bootstrap-reboot" href="{{ asset('asset_frontend/css/bootstrap-reboot.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('asset_frontend/css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/owl.theme.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_front_index.css') }}">

<!-- color scheme -->
<link id="colors" href="{{ asset('asset_frontend/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset_frontend/css/coloring.css') }}" rel="stylesheet" type="text/css" />
<!-- RS5.0 Stylesheet -->
<link rel="stylesheet" href="{{ asset('asset_frontend/revolution/css/settings.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('asset_frontend/revolution/css/layers.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('asset_frontend/revolution/css/navigation.css') }}" type="text/css">
{{-- Afu --}}
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/front.min.css') }}" type="text/css">
{{-- end Afu --}}
<!-- Javascript Files
    ================================================== -->
<script src="{{ asset('asset_frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/easing.js') }}"></script>
<script src="{{ asset('asset_frontend/js/owl.carousel.js') }}"></script>
<script src="{{ asset('asset_frontend/js/validation.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/enquire.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.plugin.js') }}"></script>
<script src="{{ asset('asset_frontend/js/typed.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('asset_frontend/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('asset_frontend/js/typed.js') }}"></script>
<script src="{{ asset('asset_frontend/js/designesia.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<!-- RS5.0 Core JS Files -->
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/jquery.themepunch.tools.min.js?rev=5.0') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') }}"></script>
<!-- RS5.0 Extensions Files -->
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript"
src="{{ asset('asset_frontend/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
{{-- afu --}}
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
{{-- end afu --}}
<script>
    jQuery(document).ready(function() {
        // revolution slider
        jQuery("#slider-revolution").revolution({
            sliderType: "standard",
            sliderLayout: "fullwidth",
            delay: 5000,
            navigation: {
                arrows: {
                    enable: true
                },
                bullets: {
                    enable: true,
                    hide_onmobile: false,
                    style: "hermes",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 20,
                    v_offset: 30,
                    space: 5,
                },

            },
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
            },
            responsiveLevels: [1920, 1380, 1240],
            gridwidth: [1200, 1200, 940],
            spinner: "off",
            gridheight: 700,
            disableProgressBar: "on"
        });
    });
</script>
