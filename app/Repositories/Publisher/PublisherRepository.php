<?php
namespace App\Repositories\Publisher;

use App\Repositories\BaseRepository;
use App\Models\Publisher;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    public function getModel()
    {
        return Publisher::class;
    }

    public function getPublisher()
    {
        return $this->model->latest()->get();
    }
}
