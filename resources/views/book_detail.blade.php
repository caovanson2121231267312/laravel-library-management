@extends('layouts.app')

@section('content')
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{ $book->image }}">
                                <div class="thumb-image"> <img src="{{ $book->image }}" data-imagezoom="true"
                                        class="img-responsive"> </div>
                            </li>

                            <li data-thumb="{{ $book->image }}">
                                <div class="thumb-image"> <img src="{{ $book->image }}" data-imagezoom="true"
                                        class="img-responsive"> </div>
                            </li>

                            <li data-thumb="{{ $book->image }}">
                                <div class="thumb-image"> <img src="{{ $book->image }}" data-imagezoom="true"
                                        class="img-responsive"> </div>
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8 single-right-left simpleCart_shelfItem add-book-div">
                <h3 class="mb-32px book-name">{{ $book->title }}</h3>
                <div class="rating1 mb-32px">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" checked>
                        <label for="rating5" data-id="5" class="test"></label>
                        <input id="rating4" type="radio" name="rating">
                        <label for="rating4" data-id="4" class="test"></label>
                        <input id="rating3" type="radio" name="rating">
                        <label for="rating3" data-id="3" class="test"></label>
                        <input id="rating2" type="radio" name="rating">
                        <label for="rating2" data-id="2" class="test"></label>
                        <input id="rating1" type="radio" name="rating">
                        <label for="rating1" data-id="1" class="test"></label>
                    </span>
                </div>

                <div class="description mb-32px">
                    <span class="mr-20">
                        <a href="{{ route('like', $book->id) }}">
                            <i class="fas fa-thumbs-up text-black"></i> 
                        </a>
                        {{ $countLike->count() }}                 
                    </span> 
                    <span>
                        <a href="{{ route('unlike', $book->id) }}">
                            <i class="fas fa-thumbs-down text-black"></i>
                        </a>
                        {{ $countUnlike->count() }}  
                    </span> 
                </div>

                <div class="description mb-32px">
                    <span>{{ trans('home.written_by') }}</span>
                    <a href="{{ route('author_detail', $book->author->id) }}">{{ $book->author->name }}</a>
                </div>

                <div class="description mb-32px">
                    <span>{{ trans('home.from') }}</span>
                    <a href="">{{ $book->publisher->name }}</a>
                    <span>{{ trans('message.publisher') }}</span>
                </div>

                <div class="description">
                    <span>{{ $book->number_of_available_books }} {{ trans('home.book_in_now') }}</span>
                </div>

                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                        <button class="add-book" data-id="{{ $book->id }}">
                            {{ trans('home.add_to_form') }}
                        </button>
                    </div>

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

            <div class="responsive_tabs_agileits">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li>{{ trans('message.description') }}</li>
                        <li>{{ trans('home.reviews') }}</li>
                    </ul>
                    <div class="resp-tabs-container">
                        <div class="tab1">
                            <div class="single_page_agile_its_w3ls">
                                <p>{{ $book->description }}</p>
                            </div>
                        </div>

                        <div class="tab2">
                            {{-- comment book --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info">{{ trans('home.related_books') }}</h3>
                @foreach ($relatedBooks as $relatedBook)
                    <div class="col-md-3 product-men add-book-div">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ $relatedBook->image }}" alt="" class="pro-image-front">
                                <img src="{{ $relatedBook->image }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('book_detail', $relatedBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-info-product">
                                <h4><a class="book-name" href="{{ route('book_detail', $relatedBook->id) }}">{{ $relatedBook->title }}</a></h4>

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <button class="add-book" data-id="{{ $relatedBook->id }}">
                                        {{ trans('home.add_to_form') }}
                                    </button>
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
