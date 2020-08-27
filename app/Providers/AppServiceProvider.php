<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $book = Book::latest()->get();

        $textBooks = $book
            ->where('category_id', config('book.textbook_category_id'))
            ->take(config('book.number_of_new_books'));

        $referenceBooks = $book
            ->where('category_id', config('book.reference_book_category_id'))
            ->take(config('book.number_of_new_books'));

        $comics = $book
            ->where('category_id', config('book.comic_category_id'))
            ->take(config('book.number_of_new_books'));

        $newspapers = $book
            ->where('category_id', config('book.newspaper_category_id'))
            ->take(config('book.number_of_new_books'));

        $categoriesLeft = Category::whereBetween('id', [config('book.textbook_category_id'), config('book.entertainment_category_id')])
            ->take(config('book.number_of_column'))
            ->get();

        $categoriesRight = Category::whereBetween('id', [config('book.health_category_id'), config('book.literature_category_id')])
            ->take(config('book.number_of_column'))
            ->get();

        View::share([
            'textBooks' => $textBooks, 
            'referenceBooks' => $referenceBooks,
            'comics' => $comics,
            'newspapers' => $newspapers,
            'categoriesLeft' => $categoriesLeft,
            'categoriesRight' => $categoriesRight,
        ]);
    }
}
