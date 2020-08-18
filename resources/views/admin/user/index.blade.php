@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.users') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card mt-5">
                    <div class="card-header">
                        <nav class="navbar navbar-expand navbar-white navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <h3 class="card-title">{{ trans('message.users') }}</h3>
                                </li>
                            </ul>

                            <form class="form-inline ml-5">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="{{ trans('message.search') }}"
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
                                    <a href="">
                                        <i class="fas fa-plus float-right m-2"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="card-body">
                        <div class="jsgrid">
                            <div class="jsgrid-grid-header">
                                <table class="jsgrid-table">
                                    <thead>
                                        <tr class="row jsgrid-header-row">
                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-1">
                                                {{ trans('message.id') }}
                                            </th>
                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-2">
                                                {{ trans('message.name') }}
                                            </th>
                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-2">
                                                {{ trans('message.email') }}
                                            </th>
                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-2">
                                                {{ trans('message.phone_number') }}
                                            </th>

                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-3">
                                                {{ trans('message.avatar') }}
                                            </th>
                                            <th
                                                class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable col-md-2">
                                                {{ trans('message.actions') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center col-md-1"></td>
                                            <td class="jsgrid-cell col-md-2"></td>
                                            <td class="jsgrid-cell col-md-2"></td>
                                            <td class="jsgrid-cell col-md-2"></td>
                                            <td class="jsgrid-cell col-md-3"></td>
                                            <td class="jsgrid-cell jsgrid-align-center col-md-2">
                                                <a href="">
                                                    <i class="fas fa-edit px-3 text text-primary"></i>
                                                </a>

                                                <a href="">
                                                    <i class="fas fa-trash-alt px-3 text text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
