@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('request.request_management') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card col-md-12 mt-5">
                    <div class="card-header">
                        <nav class="navbar navbar-expand navbar-white navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <h3 class="card-title">{{ trans('request.request_management') }}</h3>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="card-body">
                        <div class="jsgrid">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="row">
                                        <th class="text-center col-md-1">{{ trans('request.id') }}</th>
                                        <th class="text-center col-md-2">{{ trans('message.name') }}</th>
                                        <th class="text-center col-md-3">{{ trans('message.email') }}</th>
                                        <th class="text-center col-md-2">{{ trans('request.request_id') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.check') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.approve') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.reject') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.checked') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formRequests as $key => $formRequest)
                                        <tr class="row">
                                            <td class="text-center col-md-1">{{ $key + 1 }}</td>
                                            <td class="text-center col-md-2">{{ $formRequest->user->name }}</td>
                                            <td class="text-center col-md-3">{{ $formRequest->user->email }}</td>
                                            <td class="text-center col-md-2">{{ $formRequest->id }}</td>
                                            <td class="text-center col-md-1">
                                                <a href="{{ route('admin.check', $formRequest->id) }}" class="badge badge-warning text-white">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </td>
                                            <td class="text-center col-md-1">
                                                <a href="{{ route('admin.approve', $formRequest->id) }}" class="badge badge-success text-white">
                                                    <i class="far fa-circle"></i>
                                                </a>
                                            </td>
                                            <td class="text-center col-md-1">
                                                <a href="{{ route('admin.reject', $formRequest->id) }}" class="badge badge-danger text-white">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td class="text-center col-md-1">
                                                @if ($formRequest->status == config('request.approve') || $formRequest->status == config('request.reject'))
                                                    <span class="badge badge-primary text-white">
                                                        <i class="fa fa-check"></i>
                                                    </span>    
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
                {{ $formRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
