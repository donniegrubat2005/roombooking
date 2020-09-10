<?php

namespace App\Http\Controllers;

use App\Repositories\Book\BookInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepository;


    public function __construct(BookInterface $book)
    {
        $this->bookRepository = $book;
    }

    public function index()
    {
        return $this->bookRepository->getAll();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->bookRepository->create($request->all());
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->bookRepository->findById($id);
    }


    public function update(Request $request, $id)
    {
        $this->bookRepository->update($id, $request->all());
    }


    public function destroy($id)
    {
        $this->bookRepository->delete($id);
    }
}
