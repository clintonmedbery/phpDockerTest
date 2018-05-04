<?php
require __DIR__ . "../../models/Employee.php";
require_once __DIR__ . "../../config/DBConfig.php";

class EmployeeService {

    CONST TABLE_NAME = "employee";

    private static $instance;

    private $database;
    static $conn;

    function __construct() {
        $this->database = new DBConfig();
        self::$conn = $this->database->getConnection();
    }

    public static function getInstance() {
        if ( is_null( self::$instance ) )
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    static function getAll(){

        // select all query
        $query = "SELECT * FROM " . self::TABLE_NAME . ";";

        // prepare query statement
        $stmt = self::$conn->prepare($query);

        // execute query
        $stmt->execute();
        $employees = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $employee = new Employee( $id, $employee_name, $employee_salary,  $employee_age);
            $employees[] = $employee;
        }
        return $employees;
    }

    static function getById($employeeId){

        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id= :id LIMIT 1;";
        $stmt = self::$conn->prepare($query);

        $employeeId = htmlspecialchars($employeeId);
        $stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);

        $stmt->execute();

        $employeeEntity = $stmt->fetch(PDO::FETCH_ASSOC);

        extract($employeeEntity);

        $employee = new Employee( $id, $employee_name, $employee_salary,  $employee_age);


        return $employee;
    }
}