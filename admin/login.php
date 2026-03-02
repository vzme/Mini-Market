<?php
require("includes/header.php");
solider(i: 0);
if (isset($_POST['login'])) {
    $username = $obj->secure($_POST["username"]);
    $password = $obj->secure($_POST["password"]);

    if (!empty($username) && !empty($password)) {

        $checking_user_pass = User::verify($username, password: $password);
        if ($checking_user_pass) {
            $session->login($checking_user_pass);
            header("Location:index.php");
            
        } else {
            $error['result'] = "Username and Password Valid";
        }
    } else {
        echo "Failed";
    }
}



?>


<div class="container d-flex mt-5 justify-content-center align-items-center rounded">
    <div class="form-group bg-light p-4 col-6">
        <h1 class="text-center">Login</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username"  placeholder="Enter your username">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter your password">
  </div>
  <button type="submit" name="login" class="btn btn-warning w-100">Login</button>
</form>
</div>
</div>

<?php require("includes/footer.php"); ?>