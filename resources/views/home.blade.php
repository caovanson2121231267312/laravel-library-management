@extends('layouts.app')

@section('content')

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
                        @foreach ($textBooks as $textBook)
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="{{ $textBook->image }}" alt="" class="pro-image-front">
                                        <img src="{{ $textBook->image }}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('book_detail', $textBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-info-product add-book-div">
                                        <h4><a href="{{ route('book_detail', $textBook->id) }}">{{ $textBook->title }}</a></h4>

                                        @if (Auth::check())
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <button class="add-book" data-id="{{ $textBook->id }}">
                                                    {{ trans('home.add_to_form') }}
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>

                    <div class="tab2">
                        @foreach ($referenceBooks as $referenceBook)
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="{{ $referenceBook->image }}" alt="" class="pro-image-front">
                                        <img src="{{ $referenceBook->image }}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('book_detail', $referenceBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-info-product add-book-div">
                                        <h4><a href="{{ route('book_detail', $referenceBook->id) }}">{{ $referenceBook->title }}</a></h4>

                                        @if (Auth::check())
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <button class="add-book" data-id="{{ $referenceBook->id }}">
                                                    {{ trans('home.add_to_form') }}
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>

                    <div class="tab3">
                        @foreach ($comics as $comic)
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="{{ $comic->image }}" alt="" class="pro-image-front">
                                        <img src="{{ $comic->image }}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('book_detail', $comic->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-info-product add-book-div">
                                        <h4><a href="{{ route('book_detail', $comic->id) }}">{{ $comic->title }}</a></h4>

                                        @if (Auth::check())
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <button class="add-book" data-id="{{ $comic->id }}">
                                                    {{ trans('home.add_to_form') }}
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>

                    <div class="tab4">
                        @foreach ($newspapers as $newspaper)
                            <div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="{{ $newspaper->image }}" alt="" class="pro-image-front">
                                        <img src="{{ $newspaper->image }}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('book_detail', $newspaper->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item-info-product add-book-div">
                                        <h4><a href="{{ route('book_detail', $newspaper->id) }}">{{ $newspaper->title }}</a></h4>

                                        @if (Auth::check())
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                <button class="add-book" data-id="{{ $newspaper->id }}">
                                                    {{ trans('home.add_to_form') }}
                                                </button>
                                            </div>    
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>
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
@endsection
