<?php 
require("includes/nav.php"); 
require("api/update_category.php");
require("api/delete_category.php");

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
                <th scope="col">Name Category</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
                <?php
            $get_category = $cat->getAllCategory();
foreach($get_category as $c){ ?>
                  <tr>
                  <td><?php echo $c->id ?></td>
                  <td><?php echo $c->name ?></td>
                  <td>
                    <a href="viewcategory.php?c_name=<?php echo $c->id; ?>" class="text-white btn btn-success">Update</a>
                    <a class="text-decoration-none text-white btn btn-danger" href="viewcategory.php?del_id=<?php echo $c->id; ?>">Delete</a>
                  </td>
                  </tr>
                  <?php } ?>
      
              
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
        if (isset($_GET['c_name'])) {
      $name_param = $_GET['c_name'];
      $g = $cat->getOneCategory($name_param); 
      
      if($g){ ?>
          <input type="text" name="name" class="form-control" value="<?php echo $g->name; ?>">
          <input type="hidden" name="id" value="<?php echo $g->id; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update_category" class="btn btn-success">Update</button>
      </div>
    </div>
    </form>
     <?php } 
    } ?>
  </div>
</div>


<?php if (isset($_GET['c_name'])) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      myModal.show();
    });
  </script>
<?php } ?>

<?php require("includes/footer.php"); ?>