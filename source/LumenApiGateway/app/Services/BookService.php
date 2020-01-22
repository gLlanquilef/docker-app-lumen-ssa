<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService {
    use ConsumeExternalService;

    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('service.books.secret');
    }

    /**
     * Get the full list of books from the books service
     */

    public function obtainBooks(){
        return $this->performResquest('GET', '/books');
    }

    /**
     * Create new book service
     * @param $data
     * @return string
     */
    public function createBooks($data){
        return $this->performResquest('POST', '/books', $data);
    }

    /**
     * Get a single book from the books service
     * @param $book
     * @return string
     */
    public function obtainBook($book){
        return $this->performResquest('GET', "/books/{$book}");
    }

    /**
     * Edit author from the books service
     * @param $data
     * @param $book
     * @return string
     */
    public function editBook($data, $book){
        return $this->performResquest('PUT', "/books/{$book}", $data);
    }

    /**
     * Delete author from the books service
     * @param $book
     * @return string
     */
    public function removeBook($book){
        return $this->performResquest('DELETE', "/books/{$book}");
    }
}
