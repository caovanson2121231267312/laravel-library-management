@extends('layouts.app')

@section('content')

    @include('auth.banner')

    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info">{{ trans('home.what_trending') }}</h3>
                @foreach ($hotBooks as $hotBook)
                    <div class="col-md-3 product-men add-book-div">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ $hotBook->image }}" alt="" class="pro-image-front">
                                <img src="{{ $hotBook->image }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('book_detail', $hotBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-info-product">
                                <h4><a class="book-name" href="{{ route('book_detail', $hotBook->id) }}">{{ $hotBook->title }}</a></h4>

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <button class="add-book" data-id="{{ $hotBook->id }}">
                                        {{ trans('home.add_to_form') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>

            <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info">{{ trans('home.new_books') }}</h3>
                @foreach ($newBooks as $newBook)
                    <div class="col-md-3 product-men add-book-div">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ $newBook->image }}" alt="" class="pro-image-front">
                                <img src="{{ $newBook->image }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('book_detail', $newBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                    </div>
                                </div>
                            </div>
                            <span class="product-new-top">{{ trans('home.new') }}</span>

                            <div class="item-info-product">
                                <h4><a class="book-name" href="{{ route('book_detail', $newBook->id) }}">{{ $newBook->title }}</a></h4>

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <button class="add-book" data-id="{{ $newBook->id }}">
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

    <div class="sale-w3ls">
        <div class="container">
            <div class="container">
                <h6 class="free">{{ trans('home.free') }}</h6>
                <a class="hvr-outline-out button2" href="{{ route('book.index') }}">
                    {{ trans('home.shop_now') }}
                </a>
            </div>
        </div>
    </div>
@endsection
