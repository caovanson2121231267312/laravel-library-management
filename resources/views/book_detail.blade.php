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
                <h3 class="mb-32px book-name size-40">{{ $book->title }}</h3>
                <div class="rating1 mb-32px ml-7px">
                    <div id="rate" data-rate={{ $rate }}></div>
                    {{-- <input type="hidden" data-rate={{ $rate }}> --}}
                </div>

                <div class="rating1 mb-32px ml-7px">
                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendRate" value="{{ trans('request.send_rate') }}">
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
                        @if ($book->number_of_available_books == config('const.zero'))
                            <button class="add-book" disabled>
                                {{ trans('request.out_of_books') }}
                            </button> 
                        @else
                            <button class="add-book" data-id="{{ $book->id }}">
                                {{ trans('home.add_to_form') }}
                            </button> 
                        @endif
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
                                    @if ($relatedBook->number_of_available_books == config('const.zero'))
                                        <button class="add-book" disabled>
                                            {{ trans('request.out_of_books') }}
                                        </button> 
                                    @else
                                        <button class="add-book" data-id="{{ $relatedBook->id }}">
                                            {{ trans('home.add_to_form') }}
                                        </button> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendRate" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-12 modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign text-center">{{ trans('request.ratting') }}</h3>
                        <form method="POST" action="{{ route('rate', $book->id) }}">
                            @csrf    
                            <div class="styled-input">
                                <a id="myRate" class="set-rate"></a>
                                <input type="hidden" name="ratting" id="ratting">
                            </div>

                            <div class="col-md-12 test text-center">
                                <input type="submit" value="{{ trans('request.send') }}" class="bg-blue">
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
