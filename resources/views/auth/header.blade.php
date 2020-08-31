<div class="header" id="home">
    <div class="container">
        <ul>
            @if (Auth::check())
                <li>
                    <a href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        {{ Auth::user()->name }}
                    </a>
                </li>
            @else
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        {{ trans('login.login') }}
                    </a>
                </li>
            @endif

            @if (Auth::check())
                <li>
                    <a href="{{ route('logout') }}" role="button">
                        <i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>
                        {{ trans('login.logout') }}
                    </a>
                </li>
            @else
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        {{ trans('login.register') }}
                    </a>
                </li>
            @endif

            <li>
                <i class="fa fa-phone" aria-hidden="true"></i>
                {{ trans('home.call') }}
            </li>

            <li>
                <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="">{{ trans('home.eng') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="">{{ trans('home.vi') }}</a>
            </li>
        </ul>
    </div>
</div>

<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="{{ trans('home.search') }}" required="">
                <input type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="col-md-4 logo_agile">
            <h1>
                <a href="{{ route('home') }}">
                    <span>{{ trans('message.web_name') }}</span>
                </a>
            </h1>
        </div>

        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">{{ trans('home.share') }}</li>

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

        <div class="clearfix"></div>
    </div>
</div>

<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current">
                                <a class="menu__link" href="{{ route('home') }}">
                                    {{ trans('home.home') }}
                                </a>
                            </li>

                            <li class="dropdown menu__item">
                                <a href="" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('message.books') }} 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="{{ route('book.index') }}"><img src="{{ asset('book_lib/images/top1.jpg') }}" alt=" " /></a>
                                        </div>

                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($categoriesLeft as $categoryLeft)
                                                    <li><a href="{{ route('book.index') }}">{{ $categoryLeft->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($categoriesRight as $categoryRight)
                                                    <li><a href="{{ route('book.index') }}">{{ $categoryRight->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>           
                            
                            <li class="dropdown menu__item">
                                <a href="" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('message.authors') }} 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="{{ route('author.index') }}"><img src="{{ asset('book_lib/images/top2.jpg') }}" alt=" " /></a>
                                        </div>

                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($authorsLeft as $authorLeft)
                                                    <li><a href="{{ route('author_detail', $authorLeft->id) }}">{{ $authorLeft->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($authorsRight as $authorRight)
                                                    <li><a href="{{ route('author_detail', $authorRight->id) }}">{{ $authorRight->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>   
                                
                            @if (Auth::check())
                                <li class=" menu__item">
                                    <a class="menu__link" href="{{ route('requests.index') }}">
                                        {{ trans('request.my_request') }}
                                    </a>
                                </li>
                            @endif

                            <li class=" menu__item">
                                <a class="menu__link" href="">
                                    {{ trans('home.contact') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        @if (Auth::check())
            <div class="top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                    <a>
                        <button  class="w3view-cart chooseBooks" type="submit" name="submit" data-toggle="modal" data-target="#borrowBookForm">
                            <i class="fa fa-wpforms" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
            </div>
        @endif
        
        <div class="clearfix"></div>
    </div>
</div>
