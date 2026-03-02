<?php

class Category{

    public $id;
    public $name;

    public static function create($category)
    {
        global $obj;

        $query = $obj->query("INSERT INTO category(`name`) VALUES('$category')");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategory(){
    return self::query_process("SELECT * FROM category");    
    }

    public static function getOneCategory($id){
    
    $single_user = self::query_process("SELECT * FROM category where id = '$id'");
    return !empty($single_user) ? array_shift($single_user) : false;
    }


    public static function query_process($data)
    {
        global $obj;
        $query = $obj->query($data);
        $get_content_user = array();

        while ($rows = mysqli_fetch_array($query)) {
            $get_content_user[] = self::instance($rows);
        }

        return $get_content_user;
    }
    public static function instance($column)
    {
        $userClass = new self;
        foreach ($column as $property => $info) {
            $userClass->$property = $info;
        }
        return $userClass;
    }


    public function update($id, $name){
        global $obj;
        $query = $obj->query("UPDATE category set `name`='$name' where id = '$id'");
        if($query){
        return true;
        }else{

        return false;

        }

    }

}


$cat = new Category();
?>