@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.publishers') }}</title>
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
                                    <h3 class="card-title">{{ trans('message.publishers') }}</h3>
                                </li>
                            </ul>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('admin.publisher_export') }}">
                                        <button class="btn btn-success">
                                            {{ trans('message.export') }}
                                        </button>
                                    </a>
                                </li>&nbsp;&nbsp;&nbsp;
                                
                                <li class="nav-item">
                                    <a data-toggle="modal" data-target="#addPublisher" href="">
                                        <i class="fas fa-plus float-right m-2"></i>
                                    </a>
                                    @include('admin.publisher.add')
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="card-body">
                        <table id="listPublishers" class="table table-bordered table-striped dataTable dtr-inline max-width">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ trans('request.id') }}</th>
                                    <th class="text-center">{{ trans('message.name') }}</th>
                                    <th class="text-center">{{ trans('message.email') }}</th>
                                    <th class="text-center">{{ trans('message.address') }}</th>
                                    <th class="text-center">{{ trans('request.edit') }}</th>
                                    <th class="text-center">{{ trans('request.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publishers as $key => $publisher)
                                    <tr>
                                        <td class="text-center">{{ $key + config('const.one') }}</td>
                                        <td>{{ $publisher->name }}</td>
                                        <td>{{ $publisher->email }}</td>
                                        <td>{{ $publisher->address }}</td>
                                        <td class="text-center">
                                            <a 
                                                class="badge badge-primary text-white" 
                                                data-id="{{ $publisher->id }}"
                                                data-name="{{ $publisher->name }}"
                                                data-email="{{ $publisher->email }}"
                                                data-address="{{ $publisher->address }}"
                                                data-toggle="modal" 
                                                data-target="#editPublisher"  
                                                href="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        @include('admin.publisher.edit')

                                        <td class="text-center">
                                            <form method="POST"
                                                action="{{ route('publishers.destroy', $publisher->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge badge-danger text-white border-none">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
