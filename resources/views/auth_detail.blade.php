@extends('layouts.app')

@section('content')
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{ $author->avatar }}">
                                <div class="thumb-image"> 
                                    <img src="{{ $author->avatar }}" data-imagezoom="true" class="img-responsive"> 
                                </div>
                            </li>

                            <li data-thumb="{{ $author->avatar }}">
                                <div class="thumb-image"> 
                                    <img src="{{ $author->avatar }}" data-imagezoom="true" class="img-responsive"> 
                                </div>
                            </li>

                            <li data-thumb="{{ $author->avatar }}">
                                <div class="thumb-image"> 
                                    <img src="{{ $author->avatar }}" data-imagezoom="true" class="img-responsive"> 
                                </div>
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3 class="mb-32px">{{ $author->name }}</h3>

                <div class="description mb-32px">
                    <p>{{ $author->email }}</p>
                </div>

                <div class="description mb-32px">
                    <i>{{ $author->description }}</i>
                </div>

                <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                    <li class="share">{{ trans('home.share') }}</li>
                    <li>
                        <a href="" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="" class="twitter">
                            <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="" class="instagram">
                            <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="" class="pinterest">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"> </div>

            <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info">{{ trans('message.books') }}</h3>
                @foreach ($author->books as $book)
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="{{ $book->image }}" alt="" class="pro-image-front">
                            <img src="{{ $book->image }}" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{ route('book_detail', $book->id) }}"
                                        class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="item-info-product ">
                            <h4><a href="{{ route('book_detail', $book->id) }}">{{ $book->title }}</a></h4>

                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                <a href="{{ route('add_to_form', $book->id) }}">
                                    <input type="submit" name="submit" value="{{ trans('home.add_to_form') }}" class="button" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
