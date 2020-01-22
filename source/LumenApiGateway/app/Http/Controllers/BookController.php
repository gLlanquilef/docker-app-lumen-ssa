<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the book service
     * @var BookService
     */
    public $bookService;

    /**
     * The service to consume the author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param BookService $bookService
     * @param AuthorService $authorService
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }
    /**
     * Return books list
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function index(){
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create an instance of book
     * @param Request $request
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->authorService->obtainAuthor($request->author_id);
        return $this->successResponse($this->bookService->createBooks($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return an specific book
     * @param $book
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function show($book){
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Update the information of an existing book
     * @param Request $request
     * @param $book
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function update(Request $request, $book){
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * Create an instance of book
     * @param $book
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function destroy($book){
        return $this->successResponse($this->bookService->removeBook($book));
    }
}
