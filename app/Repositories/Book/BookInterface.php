<?php

namespace App\Repositories\Book;

interface BookInterface
{

    public function getAll();
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function findById($id);
    public function delete($id);
}
