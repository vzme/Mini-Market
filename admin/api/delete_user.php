<?php
require("includes/init.php");

if(isset($_GET['del_id'])){

$id = $obj->secure($_GET['del_id']);
echo $id;

$query = $user->delete($id);
if($query){

echo "Deleted";
header("Location:viewuser.php");
echo $id;
echo "test";
}else{

echo "Failed";

}

}

?>