@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.home') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ trans('message.home') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
