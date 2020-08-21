@extends('admin.layouts.app')

@section('title')
    <title>{{ trans('message.edit_book') }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('message.edit_book') }}</h3>
                        </div>

                        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ trans('message.title') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('title') ? 'error' : '' }}" 
                                        name="title" 
                                        value="{{ $book->title }}">
                                    @if ($errors->has('title'))
                                        <span class="error">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.description') }}</label>
                                    <textarea class="form-control" rows="3">{{ $book->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.image') }}</label>
                                    <div class="custom-file">
                                        <input 
                                            type="file" .
                                            class="custom-file-input {{ $errors->has('image') ? 'error' : '' }}" 
                                            id="inputGroupFile02"
                                            name="image">
                                        @if ($errors->has('image'))
                                            <span class="error">
                                                {{ $errors->first('image') }}
                                            </span>
                                        @endif
                                        <label class="custom-file-label"
                                            for="inputGroupFile02"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.pages') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="number_of_pages" 
                                        value="{{ $book->number_of_pages }}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.available_books') }}</label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('number_of_available_books') ? 'error' : '' }}" 
                                        name="number_of_available_books" 
                                        value="{{ $book->number_of_available_books }}">
                                    @if ($errors->has('number_of_available_books'))
                                        <span class="error">
                                            {{ $errors->first('number_of_available_books') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('message.category') }}</label>
                                    <select class="form-control select2" name="category_id">
                                        <option selected="selected"></option>
                                        {!! $categoryOption !!}
                                    </select>
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
