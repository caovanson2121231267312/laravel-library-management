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
        $hotBooks = Book::withCount('likes')
            ->whereHas('likes', function($q) {
                $q->where('status', config('const.like'));
            })
            ->orderBy('likes_count', 'desc')
            ->take(config('book.number_of_new_books'))
            ->get();

        $newBooks = Book::latest()->take(config('book.number_of_new_books'))->get();

        $categoriesLeft = Category::whereBetween('id', [config('book.textbook_category_id'), config('book.entertainment_category_id')])
            ->take(config('book.number_of_column'))
            ->get();

        $categoriesRight = Category::whereBetween('id', [config('book.health_category_id'), config('book.literature_category_id')])
            ->take(config('book.number_of_column'))
            ->get();

        $authorsLeft = Author::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(config('book.number_of_column'))
            ->get();

        $authorsRight = Author::withCount('books')
            ->orderBy('books_count', 'desc')
            ->skip(config('book.number_of_column'))
            ->take(config('book.number_of_column'))
            ->get();
            
        View::share([
            'hotBooks' => $hotBooks,
            'newBooks' => $newBooks,
            'categoriesLeft' => $categoriesLeft,
            'categoriesRight' => $categoriesRight,
            'authorsLeft' => $authorsLeft,
            'authorsRight' => $authorsRight,
        ]);
    }
}
