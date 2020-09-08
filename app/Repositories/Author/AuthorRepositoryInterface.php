<?php
namespace App\Repositories\Author;

interface AuthorRepositoryInterface
{
    public function getAuthorAdmin();

    public function getAuthorUser();

    public function getBook();
}
