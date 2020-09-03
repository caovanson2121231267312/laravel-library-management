@extends('layouts.app')

@section('content')

@include('request_form')

<div class="page-head_agile_info_w3l">
    <div class="container">
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short book">
                    <li><a href="{{ route('home') }}">{{ trans('home.home') }}</a><i>|</i></li>
                    <li>{{ trans('request.my_request') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="grid_3 grid_5 wthree">
            <div class="col-md-12 agileits-w3layouts">
                <div>
                    <h3 class="float-left">{{ trans('request.my_request') }}</h3>

                    <a href="#" class="float-right" data-toggle="modal" data-target="#requestForm">
                        <i class="fa fa-plus"></i>
                    </a>

                    <div class="clearfix"> </div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('request.id') }}</th>
                            <th class="text-center">{{ trans('request.borrow_at') }}</th>
                            <th class="text-center">{{ trans('request.return_at') }}</th>
                            <th class="text-center">{{ trans('request.count') }}</th>
                            <th class="text-center">{{ trans('request.status') }}</th>
                            <th class="text-center">{{ trans('request.view') }}</th>
                            <th class="text-center">{{ trans('request.delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formRequests as $key => $formRequest)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($formRequest->borrowed_at)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($formRequest->returned_at)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $formRequest->detailBorrowedBooks->count() }}</td>
                                @switch ($formRequest->status)
                                    @case (config('request.pending'))
                                        <td class="text-center">
                                            <span class="badge badge-warning">
                                                {{ trans('request.pending') }}
                                            </span>   
                                        </td>
                                        @break
                                    @case(config('request.approve'))
                                        <td class="text-center">
                                            <span class="badge badge-success">
                                               {{ trans('request.approved') }}
                                            </span>   
                                        </td>                                       
                                        @break 
                                    @case (config('request.reject'))
                                        <td class="text-center">
                                            <span class="badge badge-danger">
                                                {{ trans('request.rejected') }}
                                            </span>           
                                        </td>                                     
                                        @break                                       
                                    @default                                       
                                @endswitch

                                <td class="text-center"><a class="badge badge-warning text-black"><i class="fa fa-eye"></i></a></td>

                                @if ($formRequest->status == config('request.reject') || $formRequest->status == config('request.approve'))
                                    <td class="text-center"><a class="badge badge-success edit-disabled"><i class="fa fa-trash-o"></i></a></td>
                                @else
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('requests.destroy', $formRequest->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge badge-danger border-none">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif                           
                            </tr>
                        @endforeach
                    </tbody>
                </table>                                   
                <div class="text-center">
                    {{ $formRequests->links() }}
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>	 

        <div class="products-right text-center">
            <h5>
                {{ trans('request.borrowing_books') }}
            </h5>
        </div>

        <div class="single-pro">
            @foreach ($borrowingBooks as $borrowingBook)
                <div class="col-md-3 product-men add-book-div">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="{{ $borrowingBook->image }}" alt="" class="pro-image-front">
                            <img src="{{ $borrowingBook->image }}" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{ route('book_detail', $borrowingBook->id) }}" class="link-product-add-cart">{{ trans('home.quick_view') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="item-info-product">
                            <h4><a class="book-name" href="{{ route('book_detail', $borrowingBook->id) }}">{{ $borrowingBook->title }}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>                
    </div>
</div>
@endsection
