<?php
require("includes/init.php");
if (isset($_POST['update_category'])) {

    $id = $obj->secure($_POST['id']);
    $name = $obj->secure($_POST['name']);
    $query = $cat->update($id, $name);

    if ($query) {
    header("Location:viewcategory.php");
    } else {
        echo "failed";
    }
}



?>