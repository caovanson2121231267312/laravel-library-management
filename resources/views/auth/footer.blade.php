<div class="footer">
    <div class="footer_agile_inner_info_w3l">
        <div class="col-md-3 footer-left">
            <h2>
                <a href="{{ route('home') }}">
                    <span>{{ trans('message.web_name') }}</span>
                </a>
            </h2>
            <p>{{ trans('home.text') }}</p>
            <ul class="social-nav model-3d-0 footer-social w3_agile_social two">
                <li>
                    <a href="#" class="facebook">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    </a>
                </li>

                <li>
                    <a href="#" class="twitter">
                        <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    </a>
                </li>

                <li>
                    <a href="#" class="instagram">
                        <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                    </a>
                </li>

                <li>
                    <a href="#" class="pinterest">
                        <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-9 footer-right">
            <div class="sign-grds">
                <div class="col-md-5 sign-gd">
                    <h4>{{ trans('home.my_info') }}</h4>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ trans('home.home') }}
                            </a>                                
                        </li>
                        <li><a href="">{{ trans('message.books') }}</a></li>
                        <li><a href="">{{ trans('message.authors') }}</a></li>
                        <li><a href="">{{ trans('message.publishers') }}</a></li>
                        <li><a href="">{{ trans('home.contact') }}</a></li>
                    </ul>
                </div>

                <div class="col-md-7 sign-gd-two">
                    <h4>{{ trans('home.lib_info') }}</h4>
                    <div class="w3-address">
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>

                            <div class="w3-address-right">
                                <h6>{{ trans('message.phone_number') }}</h6>
                                <p>{{ trans('home.call') }}</p>
                            </div>

                            <div class="clearfix"> </div>
                        </div>

                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>

                            <div class="w3-address-right">
                                <h6>{{ trans('login.email') }}</h6>
                                <p><a href="">{{ trans('home.info') }}</a></p>
                            </div>

                            <div class="clearfix"> </div>
                        </div>

                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>

                            <div class="w3-address-right">
                                <h6>{{ trans('home.location') }}</h6>
                                <p>{{ trans('home.text') }}</p>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix"></div>

        <p class="copy-right">{{ trans('home.copy') }}</p>
    </div>
</div>
