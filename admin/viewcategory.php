<?php require("includes/nav.php"); ?>




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
                <th scope="col">Name Category</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
                <?php
    $all_category = $category->getAllCategory();
    foreach($all_category as $category){ ?>
                  <tr>
                  <td><?php echo $category->id ?></td>
                  <td><?php echo $category->name ?></td>
                  <td>
                    <a href="viewcategory.php?c_id=<?php echo $category->name; ?>" class="text-white btn btn-success">Update</a>
                    <button class="btn btn-danger"><a class="text-decoration-none text-white" href="delete.php?id">Delete</a></button>
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






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <?php
        $editUser = null;
        if (isset($_GET['c_id'])) {
          $name = $_GET['c_id'];
          $g = $category->getOneCategory($name);

        ?>
          <input type="text" name="username" class="form-control" value="<?php echo $g->id; ?>">
          <input type="text" name="password" class="form-control" value="<?php echo $g->name; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update_user" class="btn btn-success">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php } ?>

<?php if (isset($_GET['c_id'])) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      myModal.show();
    });
  </script>
<?php } ?>


<?php require("includes/footer.php"); ?>