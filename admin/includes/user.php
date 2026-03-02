<?php
class User{

public $id;
public $username;
public $password;
public $rule;



    public function getAllUser(){
    $query = $this->query_process("SELECT * FROM users");
    return $query;
    }


    public static  function query_process($data){
        global $obj;
        $query = $obj->query($data);
        $get_content_user = array();

        while($rows = mysqli_fetch_array($query)){
         $get_content_user[] = self::instance($rows);
        }

        return $get_content_user;
    }

    public static function instance($column){

    $userClass = new self;
    foreach($column  as $property => $info){
    $userClass->$property = $info;
    }
    return $userClass;  
    }

    public static function verify($username , $password){
        global $obj;
        $pass_hash = hash('gost' , $password);
        $query = self::query_process("SELECT * FROM users WHERE `username` = '$username' AND `password` ='$pass_hash'");
        return !empty($query) ? array_shift($query) : false;
    }


    public function create($username, $password, $rule)
    {
        global $obj;
        $pass = hash('gost' , $password);
        $query = $obj->secure($obj->query("INSERT INTO `users`(`username` , `password` ,`rule`) VALUES('$username' , '$pass' , '$rule')"));
        if ($query) {
            return true;
        } else {
            return false;
        }

    }


    public function update($id, $username, $password, $rule)
    {
        global $obj;
        $query = $obj->query("UPDATE users set `username` ='$username' , `password` = '$password' , `rule` = '$rule' where id = '$id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id){
    global $obj;
    $query = $obj->query("DELETE FROM users where `id` = '$id'");
    if($query){
    return true;
    }else{
        return false;
    }
    }
}

$user = new User();

?>