<?php
require("includes/init.php");
if (isset($_GET['del_id'])) {

    $id = $obj->secure($_GET['del_id']);
    $query = $cat->delete($id);

    if ($query) {
    header("Location:viewcategory.php");
    } else {
        echo "failed";
    }
}



?>