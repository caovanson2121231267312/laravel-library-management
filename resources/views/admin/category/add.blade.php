@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.add_category') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('message.add_category') }}</h3>
                        </div>

                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ trans('message.name') }}</label>
                                    <input type="text" class="form-control" name="name" placeholder="{{ trans('message.add_new_category') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.parent_category') }}</label>
                                    <select class="form-control select2" name="parent_id">
                                        <option selected="selected"></option>
                                        {!! $categoryOption !!}
                                    </select>
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
