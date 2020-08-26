<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item item2">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item item3">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item item4">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item item5">
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">{{ trans('home.previous') }}</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">{{ trans('home.next') }}</span>
    </a>
</div>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="{{ asset('book_lib/images/bottom1.jpg') }}" alt=" " class="img-responsive" />
                    <figcaption>
                    </figcaption>
                </figure>
            </div>

            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="{{ asset('book_lib/images/bottom2.jpg') }}" alt=" " class="img-responsive" />
                    <figcaption>
                    </figcaption>
                </figure>
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <h3 class="wthree_text_info">{{ trans('home.what_trending') }}</h3>

        <div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
            <a href="">
                <div class="bb-left-agileits-w3layouts-inner grid">
                    <figure class="effect-roxy">
                        <img src="{{ asset('book_lib/images/bb1.jpg') }}" alt=" " class="img-responsive" />
                        <figcaption>
                        </figcaption>			
                    </figure>
                </div>
            </a>
        </div>

        <div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
            <a href="">
                <div class="bb-middle-agileits-w3layouts grid">
                    <figure class="effect-roxy">
                        <img src="{{ asset('book_lib/images/bottom3.jpg') }}" alt=" " class="img-responsive" />
                        <figcaption>
                        </figcaption>			
                    </figure>
                </div>
            </a>

            <a href="">
                <div class="bb-middle-agileits-w3layouts forth grid">
                    <figure class="effect-roxy">
                        <img src="{{ asset('book_lib/images/bottom4.jpg') }}" alt=" " class="img-responsive">
                        <figcaption>
                        </figcaption>		
                    </figure>
                </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="agile_last_double_sectionw3ls">
    <div class="col-md-6 multi-gd-img multi-gd-text ">
        <a href="">
            <img src="{{ asset('book_lib/images/bot_1.jpg') }}" alt=" ">
        </a>
    </div>

    <div class="col-md-6 multi-gd-img multi-gd-text ">
        <a href="">
            <img src="{{ asset('book_lib/images/bot_2.jpg') }}" alt=" ">
        </a>
    </div>

    <div class="clearfix"></div>
</div>
