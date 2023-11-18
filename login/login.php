<?php

require_once('../html/crud/config.php');

class Login  {

    private $con;
    
    public $username;
    public $password;


    public function __construct()
    {
        global $con;
        $this->con = $con;
    }

    function login()
    {
        $query = "SELECT * FROM users" . " WHERE username = ? AND password = ?";
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->password);

        $stmt->execute();

        return $stmt;
    }
}
?>
