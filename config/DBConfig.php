<?php
Class DBConfig{
    /* Database connection start */
    var $servername = "mysql";
    var $username = "dbadmin";
    var $password = "test_password";
    var $dbname = "test_php_db";
    var $conn;
    function getConnstring() {
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}

?>