[MENU_MOBILE]
<header class="header clearfix">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-14 hidden-sm hidden-xs">
                    <div class="topbar_left hidden-sm hidden-xs">
                        [HEADER_TOP_LEFT]
                    </div>
                </div>
                <div class="col-lg-12 col-md-10 col-sm-24 d-list col-xs-24 a-right topbar_right">
                    <div class="list-inline a-center f-right">
                        [HEADER_TOP_RIGHT]
                        <ul>
                            <li class="login_content">
                                <a rel="nofollow" class="hidden-lg click_account"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a>
                                <a rel="nofollow" href="{NV_BASE_SITEURL}users" class="hidden-xs hidden-sm hidden-md"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a>
                                <ul class="ul_account">
                                    <li><a rel="nofollow" href="{NV_BASE_SITEURL}users/">Đăng nhập</a></li>
                                    <li><a rel="nofollow" href="{NV_BASE_SITEURL}users/">Đăng ký</a></li>
                                </ul>
                            </li>
                            <li class="hidden-xs">
                                <a rel="nofollow" href="{NV_BASE_SITEURL}san-pham/san-pham-noi-bat" title="Khuyến mãi hot" class="account_a">
                                <i class="fa fa-star" aria-hidden="true"></i> Khuyến mãi hot
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a rel="nofollow" href="{NV_BASE_SITEURL}contact" title="Hệ thống cửa hàng" class="account_a">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Hệ thống cửa hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mid-header wid_100 f-left">
        <div class="container">
            <div class="row">
                <div class="content_header">
                    <div class="header-main">
                        <div class="menu-bar-h nav-mobile-button hidden-md hidden-lg">
                            <a rel="nofollow" href="#"><img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/i_menubar.png" alt="Menu Bar"></a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="logo">
                                <!-- BEGIN: image -->
                                <a rel="nofollow" title="{SITE_NAME}" href="{THEME_SITE_HREF}"><img src="{LOGO_SRC}" width="{LOGO_WIDTH}" height="{LOGO_HEIGHT}" alt="{SITE_NAME}" /></a>
                                <!-- END: image -->
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-xs-24 col-sm-24">
                            <div class="header-left">
                                [SEARCH]
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-24 no-padding-left">
                            <div class="header-right">
                                <div class="hotline_dathang hidden-sm">
                                    [HOTLINE]
                                </div>
                                <div class="top-cart-contain f-right">
                                    [CART]
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap_main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-24 col-xs-24 col-mega">
                    [MAIN_MENU]
                </div>
                <div class="col-lg-18 col-md-18 hidden-xs hidden-sm">
                    [SUB_MENU]
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.title_menu').click(function(){
                $('.list_menu_header_show').toggle();
            })
        })
    </script>
</header>
<h1 class="hidden">{SITE_NAME}</h1>
<!-- BEGIN: breadcrumbs -->
<div class="breadcrumbs-wrap">
    <div class="container">
        <div class="display">
            <a class="show-subs-breadcrumbs hidden" href="#" onclick="showSubBreadcrumbs(this, event);"><em class="fa fa-lg fa-angle-right"></em></a>
            <ul class="breadcrumbs list-none"></ul>
        </div>
        <ul class="subs-breadcrumbs"></ul>
        <ul class="temp-breadcrumbs hidden">
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{THEME_SITE_HREF}" itemprop="url" title="{LANG.Home}"><span itemprop="title">{LANG.Home}</span></a></li>
            <!-- BEGIN: loop --><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{BREADCRUMBS.link}" itemprop="url" title="{BREADCRUMBS.title}"><span class="txt" itemprop="title">{BREADCRUMBS.title}</span></a></li><!-- END: loop -->
        </ul>
    </div>
</div>
<!-- END: breadcrumbs -->
[THEME_ERROR_INFO]
