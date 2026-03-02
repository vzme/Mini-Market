<?php require("includes/nav.php");
solider(2);



?>

<div class="container-fluid mt-5">
  <div class="row px-4"> <div class="col-md-2">
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

    <div class="col-md-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Rule</th>
                <th scope="col" class="col-2 w-50">Action</th>
                
              </tr>
            </thead>
            <tbody>
<?php              $getUser = $user->getAllUser();

        foreach ($getUser as $user) {

                     ?>
                  <tr>
                  <td><?php echo $user->id; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->password; ?></td>
                  <td><?php echo $user->rule; ?></td>
                  <td>
                    <button class="btn btn-success"><a href="update.php?id">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?id">Delete</a></button>
                  </td>

              <?php } ?>
              
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?php require("includes/footer.php"); ?>