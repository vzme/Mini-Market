<?php
require("includes/init.php");

if(isset($_POST['update_user'])){

$id = $obj->secure($_POST["user_id"]);
$username = $obj->secure($_POST["username"]);
$password = $obj->secure($_POST["password"]);
$rule = $obj->secure($_POST["rule"]);

$query = $user->update($id , $username , $password , $rule);
if($query){
echo "success";
header("Location:viewuser.php");
}else{
    echo "Failed";
}

}
?>