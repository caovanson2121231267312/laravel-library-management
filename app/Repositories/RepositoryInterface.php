<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($data);

    public function update($id, $data);
    
    public function destroy($id);
}
