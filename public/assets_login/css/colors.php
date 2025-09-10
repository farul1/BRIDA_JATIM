<?php
header ("Content-Type:text/css");

$main = '#009d73';
$light = '#00ae80';
$dark = '#00815f';
$dark_lv2 = '#006247';
$dark_lv3 = '#004a36';

function checkHex($color) {
	return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

function convertHexToRGB($color) {
    $split = str_split(str_replace('#','',$color), 2);
    $r = hexdec($split[0]);
    $g = hexdec($split[1]);
    $b = hexdec($split[2]);

    return $r . ", " . $g . ", " . $b;
}

if((isset($_GET['main']) AND $_GET['main'] != '') OR
    (isset($_GET['light']) AND $_GET['light'] != '') OR
    (isset($_GET['dark']) AND $_GET['dark'] != '') OR
    (isset($_GET['dark_lv2']) AND $_GET['dark_lv2'] != '') OR
    (isset($_GET['dark_lv3']) AND $_GET['dark_lv3'] != '')) {

	$main = "#".$_GET['main'];
	$light = "#".$_GET['light'];
	$dark = "#".$_GET['dark'];
	$dark_lv2 = "#".$_GET['dark_lv2'];
	$dark_lv3 = "#".$_GET['dark_lv3'];
}

if((!$main OR !checkHex($main)) AND (!$light OR !checkHex($light)) AND (!$dark OR !checkHex($dark)) AND
    (!$dark_lv2 OR !checkHex($dark_lv2)) AND (!$dark_lv3 OR !checkHex($dark_lv3))) {

    $main = '#009d73';
    $light = '#00ae80';
    $dark = '#00815f';
    $dark_lv2 = '#006247';
    $dark_lv3 = '#004a36';

}
    $main = '#E23C8E';
    $dark = '#A2175C';
?>

::selection { background: <?php echo $main; ?> !important; }

::-moz-selection { background: <?php echo $main; ?> !important; }

::-webkit-selection { background: <?php echo $main; ?> !important; }

body::-webkit-scrollbar-thumb:hover {
background: rgba(<?php echo convertHexToRGB($main) ?>, 0.8) !important;
}

body::-webkit-scrollbar-thumb:active {
background: rgb(<?php echo convertHexToRGB($main) ?>) !important;
}

.btn:focus,
.btn:active,
.btn:active:focus,
.custom-select:focus,
.form-control:focus {
border-color: <?php echo $main; ?> !important;
}

a {
color: <?php echo $main; ?>;
}

.bg-primary {
background-color: <?php echo $main; ?> !important;
}

.text-primary, .text-primary-all *, .text-primary-all *:before, .text-primary-all *:after {
color: <?php echo $main; ?> !important;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::before,
.custom-control-input:checked ~ .custom-control-label::before {
background-color: <?php echo $main; ?> !important;
}

.custom-file-input:focus + .custom-file-label {
border-color: <?php echo $main; ?> !important;
}

.selectgroup-input:focus + .selectgroup-button, .selectgroup-input:checked + .selectgroup-button {
background-color: <?php echo $main; ?> !important;
}

.custom-switch-input:checked ~ .custom-switch-indicator {
background: <?php echo $main; ?> !important;
}

.custom-switch-input:focus ~ .custom-switch-indicator {
border-color: <?php echo $main; ?> !important;
}

.imagecheck-input:focus ~ .imagecheck-figure {
border-color: <?php echo $main; ?> !important;
}

.imagecheck-figure:before {
background: <?php echo $main; ?> url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E") no-repeat center center/50% 50%;
}

.list-group-item.active {
background-color: <?php echo $main; ?> !important;
}

.list-group-item-primary {
background-color: <?php echo $main; ?> !important;
}

.alert.alert-primary {
background-color: <?php echo $main; ?> !important;
}

.card .card-header h4 + .card-header-action .btn.active,
.card .card-header h4 + .card-header-form .btn.active {
box-shadow: 0 2px 6px <?php echo $light; ?> !important;
background-color: <?php echo $main; ?> !important;
}

.card.card-primary {
border-top: 2px solid <?php echo $main; ?> !important;
}

.card.card-primary {
border-top: 2px solid <?php echo $main; ?> !important;
}

.card.card-hero .card-header {
background-image: linear-gradient(to bottom, <?php echo $dark_lv2; ?>, <?php echo $light; ?>) !important;
}

.nav-tabs .nav-item .nav-link {
color: <?php echo $main; ?>;
}

.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
background-color: <?php echo $main; ?>;
}

.nav-pills .nav-item .nav-link {
color: <?php echo $main; ?>;
}

.nav-pills .nav-item .nav-link.active {
box-shadow: 0 2px 6px <?php echo $light; ?>;
background-color: <?php echo $main; ?>;
}

.page-item .page-link {
color: <?php echo $main; ?>;
}

.page-item.active .page-link {
background-color: <?php echo $main; ?>;
border-color: <?php echo $main; ?>;
}

.page-item.disabled .page-link {
color: <?php echo $main; ?>;
}

.page-link:hover {
background-color: <?php echo $main; ?>;
}

.badge.badge-primary {
background-color: <?php echo $main; ?> !important;
}

.btn-primary, .btn-primary.disabled {
box-shadow: 0 2px 6px <?php echo $light; ?> !important;
background-color: <?php echo $main; ?> !important;
border-color: <?php echo $main; ?> !important;
}

.btn-primary:focus, .btn-primary.disabled:focus {
background-color: <?php echo $dark_lv2; ?> !important;
}

.btn-primary:focus:active, .btn-primary.disabled:focus:active {
background-color: <?php echo $dark_lv2; ?> !important;
}

.btn-primary:active, .btn-primary:hover, .btn-primary.disabled:active, .btn-primary.disabled:hover {
background-color: <?php echo $dark_lv2; ?> !important;
}

.btn-outline-primary, .btn-outline-primary.disabled {
border-color: <?php echo $main; ?> !important;
color: <?php echo $main; ?> !important;
}

.btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.disabled:hover, .btn-outline-primary.disabled:focus, .btn-outline-primary.disabled:active {
background-color: <?php echo $main; ?> !important;
}

.btn-outline-white:hover, .btn-outline-white:focus, .btn-outline-white:active, .btn-outline-white.disabled:hover, .btn-outline-white.disabled:focus, .btn-outline-white.disabled:active {
color: <?php echo $main; ?> !important;
}

.btn-group .btn.active {
background-color: <?php echo $main; ?> !important;
}

.media .media-right {
color: <?php echo $main; ?> !important;
}

.accordion .accordion-header[aria-expanded="true"] {
box-shadow: 0 2px 6px <?php echo $light; ?> !important;
background-color: <?php echo $main; ?> !important;
}

.navbar.active {
background-color: <?php echo $main; ?> !important;
}

.navbar-bg {
background-color: <?php echo $main; ?> !important;
}

a.dropdown-item:focus, a.dropdown-item:active, a.dropdown-item.active {
background-color: <?php echo $main; ?> !important;
}

.dropdown-list .dropdown-item:focus {
background-color: <?php echo $main; ?> !important;
}

.dropdown-flag .dropdown-item.active {
background-color: <?php echo $main; ?> !important;
}

.progress-bar {
background-color: <?php echo $main; ?>;
}

a.bb {
border-bottom: 1px solid <?php echo $main; ?> !important;
}

.circle-step .circle.circle-primary {
border-color: <?php echo $main; ?> !important;
color: <?php echo $main; ?> !important;
}

.section .section-header .section-header-back .btn:hover {
background-color: <?php echo $main; ?> !important;
}

.section .section-title:before {
background-color: <?php echo $main; ?> !important;
}

body.sidebar-mini .main-sidebar .sidebar-menu > li.active > a {
box-shadow: 0 4px 8px <?php echo $light; ?>;
background-color: <?php echo $main; ?>;
}

body.sidebar-mini .main-sidebar .sidebar-menu > li ul.dropdown-menu li > a:focus,
body.sidebar-mini .main-sidebar .sidebar-menu > li ul.dropdown-menu li.active > a,
body.sidebar-mini .main-sidebar .sidebar-menu > li ul.dropdown-menu li.active > a:hover {
background-color: <?php echo $main; ?>;
}

body.layout-2 .main-sidebar .sidebar-menu li a:hover {
color: <?php echo $main; ?>;
}

body.layout-3 .navbar.navbar-secondary .navbar-nav > .nav-item.active > .nav-link {
color: <?php echo $main; ?>;
}

body.layout-3 .navbar.navbar-secondary .navbar-nav > .nav-item > .nav-link:before {
background-color: <?php echo $main; ?>;
}

body.layout-3 .navbar.navbar-secondary .navbar-nav > .nav-item .dropdown-menu .nav-item.active > .nav-link,
body.layout-3 .navbar.navbar-secondary .navbar-nav > .nav-item .dropdown-menu .nav-item .nav-link:focus {
background-color: <?php echo $main; ?>;
}

.main-sidebar .sidebar-menu li.active a {
color: <?php echo $main; ?>;
}

.main-sidebar .sidebar-menu li ul.dropdown-menu li a:hover {
color: <?php echo $main; ?>;
}

.main-sidebar .sidebar-menu li ul.dropdown-menu li.active > a {
color: <?php echo $main; ?>;
}

body:not(.sidebar-mini) .sidebar-style-1 .sidebar-menu li.active a {
background-color: <?php echo $main; ?>;
}

body:not(.sidebar-mini) .sidebar-style-1 .sidebar-menu li.active ul.dropdown-menu li a:hover {
background-color: <?php echo $main; ?>;
}

body:not(.sidebar-mini) .sidebar-style-2 .sidebar-menu > li.active > a:before {
background-color: <?php echo $main; ?>;
}

.progress .bar {
background: <?php echo $main; ?>;
}

.chat-box .chat-content .chat-item.chat-right .chat-details .chat-text {
background-color: <?php echo $main; ?> !important;
}

.ranges li {
color: <?php echo $main; ?> !important;
}

.ranges li:hover, .ranges li.active {
background-color: <?php echo $main; ?> !important;
}

.daterangepicker td.active, .daterangepicker td.active:hover {
background-color: <?php echo $main; ?> !important;
}

.dropzone {
border: 2px dashed <?php echo $main; ?> !important;
}

.fc button.fc-state-active {
background-color: <?php echo $main; ?> !important;
}

.jqvmap-circle {
border: 3px solid <?php echo $main; ?> !important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice,
.select2-container--default .select2-results__option[aria-selected=true],
.select2-container--default .select2-results__option--highlighted[aria-selected] {
background-color: <?php echo $main; ?> !important;
}

.selectric-open .selectric {
border-color: <?php echo $main; ?> !important;
}

.selectric-items li.selected, .selectric-items li.highlighted {
background-color: <?php echo $main; ?> !important;
}

.bootstrap-tagsinput .tag {
background-color: <?php echo $main; ?> !important;
}

.weather ul li {
border: 2px solid <?php echo $main; ?> !important;
color: <?php echo $main; ?> !important;
}

.tickets .ticket-items .ticket-item:hover .ticket-title {
color: <?php echo $main; ?> !important;
}

.tickets .ticket-items .ticket-item.active {
box-shadow: 0 2px 6px <?php echo $light; ?> !important;;
background-color: <?php echo $main; ?> !important;
}

.owl-theme .owl-dots .owl-dot.active span {
background-color: <?php echo $main; ?> !important;
}

.activities .activity:before {
background-color: <?php echo $main; ?> !important;
}

.empty-state .empty-state-icon {
background-color: <?php echo $main; ?> !important;
}

.pricing.pricing-highlight .pricing-title {
background-color: <?php echo $main; ?> !important;
}

.pricing.pricing-highlight .pricing-cta a {
background-color: <?php echo $main; ?> !important;
}

.pricing .pricing-title {
color: <?php echo $main; ?> !important;
}

.avatar {
background: <?php echo $main; ?> !important;
}

.wizard-steps .wizard-step.wizard-step-active {
box-shadow: 0 2px 6px <?php echo $light; ?> !important;
background-color: <?php echo $main; ?> !important;
}

.wizard-steps .wizard-step.wizard-step-active:before {
background-color: <?php echo $main; ?> !important;
}

.swal-button--confirm, .swal-button--edit {
background-color: <?php echo $main; ?> !important;
border: 1px solid <?php echo $dark; ?> !important;
box-shadow: 0 2px 6px <?php echo $light; ?> !important;
}

.swal-button--confirm:active, .swal-button--edit:active {
background-color: <?php echo $dark; ?> !important;
}

@media (max-width: 1024px) {
.nav-collapse .navbar-nav .nav-item .nav-link:hover {
color: <?php echo $main; ?> !important;
}

.nav-collapse .navbar-nav .nav-item:focus > a, .nav-collapse .navbar-nav .nav-item.active > a {
background-color: <?php echo $main; ?> !important;
}
}
