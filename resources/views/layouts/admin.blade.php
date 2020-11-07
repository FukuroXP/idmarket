<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<head>
    <meta charset="utf-8" />

    <title>Admin</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{ asset('admin_asset/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_asset/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/vendors/base/vendors.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/demo/default/base/style.bundle.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('admin_asset/demo/default/media/img/logo/favicon.ico') }}" />
</head>
<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

<div class="m-grid m-grid--hor m-grid--root m-page">

    <header id="m_header" class="m-grid__item m-heade"  m-minimize-offset="200" m-minimize-mobile-offset="200" style="background: #282a3c;">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="/admin" class="m-brand__logo-wrapper">
                                <img alt="" class="w-100" src="{{ asset('admin_asset/demo/default/media/img/logo/logo_default_dark.png') }}"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">


                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                    m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">

                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner ">
                                            <div class="m-dropdown__header">
                                                <form  class="m-list-search__form">
                                                    <div class="m-list-search__form-wrapper">
						<span class="m-list-search__form-input-wrapper">
							<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
						</span>
                                                        <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
							<i class="la la-remove"></i>
						</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
                                                    <div class="m-dropdown__content">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    <ul class="navbar-nav ml-auto">

                                        <div class="mt-3 mr-5" style="font-size: 18px">
                                            @guest
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                                @if (Route::has('register'))
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    </li>
                                                @endif
                                            @else

                                                <li class="navbar-nav">

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>

                                            @endguest
                                        </div>

                                    </ul>
                                </li>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
            <div
                id="m_ver_menu"
                class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                m-menu-vertical="1"
                m-menu-scrollable="1" m-menu-dropdown-timeout="500"
                style="position: relative;">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
                        <a  href="/admin" class="m-menu__link " >
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">  <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Dashboard</span>
                        </span></span></a></li><li class="m-menu__section ">
                        <h4 class="m-menu__section-text">CRUD</h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" >
                        <a  href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link">
                            <i class="m-menu__link-icon flaticon-download"></i>
                            <span class="m-menu__link-text">Input</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i></a><div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/product_create" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Product</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/category_create" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Category</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/role_create" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Role</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" >
                        <a  href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link">
                            <i class="m-menu__link-icon flaticon-tabs"></i>
                            <span class="m-menu__link-text">Table</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i></a><div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/product_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Product</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/category_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Category</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/role_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Role</span></a></li>
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/transactions_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Transactions</span></a></li>
                                @if(auth()->user()->role_id == 1)
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/admin_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">Admin</span></a></li>
                                @endif
                                <li class="m-menu__item " aria-haspopup="true" >
                                    <a  href="/admin/user_show" class="m-menu__link " >
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text">User</span></a></li>
                            </ul>
                        </div>
                    </li>
            </div>
        </div>


        <div class="col-12">

            @yield('content')

        </div>

    </div>





    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					2020 &copy; Idmarket <a href="https://keenthemes.com" class="m-link">Fukuro</a>
				</span>
                </div>
            </div>
        </div>
    </footer>

</div>

<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src="{{ asset('admin_asset/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/app/js/dashboard.js') }}" type="text/javascript"></script>

<script src="{{ asset('admin_asset/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin_asset/demo/default/custom/crud/datatables/basic/paginations.js') }}" type="text/javascript"></script>
</body>
</html>
