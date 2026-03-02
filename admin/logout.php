<?php
require("./includes/init.php");
$session->logout();
header("Location:login.php");
?>