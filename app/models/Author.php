<?php

namespace Model;

use JsonSerializable;

class Author implements JsonSerializable {
    private $id;
    private $name;
    private $lastName;
    private $email;
    public function __construct($id, $name, $lastName, $email){
        $this->id = $id;
        $this->name = $name;
        $this->lastName= $lastName;
        $this->email= $email;
    }
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
