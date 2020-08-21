@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.add_book') }}</title>
@endsection

@section('content')
<div class="content-wrapper">

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('message.add_new_book') }}</h3>
                        </div>

                        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ trans('message.title') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('title') ? 'error' : '' }}" 
                                        name="title"
                                        placeholder="{{ trans('message.input_name_of_book') }}">
                                    @if ($errors->has('title'))
                                        <span class="error">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.description') }}</label>
                                    <textarea 
                                        class="form-control" 
                                        rows="3" 
                                        name="description"                                        placeholder="{{ trans('message.enter') }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.image') }}</label>
                                    <div class="custom-file">
                                        <input 
                                            type="file" 
                                            class="custom-file-input {{ $errors->has('image') ? 'error' : '' }}" 
                                            id="inputGroupFile02"
                                            name="image">
                                        @if ($errors->has('image'))
                                            <span class="error">
                                                {{ $errors->first('image') }}
                                            </span>
                                        @endif
                                        <label class="custom-file-label"
                                            for="inputGroupFile02">{{ trans('message.choose_file') }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.pages') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="number_of_pages"
                                        placeholder="{{ trans('message.input_page') }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.available_books') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('number_of_available_books') ? 'error' : '' }}" 
                                        name="number_of_available_books"
                                        placeholder="{{ trans('message.input_num_of_available_books') }}">
                                    @if ($errors->has('number_of_available_books'))
                                        <span class="error">
                                            {{ $errors->first('number_of_available_books') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.category') }}</label>
                                    <select class="form-control select2 {{ $errors->has('category_id') ? 'error' : '' }}" name="category_id">
                                        <option></option>
                                        {!! $categoryOption !!}
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="error">
                                            {{ $errors->first('category_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.author') }}</label>
                                    <select class="form-control select2 {{ $errors->has('author_id') ? 'error' : '' }}" name="author_id">
                                        <option></option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">
                                                {{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('author_id'))
                                        <span class="error">
                                            {{ $errors->first('author_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.publisher') }}</label>
                                    <select class="form-control select2 {{ $errors->has('publisher_id') ? 'error' : '' }}" name="publisher_id">
                                        <option></option>
                                        @foreach ($publishers as $publishers)
                                            <option value="{{ $publishers->id }}">
                                                {{ $publishers->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('publisher_id'))
                                        <span class="error">
                                            {{ $errors->first('publisher_id') }}
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
