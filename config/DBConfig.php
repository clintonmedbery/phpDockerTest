<?php
Class DBConfig{
    /* Database connection start */
    var $servername = "mysql";
    var $username = "dbadmin";
    var $password = "test_password";
    var $dbname = "test_php_db";
    var $conn;
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>