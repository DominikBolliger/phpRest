<?php

class DataBaseConfig {

    protected $servername, $username, $password, $conn;

    function __construct(String $servername, String $username, String $password) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function createConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname = sa", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function select()
    {
        $statement = $this->conn->prepare("SELECT posx, posy, posz FROM sa.position LIMIT 1");
        if($statement->execute())
        {
            $values = $statement->fetch(PDO::FETCH_ASSOC);
            return array(
                "posx" => $values['posx'],
                "posy" => $values['posy'],
                "posz" => $values['posz']
            );
        }
    }
}