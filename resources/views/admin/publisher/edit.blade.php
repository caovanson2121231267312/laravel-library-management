@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.edit_publisher') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('message.edit_publisher') }}</h3>
                        </div>

                        <form method="POST" action="{{ route('publishers.update', $publisher->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ trans('message.name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ $publisher->name }}">
                                    @if ($errors->has('name'))
                                        <span class="error">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif                                   
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ $publisher->email }}">
                                    @if ($errors->has('email'))
                                        <span class="error">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.address') }}</label>
                                    <input type="text" class="form-control" name="address" value="{{ $publisher->address }}">
                                    @if ($errors->has('address'))
                                        <span class="error">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
