@extends('layouts.app')

@section('content')
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short book">
                        <li><a href="{{ route('home') }}">{{ trans('home.home') }}</a><i>|</i></li>
                        <li>{{ trans('message.authors') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="products-right text-center">
                <h5>
                    {{ trans('message.authors') }}
                </h5>
            </div>

            <div class="single-pro">
                @foreach ($authors as $author)
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="{{ $author->avatar }}" alt="" class="pro-image-front">
                            <img src="{{ $author->avatar }}" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{ route('author_detail', $author->id) }}"
                                        class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="item-info-product ">
                            <h4><a href="{{ route('author_detail', $author->id) }}">{{ $author->name }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>

            <div class="text-center">
                {{ $authors->links() }}
            </div>
        </div>
    </div>
@endsection
