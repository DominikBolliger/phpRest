<?php

class DataBaseConfig {

    protected $servername, $username, $password, $conn;

    function __construct(String $servername, String $username, String $password) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function createConnection() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn>connect_error);
        }
    }

    public function closeConnection() {
        $this->conn->close();

    }

    public function select()
    {
        $sql = "SELECT posx, posy, posz FROM sa.position order by posid DESC LIMIT 1";
        $result = $this->conn->query($sql);
        $values = $result->fetch_object();
        return array(
            "posx" => $values->posx,
            "posy" => $values->posy,
            "posz" => $values->posz
        );
    }
}