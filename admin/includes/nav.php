<?php require_once("header.php"); require_once("init.php");?>
<nav class="navbar bg-primary col-10 d-flex justify-content-center align-items-center mx-auto mt-4 rounded">
  <div class="container d-flex align-items-center justify-content-space m-1 p-1">
  <a href="index.php">  
  <img src="https://cdn-icons-png.flaticon.com/512/7511/7511667.png" alt="Logo" width="30" height="30">
    </a>
    <h3 class="bg-dark text-white fs-5 p-1 m-0 rounded">Market</h3>


    <?php 
    if(isset($session->rule)){
    if($session->rule == 2){
       ?>
    <h3 class="bg-success text-white fs-5 p-1 m-0 rounded">Welcome Admin!</h3>

    <?php
    }
    }else{
      echo "not found";
    }
    ?>

  <button class="btn btn-danger">
  <a href="logout.php" class="text-white">Logout</a>
  </button>
  </div>
  
</nav>

