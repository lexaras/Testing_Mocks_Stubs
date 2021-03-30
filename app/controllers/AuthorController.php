<?php

namespace Controller;

use Repository\AuthorRepository;

class AuthorController {
    private $authorRepository; 

    public function __construct(AuthorRepository $er){
        $this->authorRepository = $er;
    }
    public function getAll(){}
    public function getAllById(){}
    public function getAllJson() : string {
        return json_encode($this->authorRepository->getAll());
    }
}