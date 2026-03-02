<?php
 require("includes/nav.php");
 require("api/delete_product.php");
 
 ?>
<div class="container-fluid mt-5">
  <div class="row px-4">
    <div class="col-md-2">
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active">
          Dashboard
        </button>
        <a href="addproduct.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">Add Product</button></a>
        <a href="viewproduct.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">View Product</button></a>
        <a href="addcategory.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">Add Category</button></a>
        <a href="viewcategory.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">View Category</button></a>

        <?php
        if (isset($session->rule) && $session->rule == 2) {
        ?>
          <a href="adduser.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">Add Users</button></a>
          <a href="viewuser.php" class="text-decoration-none"><button type="button" class="list-group-item list-group-item-action">View Users</button></a>
        <?php } ?>
      </div>
    </div>

    <div class="col-md-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category ID</th>
                <th scope="col">Name</th>
                <th scope="col">Buy Price</th>
                <th scope="col">Sell Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Created</th>
                <th scope="col">Expired</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $all_product = $pro->getAllProduct();
              foreach ($all_product as $p) { 
              ?>
              <tr>
                <td><?php echo $p->id; ?></td>
                <td><?php echo $p->category_id; ?></td>
                <td><?php echo $p->name_product; ?></td>
                <td><?php echo $p->buy_price; ?></td>
                <td><?php echo $p->sell_price; ?></td>
                <td><?php echo $p->quantity; ?></td>
                <td><?php echo $p->date_create; ?></td>
                <td><?php echo $p->date_expired; ?></td>
               <td>
                    <a href="viewproduct.php?p_id=<?php echo $p->id; ?>" class="text-white btn btn-success">Update</a>
                    <button class="btn btn-danger"><a class="text-decoration-none text-white" href="delete.php?id=<?php echo $p->id; ?>">Delete</a></button>
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
    <?php
    if (isset($_GET['p_id'])) {
      $id = $_GET['p_id'];
      $g = $pro->getProductById($id); 
      
      if($g){ ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label>Product Name</label>
              <input type="text" name="name" class="form-control mb-2" value="<?php echo $g->name_product; ?>">
              <label>Buy Price</label>
              <input type="text" name="buy_price" class="form-control" value="<?php echo $g->buy_price; ?>">
              <input type="hidden" name="id" value="<?php echo $g->id; ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="update_product" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      <?php } 
    } ?>
  </div>
</div>

<?php if (isset($_GET['p_id'])) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      myModal.show();
    });
  </script>
<?php } ?>

<?php require("includes/footer.php"); ?>