<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    
    public function getAll()
    {
        return $this->model->get();
    }
    
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }
    
    public function create($data)
    {
        return $this->model->create($data);
    }
    
    public function update($id, $data)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($data);
            return $result;
        }

        return false;
    }
    
    public function destroy($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
