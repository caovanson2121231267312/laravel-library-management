@extends('layouts.app')

@section('content')
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short book">
                        <li><a href="{{ route('home') }}">{{ trans('home.home') }}</a><i>|</i></li>
                        <li>{{ trans('message.books') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="single-pro">
                @foreach ($books as $book)
                    <div class="col-md-3 product-men add-book-div">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ $book->image }}" alt="" class="pro-image-front">
                                <img src="{{ $book->image }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{ route('book_detail', $book->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-info-product">
                                <h4><a class="book-name" href="{{ route('book_detail', $book->id) }}">{{ $book->title }}</a></h4>

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <button class="add-book" data-id="{{ $book->id }}">
                                        {{ trans('home.add_to_form') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
            
            <div class="text-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
