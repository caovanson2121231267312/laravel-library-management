<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('home.web_name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="{{ asset('book_lib/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('book_lib/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
</head>

<body>
    @include('auth.header')

    @include('auth.login')

    @include('auth.register')

    @include('auth.banner')

    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">{{ trans('home.new_books') }}</h3>

            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>{{ trans('home.text_books') }}</li>
                    <li>{{ trans('home.reference_books') }}</li>
                    <li>{{ trans('home.comics') }}</li>
                    <li>{{ trans('home.newspaper') }}</li>
                </ul>

                <div class="resp-tabs-container">
                    <div class="tab1">
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{ asset('book_lib/images/m1.jpg') }}" alt="" class="pro-image-front">
                                    <img src="{{ asset('book_lib/images/m1.jpg') }}" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{ trans('home.new') }}</span>
                                </div>

                                <div class="item-info-product ">
                                    {{-- get name book --}}
                                    <h4><a href=""></a></h4>

                                    <div
                                        class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <form action="#" method="get">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value="" />
                                                <input type="hidden" name="item_name" value="e" />
                                                <input type="hidden" name="amount" value="1" />
                                                <input type="hidden" name="discount_amount" value="1" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value="" />
                                                <input type="submit" name="submit" value="{{ trans('home.add_to_form') }}" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Get 8 new book-->
                        <div class="clearfix"></div>
                    </div>

                    <div class="tab2">
                    </div>

                    <div class="tab3">
                    </div>

                    <div class="tab4">
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <div class="sale-w3ls">
        <div class="container">
            <div class="container">
                <h6 class="free">{{ trans('home.free') }}</h6>
                <a class="hvr-outline-out button2" href="">{{ trans('home.shop_now') }}</a>
            </div>
        </div>
    </div>

    <div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>

                    <div class="w3layouts_mail_grid_left2">
                        <h3>{{ trans('home.free') }}</h3>
                        <p>{{ trans('home.text') }}</p>
                    </div>
                </div>

                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>{{ trans('home.free') }}</h3>
                        <p>{{ trans('home.text') }}</p>
                    </div>
                </div>

                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>{{ trans('home.free') }}</h3>
                        <p>{{ trans('home.text') }}</p>
                    </div>
                </div>

                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>{{ trans('home.free') }}</h3>
                        <p>{{ trans('home.text') }}</p>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    @include('auth.footer')

    <script type="text/javascript" src="{{ asset('book_lib/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('book_lib/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('book_lib/js/minicart.min.js') }}"></script>
    <script src="{{ mix('js/add_book_to_form.js') }}"></script>
    <script src="{{ asset('book_lib/js/easy-responsive-tabs.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.countup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/bootstrap.js') }}"></script>
</body>

</html>
