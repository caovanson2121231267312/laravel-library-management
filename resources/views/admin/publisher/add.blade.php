@extends('admin.layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@section('title')
    <title>{{ trans('message.add_publisher') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('message.add_publisher') }}</h3>
                        </div>

                        <form method="POST" action="{{ route('publishers.index') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ trans('message.name') }}</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name"
                                        placeholder="{{ trans('message.input_name_of_publisher') }}">
                                        @if ($errors->has('name'))
                                            <span class="error">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.email') }}</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email"
                                        placeholder="{{ trans('message.input_email_of_publisher') }}">
                                        @if ($errors->has('email'))
                                            <span class="error">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.address') }}</label>
                                    <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address"
                                        placeholder="{{ trans('message.input_address_of_publisher') }}">
                                        @if ($errors->has('address'))
                                            <span class="error">
                                                {{ $errors->first('address') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary swalDefaultSuccess">{{ trans('message.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
