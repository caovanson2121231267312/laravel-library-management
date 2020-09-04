@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.home') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">{{ trans('home.new_requests') }}</h3>
    
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('request.id') }}</th>
                                            <th>{{ trans('login.name') }}</th>
                                            <th>{{ trans('login.phone_number') }}</th>
                                            <th>{{ trans('request.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        {{ $request->id }}
                                                    </a>
                                                </td>
                                                <td>{{ $request->user->name }}</td>
                                                <td>{{ $request->user->phone_number }}</td>
                                                @switch ($request->status)
                                                    @case (config('request.pending'))
                                                        <td>
                                                            <span class="badge badge-warning">
                                                                {{ trans('request.pending') }}
                                                            </span>   
                                                        </td>
                                                        @break
                                                    @case (config('request.approve'))
                                                        <td>
                                                            <span class="badge badge-success">
                                                            {{ trans('request.approved') }}
                                                            </span>   
                                                        </td>                                       
                                                        @break 
                                                    @case (config('request.reject'))
                                                        <td>
                                                            <span class="badge badge-danger">
                                                                {{ trans('request.rejected') }}
                                                            </span>           
                                                        </td>                                     
                                                        @break                                       
                                                    @default                                       
                                                @endswitch
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.request') }}" class="btn btn-sm btn-secondary float-right">
                                {{ trans('home.view_all_requests') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('home.recently_add_books') }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach ($books as $book)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ $book->image }}" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">
                                                {{ $book->title }}   
                                                <span class="badge badge-danger float-right">
                                                    {{ trans('home.new') }}
                                                </span>   
                                            </a>
                                            <span class="product-description">
                                                {{ $book->author->name }}
                                            </span>
                                        </div>
                                    </li>                                   
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer text-center">
                            <a href="{{ route('books.index') }}" class="uppercase">
                                {{ trans('home.view_all_books') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
