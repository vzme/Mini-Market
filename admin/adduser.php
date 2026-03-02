<?php require("includes/nav.php");
solider(2);
if(isset($_POST['add'])){

$username = $obj->secure($_POST['username']);
$password = $obj->secure($_POST["password"]);
$rule = $obj->secure($_POST["rule"]);

$query = $user->create($username , $password , $rule);
if($query){

echo "successfuly";
header("Location:viewuser.php");

}else{

echo "Failed Try Again";

}

}



?>
<div class="container-fluid mt-5 ms-5 justify-content-center">
  <div class="row">
     
    <div class="col-2">
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
    Dashboard
  </button>

 <a href="addproduct.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">Add Product</button></a>
  <a href="viewproduct.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">View Product</button></a>
  <a href="addcategory.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">Add Category</button></a>
  <a href="viewcategory.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">View Category</button></a>

   <?php
    if (isset($session->rule)) {
      if ($session->rule == 2) {
        ?>

        <a href="adduser.php" class="text-decoration-none"><button type="button"
            class="list-group-item list-group-item-action">Add Users</button></a>
        <a href="viewuser.php" class="text-decoration-none"><button type="button"
            class="list-group-item list-group-item-action">View Users</button></a>

        <?php
      }
    } else {
    }
    ?>
      </div>
    </div>

    <div class="col-8 bg-dark rounded p-3">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1 class="text-center text-white">Form Add User</h1>
      <h4 class="text-white">Username</h4>  
    <input type="text" name="username" class="form-control" placeholder="Username">
    <h4 class="text-white">Password</h4>  
    <input type="text" name="password" class="form-control" placeholder="password">
    <h4 class="text-white">Rule</h4>  
    <input type="text" name="rule" class="form-control" placeholder="rule">
    <button type="submit" name="add" class="btn btn-primary mt-3 w-100">Add User</button>
  </form>
  </div>
    
  </div>
</div>


<?php require("includes/footer.php"); ?>