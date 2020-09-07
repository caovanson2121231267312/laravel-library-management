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
            <div class="col-md-3 products-left">
                <div class="css-treeview">
                    <h4>{{ trans('message.categories') }}</h4>
                    <table id="tree-table" class="table table-hover table-bordered mb-0">
                        <tbody>
                            @foreach ($parentCategories as $category)
                                <tr data-id="{{$category->id}}" data-parent="0" data-level="1">
                                    <td data-column="name">
                                        <a class="decoration-none" href="{{ route('show_by_category', [$category->name, $category->id]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                </tr>
                                @if (count($category->subCategories))
                                    @include ('sub_categories_list', [
                                        'subCategories' => $category->subCategories, 
                                        'dataParent' => $category->id , 
                                        'dataLevel' => 1,
                                    ])
                                @endif      
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-9 products-right mt-30">
                <div class="single-pro">
                    <div class="products-right text-center">
                        <h5>
                            {{ $getCategory->name }}
                        </h5>
                    </div>
                    
                    @foreach ($allBooks as $book)
                        <div class="col-md-4 product-men add-book-div">
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
            </div>
        </div>
    </div>
@endsection
