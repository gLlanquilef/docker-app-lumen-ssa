<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function GuzzleHttp\Promise\all;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * The service to consume the author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param AuthorService $authorService
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }
    /**
     * Return authors list
     * @return Illuminate\Http\Response
     */
    public function index(){
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create an instance of Author
     * @param Request $request
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function store(Request $request){

        return $this->successResponse($this->authorService->createAuthors($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return an specific author
     * @param $author
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function show($author){
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * Update the information of an existing author
     * @param Request $request
     * @param $author
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function update(Request $request, $author){
        return $this->successResponse($this->authorService->editAuthor($request->all(), $author));
    }

    /**
     * Create an instance of Author
     * @param $author
     * @return \App\Traits\Illuminate\Http\Response
     */
    public function destroy($author){
        return $this->successResponse($this->authorService->removeAuthor($author));
    }
}
