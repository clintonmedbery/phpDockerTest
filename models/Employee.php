<?php

class Employee {

    public $id;
    public $employeeName;
    public $employeeSalary;
    public $employeeAge;

    public function __construct($id, $employeeName, $employeeSalary, $employeeAge){
        $this->id = $id;
        $this->employeeName = $employeeName;
        $this->employeeSalary = $employeeSalary;
        $this->employeeAge = $employeeAge;
    }
}