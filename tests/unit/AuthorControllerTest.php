<?php declare(strict_types=1);

use Faker\Factory;
use Model\Author;
use PHPUnit\Framework\TestCase;
use Controller\AuthorController;
use Repository\AuthorRepository;
use function PHPUnit\Framework\assertEquals;

class AuthorContollerTest extends TestCase {

 public function testGetAllJsonReturnsJson() {
            $faker = Factory::create();
            $authors = array();
            for($i = 0; $i < 10; $i++)
                array_push($authors, new Author($i, $faker->name(), $faker->lastName(), $faker->email));
            var_dump($authors);
            $mock = $this->getMockBuilder(AuthorRepository::class)->getMock();
            $authorController = new AuthorController($mock);
            $mock->expects($this->exactly(1))
                ->method('getAll')
                ->willReturn($authors);
            // when
            $res = $authorController->getAllJson();
            // then
 }
}