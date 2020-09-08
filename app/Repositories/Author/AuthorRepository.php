<?php
namespace App\Repositories\Author;

use App\Repositories\BaseRepository;
use App\Models\Author;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    public function getModel()
    {
        return Author::class;
    }

    public function getAuthorAdmin()
    {
        return $this->model->latest()->get();
    }

    public function getAuthorUser()
    {
        return $this->model->latest()->paginate(config('book.textbook_category_id'));
    }

    public function getBook()
    {
        return $this->model->with('books')->get();
    }
}
