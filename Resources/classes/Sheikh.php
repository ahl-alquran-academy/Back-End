<?php

class Sheikh
{
    //properities...
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $telegram;
    public $policy;
    public $rate;
    public $password;
    private $conn;
    private $table_name;

    //constractor
    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = "Sheikh";
    }

    //methods...
    public function create_sheikh()
    {

        $query = "INSERT INTO " . $this->table_name . " SET 
        firstName = ?,
        lastName = ?,
        telegram = ?,
        email = ?,
        password = ?,
        policy = ?,
        rate = ?";

        $obj = $this->conn->prepare($query);
        // if (!$this->conn->prepare($query)) {
        //     echo "error in prepare";
        //     var_dump($this->conn->error);
        // }
        $obj->bind_param(
            "sssssii",
            $this->first_name,
            $this->last_name,
            $this->telegram,
            $this->email,
            $this->password,
            $this->policy,
            $this->rate
        );

        if ($obj->execute()) {
            return true;
        }
        var_dump($this->conn->error);
        return false;
    }

    public function check_email()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";

        $obj = $this->conn->prepare($query);

        $obj->bind_param("s", $this->email);

        if ($obj->execute()) {
            $data = $obj->get_result();
            return $data->fetch_assoc();
        }

        return array();
    }


    public function list_all()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        $obj = $this->conn->prepare($query);

        if ($obj->execute()) {
            return $obj->get_result();
        }
        return array();
    }

    public function get_single_sheikh()
    {

        //sql query...
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";

        //prepare our statment.
        $obj = $this->con->prepare($query);

        //binding pramaters data.
        $obj->bind_param("i", $this->id);

        //execuate
        if ($obj->execute()) {
            //get data
            $data = $obj->get_result();
            return $data->fetch_assoc();
        }

        return false;
    }

    public function update_sheikh()
    {

        //sql query
        $query = "UPDATE " . $this->table_name . " SET firstName = ?,lastName = ?,email = ?,telegram = ?,password = ?,policy = ?,rate = ? WHERE id = ?";

        //prepare our query
        $obj = $this->con->prepare($query);

        //sanitize input data...
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telegram = htmlspecialchars(strip_tags($this->telegram));
        $this->policy = htmlspecialchars(strip_tags($this->policy));
        $this->rate = htmlspecialchars(strip_tags($this->rate));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $obj->bind_param("sssssii", $this->first_name, $this->last_name, $this->email, $this->telegram, $this->password, $this->policy, $this->rate);
        //execute query..
        if ($obj->execute()) {
            return true;
        }
        return false;
    }

    public function delete_sheikh()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $obj = $this->con->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $obj->bind_param("i", $this->id);

        if ($obj->execute())
            return true;
        else
            return false;
    }
}