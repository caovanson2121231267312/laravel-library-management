@extends('layouts.app')

@section('content')
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>{{ trans('message.books') }}</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
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
                    <div class="col-md-3 product-men">
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

                            <div class="item-info-product ">
                                <h4><a href="{{ route('book_detail', $book->id) }}">{{ $book->title }}</a></h4>

                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="get">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value="" />
                                            <input type="hidden" name="item_name" value="{{ $book->title }}" />
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
                @endforeach

                <div class="clearfix"></div>
            </div>
            
            <div class="text-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
