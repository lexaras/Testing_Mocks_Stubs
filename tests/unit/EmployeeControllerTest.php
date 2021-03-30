<?php declare(strict_types=1);

use Faker\Factory;
use Model\Employee;
use PHPUnit\Framework\TestCase;
use Controller\EmployeeController;
use Repository\EmployeeRepository;
use function PHPUnit\Framework\assertEquals;

class EmployeeContollerTest extends TestCase {
   
//  STUB EXAMPLE

    public function testGetAllJsonWithMetaInformationReturnsJsonStub(){
        
        $stub = $this->createStub(EmployeeRepository::class);
        $stub->method('getAll')->willReturn(array(new Employee(1, "Benas"),new Employee(2, "Goda"),new Employee(3, "Rita")));
        $employeeController = new EmployeeController($stub); 
        $res = $employeeController->getAllJsonWithMetaInformation();
        assertEquals('[[{"id":1,"name":"Benas"},{"id":2,"name":"Goda"},{"id":3,"name":"Rita"}],"count:3"]', $res);
    }

//  MOCK EXAMPLE

    // public function testGetAllJsonWithMetaInformationReturnsJsonMock() {


    //     $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
    //     $employeeController = new EmployeeController($mock);
    //     // $mock->expects($this->exactly(2))
    //     $mock->expects($this->once())
    //         ->method('getAll')
    //         ->willReturn(array(new Employee(1, "Benas"),new Employee(2, "Goda"),new Employee(3, "Romas"),new Employee(4, "Rita"),new Employee(5, "Roma"),new Employee(6, "Rokas")));
    //     $res = $employeeController->getAllJsonWithMetaInformation();
    //     assertEquals('[[{"id":1,"name":"Benas"},{"id":2,"name":"Goda"},{"id":3,"name":"Romas"},{"id":4,"name":"Rita"},{"id":5,"name":"Roma"},{"id":6,"name":"Rokas"}],"count:6"]', $res);
    // }


//  FAKER EXAMPLE_1

    // public function testGetAllJsonReturnsJson() {
    //     $name1 = (Factory::create())->name();
    //     $name2 = (Factory::create())->name();
    //     $name3 = (Factory::create())->name();
    //     $name4 = (Factory::create())->name();
    //     $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
    //     $employeeController = new EmployeeController($mock);
    //     $mock->expects($this->once())
    //         ->method('getAll')
    //         ->willReturn(array(new Employee(1, $name1),new Employee(2, $name2),new Employee(3, $name3),new Employee(4, $name4)));
    //     $res = $employeeController->getAllJson();
    //     assertEquals('[{"id":1,"name":"' . $name1 . '"},{"id":2,"name":"' . $name2 . '"},{"id":3,"name":"' . $name3 . '"},{"id":4,"name":"' . $name4 . '"}]', $res);
    // }

//  FAKER EXAMPLE_2

        // public function testGetAllJsonReturnsJson() {
        //     $faker = Factory::create();
        //     $employees = array();
        //     for($i = 0; $i < 10; $i++)
        //         array_push($employees, new Employee($i, $faker->name()));
        //     var_dump($employees);
        //     $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        //     $employeeController = new EmployeeController($mock);
        //     $mock->expects($this->exactly(1))
        //         ->method('getAll')
        //         ->willReturn($employees);
        //     // when
        //     $res = $employeeController->getAllJson();
        //     // then
        //     assertEquals(json_encode($employees), $res);
        // }
       
    //    DB is required to run these tests 

    // public function testGetAllJsonReturnsJson() {

    //     // given
    //     //Kreipiasi i DB, perduoda controleriui
    //     $employeeController = new EmployeeController(new EmployeeRepository()); 
    //     // when
    //     //Controleris pakeicia i jsona
    //     $res = $employeeController->getAllJson();
    //     // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
    //     assertEquals('[{"id":"1","name":"benas"},{"id":"2","name":"goda"},{"id":"3","name":"Romas"}]', $res);
    // }

    
    // public function testGetAllJsonWithMetaInformationReturnsJson() {

    //     $employeeController = new EmployeeController(new EmployeeRepository()); 
    //     $res = $employeeController->getAllJsonWithMetaInformation();
    //     assertEquals('[[{"id":"1","name":"benas"},{"id":"2","name":"goda"},{"id":"3","name":"Romas"}],"count:3"]', $res);
    // }

    
}
    

