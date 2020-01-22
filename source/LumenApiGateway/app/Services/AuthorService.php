<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService {

    use ConsumeExternalService;

    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('service.authors.secret');
    }

    /**
     * Get the full list of authors from the authors service
    */

    public function obtainAuthors(){
        return $this->performResquest('GET', '/authors');
    }

    /**
     * Create new author service
     * @param $data
     * @return string
     */
    public function createAuthors($data){
        return $this->performResquest('POST', '/authors', $data);
    }

    /**
     * Get a single author from the authors service
     * @param $author
     * @return string
     */
    public function obtainAuthor($author){
        return $this->performResquest('GET', "/authors/{$author}");
    }

    /**
     * Edit author from the authors service
     * @param $data
     * @param $author
     * @return string
     */
    public function editAuthor($data, $author){
        return $this->performResquest('PUT', "/authors/{$author}", $data);
    }

    /**
     * Delete author from the authors service
     * @param $author
     * @return string
     */
    public function removeAuthor($author){
        return $this->performResquest('DELETE', "/authors/{$author}");
    }
}
