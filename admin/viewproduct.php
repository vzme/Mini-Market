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
                <th scope="col">category_id</th>
                <th scope="col">name_product</th>
                <th scope="col">buy_price</th>
                <th scope="col">sell_price</th>
                <th scope="col">date_create</th>
                <th scope="col">date_expired</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
                <?php
    $all_product = $pro->getAllProduct();
    foreach($all_product as $pro){ ?>
                  <tr>
                    <td><?php echo $pro->id; ?></td>
                    <td><?php echo $pro->category_id; ?></td>
                    <td><?php echo $pro->name_product; ?></td>
                    <td><?php echo $pro->buy_price; ?></td>
                    <td><?php echo $pro->sell_price; ?></td>
                    <td><?php echo $pro->quantity; ?></td>
                    <td><?php echo $pro->date_create; ?></td>
                    <td><?php echo $pro->date_expired; ?></td>
                    
                  <td>
                    <button class="btn btn-success"><a href="update.php?id" class="text-white">Update</a></button>
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











<?php require("includes/footer.php"); ?>