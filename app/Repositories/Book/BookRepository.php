<?php

namespace App\Repositories\Book;

use App\Models\Book;

class BookRepository implements BookInterface
{
    protected $bookRepository;

    public function __construct(Book $book)
    {
        $this->bookRepository = $book;
    }

    public function getAll()
    {
        return $this->bookRepository->all();
    }


    public function create(array $attributes)
    {
        return $this->bookRepository->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->bookRepository->findOrFail($id)->update($attributes);
    }

    public function findById($id)
    {
        return $this->bookRepository->findOrFail($id);
    }


    public function delete($id)
    {
        return $this->bookRepository->destroy($id);
    }
}
