<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">{{ trans('login.register') }}</h3>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="name" class="@error('name') is-invalid @enderror" required="">
                            <label>{{ trans('login.name') }}</label>
                            <span></span>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="styled-input">
                            <input type="text" name="email" class="@error('email') is-invalid @enderror" required="">
                            <label>{{ trans('login.email') }}</label>
                            <span></span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="styled-input">
                            <input type="text" name="phone_number" class="@error('phone_number') is-invalid @enderror"
                                required="">
                            <label>{{ trans('login.phone_number') }}</label>
                            <span></span>
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="styled-input">
                            <input type="password" name="password" class="@error('password') is-invalid @enderror"
                                required="">
                            <label>{{ trans('login.password') }}</label>
                            <span></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="styled-input">
                            <input type="password" name="password_confirmation" required="">
                            <label>{{ trans('login.confirm_password') }}</label>
                            <span></span>
                        </div>

                        <input type="submit" value="{{ trans('login.register') }}">
                    </form>

                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                    
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{ asset('book_lib/images/log_pic.jpeg') }}" alt=" " />
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
