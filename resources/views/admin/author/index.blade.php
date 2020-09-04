@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.authors') }}</title>
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
                                    <h3 class="card-title">{{ trans('message.authors') }}</h3>
                                </li>
                            </ul>

                            <form class="form-inline ml-5">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search"
                                        placeholder="{{ trans('message.search') }}"
                                        aria-label="{{ trans('message.search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('authors.create') }}">
                                        <i class="fas fa-plus float-right m-2"></i>
                                    </a>
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
                                        <th class="text-center col-md-3">{{ trans('message.description') }}</th>
                                        <th class="text-center col-md-2">{{ trans('message.email') }}</th>
                                        <th class="text-center col-md-2">{{ trans('message.avatar') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.edit') }}</th>
                                        <th class="text-center col-md-1">{{ trans('request.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $key => $author)
                                        <tr class="row">
                                            <td class="text-center col-md-1">{{ $key + 1 }}</td>
                                            <td class="col-md-2">{{ $author->name }}</td>
                                            <td class="col-md-3">{{ $author->description }}</td>
                                            <td class="col-md-2">{{ $author->email }}</td>
                                            <td class="col-md-2">
                                                <img src="{{ $author->avatar }}" class="image-management">
                                            </td>
                                            <td class="text-center col-md-1">
                                                <a class="badge badge-primary text-white" href="{{ route('authors.edit', $author->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="text-center col-md-1">
                                                <form method="POST"
                                                    action="{{ route('authors.destroy', $author->id) }}">
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
                {{ $authors->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
