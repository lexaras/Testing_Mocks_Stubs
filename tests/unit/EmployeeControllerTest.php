<?php declare(strict_types=1);

use Model\Employee;
use PHPUnit\Framework\TestCase;
use Controller\EmployeeController;
use Repository\EmployeeRepository;
use function PHPUnit\Framework\assertEquals;

class EmployeeContollerTest extends TestCase {
   
    //STUB EXAMPLE
    public function testGetAllJsonWithMetaInformationReturnsJsonStub(){
        
        $stub = $this->createStub(EmployeeRepository::class);
        $stub->method('getAll')->willReturn(array(new Employee(1, "Benas"),new Employee(2, "Goda"),new Employee(3, "Rita")));
        $employeeController = new EmployeeController($stub); 
        $res = $employeeController->getAllJsonWithMetaInformation();
        assertEquals('[[{"id":1,"name":"Benas"},{"id":2,"name":"Goda"},{"id":3,"name":"Rita"}],"count:3"]', $res);
    }

//   MOCK EXAMPLE

    public function testGetAllJsonWithMetaInformationReturnsJsonMock() {


        $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        $employeeController = new EmployeeController($mock);
        // $mock->expects($this->exactly(2))
        $mock->expects($this->once())
            ->method('getAll')
            ->willReturn(array(new Employee(1, "Benas"),new Employee(2, "Goda"),new Employee(3, "Romas"),new Employee(4, "Rita"),new Employee(5, "Roma"),new Employee(6, "Rokas")));
        $res = $employeeController->getAllJsonWithMetaInformation();
        assertEquals('[[{"id":1,"name":"Benas"},{"id":2,"name":"Goda"},{"id":3,"name":"Romas"},{"id":4,"name":"Rita"},{"id":5,"name":"Roma"},{"id":6,"name":"Rokas"}],"count:6"]', $res);
        }   
        
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
    

