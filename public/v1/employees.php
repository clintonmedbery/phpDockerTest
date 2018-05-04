<?php
// Connect to database
include("../../config/DBConfig.php");
include("../../services/EmployeeService.php");

$db = new DBConfig();
$connection =  $db->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve Products
        if(!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            get_employees($id);
        } else {
            get_employees();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_employees($id=0) {
    if($id != 0) {
        $response = EmployeeService::getInstance()->getById($id);
    } else {
        $response = EmployeeService::getInstance()->getAll();
    }

    header('Content-Type: application/json');
    echo json_encode($response);

}