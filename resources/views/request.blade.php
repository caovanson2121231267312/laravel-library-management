@extends('layouts.app')

@section('content')
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
        <div class="col-md-6 contact-form test">
            <h4 class="white-w3ls">{{ trans('request.borrow_books_form') }}</h4>

            <form action="#" method="post">
                <div class="styled-input agile-styled-input-top">
                    <input type="text" name="name" value="{{ $user->name }}">
                    <label>{{ trans('login.name') }}</label>
                    <span></span>
                </div>
                <div class="styled-input">
                    <input type="text" name="email" value="{{ $user->email }}">
                    <label>{{ trans('login.email') }}</label>
                    <span></span>
                </div>
                <div class="styled-input">
                    <input type="text" name="phone_number" value="{{ $user->phone_number }}">
                    <label>{{ trans('login.phone_number') }}</label>
                    <span></span>
                </div>
                <div class="styled-input">
                    <input type="text" name="phone_number" required="">
                    <label>{{ trans('request.number_of_borrow_books') }}</label>
                    <span></span>
                </div>
                <div class="styled-input">
                    <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="borrowed_at">
                    <label>{{ trans('request.borrow_at') }}</label>
                    <span></span>
                </div>
                <div class="styled-input">
                    <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="returned_at">
                    <label>{{ trans('request.return_at') }}</label>
                    <span></span>
                </div>
                <input type="submit" value="SEND">
            </form>
        </div>
    </div>
</div>
@endsection
