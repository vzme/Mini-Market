<?php
require("includes/init.php");

if (isset($_GET['del_id'])) {

    $id = $obj->secure($_GET['del_id']);
    echo $id;

    // $query = $cat->delete($id);
    // if ($query) {

    //     echo "Deleted";
    //     header("Location:viewproduct.php");
    //     echo $id;
    // } else {

    //     echo "Failed";
    // }
}


?>