<?php
//connection information - connection with database.
class Database
{
    //properities...
    private $hostInfo;
    private $userName;
    private $password;
    private $dbName;
    private $port;
    private $connection;
    //methods..
    public function connect()
    {
        $this->hostInfo = "localhost";
        $this->dbName = "QuaranAcademy";
        $this->userName = "root";
        $this->password = "";
        try {
            $this->connection = new mysqli($this->hostInfo, $this->userName, $this->password, $this->dbName);
        } catch (Exception $ex) {
            echo "connection error";
        }


        if ($this->connection->connect_errno) {
            //error in connection...
            print_r($this->connection->connect_error);
        } else {
            return $this->connection;
        }
    }
}