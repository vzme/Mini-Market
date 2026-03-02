<?php


class Connect
{
    public $db;


    public function __construct()
    {

        $this->connectDB();

    }
    public function connectDB()
    {

        $this->db = new mysqli("localhost", "root", "", "market_ds");
        if ($this->db->connect_errno) {

            echo "Error: " . $this->db->connect_errno;

        } else {
        }

    }

    public function query($query)
    {
        $query = $this->db->query($query);
        return $query;
    }

    
    public function secure($data){
    $secure = $this->db->real_escape_string($data);
    return $secure;
    }
}

$obj = new Connect();

?>