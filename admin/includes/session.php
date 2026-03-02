<?php
require("init.php");
class Session{
public $userid;
public $rule;
private $login_status = false;

public function __construct()
{
    session_start();
    $this->check_login();
}

public function get_login_status(){
    return $this->login_status;
}

public function login($user){
    if($user){
    $this->userid = $_SESSION['userid'] = $user->id;
    $this->rule = $_SESSION['rule'] = $user->rule;
    $this->login_status = true;
    }
}

public function logout(){
    unset($this->userid);
    unset($this->rule);
    unset($_SESSION['userid']);
    unset($_SESSION['rule']);
    $this->login_status = false;
}


public function check_login(){
    if(isset($_SESSION['userid'])){
    $this->userid = $_SESSION['userid'];
    $this->rule = $_SESSION['rule'];
    $this->login_status = true;
    }else{
        unset($this->userid);
        unset($this->rule);
        $this->login_status = false;
    }
}


}

$session = new Session();

?>