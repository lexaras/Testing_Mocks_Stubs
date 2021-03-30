<?php

namespace Repository;

use Model\Author;

class AuthorRepository { 
    private $server; private $username; private $password; private $database; private $conn;

    public function __construct(){
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "mysql";
        $this->database = "z_qa";
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    }
    public function getAll() : array {
        $result = mysqli_query($this->conn, "SELECT id, name, lastName, email FROM Author");
        
        $authors = array();
        if (mysqli_num_rows($result) > 0)
            while($row = mysqli_fetch_assoc($result)){
                array_push($authors, new Author($row['id'], $row['name'], $row['surname'], $row['email']));
            }
        mysqli_close($this->conn);
        return $authors;
    }
}
