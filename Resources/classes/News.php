<?php

class News
{
    //properites...
    public $id;
    public $title;
    public $contentpath;
    public $publishdate;
    public $sheikhid;
    private $table_name;
    private $conn;
    //constractor
    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = "News";
    }

    //methods
    //select all method
    public function get_all_data()
    {
        //sql query...
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        //prepare our statment.
        $obj = $this->conn->prepare($query);

        //execuate
        $obj->execute();

        return $obj->get_result();
    }

    public function get_limit_data($limit)
    {
        //sql query...
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC LIMIT " . $limit;

        //prepare our statment.
        $obj = $this->conn->prepare($query);

        //execuate
        $obj->execute();

        return $obj->get_result();
    }
    //create news
    public function create()
    {
        //sql insert query...
        $query = "INSERT INTO " . $this->table_name . " 
        SET title = ?,contentpath = ? ,sheikhid = ?";
        //prepare sql query....
        $obj = $this->conn->prepare($query);
        //sanitize input variables
        /**
         * that mean remove html tags , spacieal and extra space in boundaries from our input.
         */
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->contentpath = htmlspecialchars(strip_tags($this->contentpath));
        $this->sheikhid = htmlspecialchars(strip_tags($this->sheikhid));
        //المفروض هنا نعمل validation

        //binding prameters with prepare query.
        /**
         * bind_param("modes...",prameters....);
         */
        $obj->bind_param("ssi", $this->title, $this->contentpath, $this->sheikhid);

        if ($obj->execute()) {
            //query done successfully..
            return true;
        }
        return false;
    }
    //return single news accourding id
    public function get_single_news()
    {

        //sql query...
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";

        //prepare our statment.
        $obj = $this->conn->prepare($query);

        //binding pramaters data.
        $obj->bind_param("i", $this->id);

        //execuate
        $obj->execute();

        //get data
        $data = $obj->get_result();

        return $data->fetch_assoc();
    }
    //update news...
    public function update_news()
    {

        //sql query
        $query = "UPDATE " . $this->table_name . " 
        SET title = ?,
        contentpath = ?,
        edited = 1,
        sheikhid = ? 
        WHERE id = ?";

        //prepare our query
        $obj = $this->conn->prepare($query);

        //sanitize input data...
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->contentpath = htmlspecialchars(strip_tags($this->contentpath));
        $this->sheikhid = htmlspecialchars(strip_tags($this->sheikhid));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $obj->bind_param("ssii", $this->title, $this->contentpath, $this->sheikhid, $this->id);
        //execute query..
        if ($obj->execute()) {
            return true;
        }
        return false;
    }

    //delete news
    public function delete_news()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $obj = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $obj->bind_param("i", $this->id);

        if ($obj->execute())
            return true;
        else
            return false;
    }
}