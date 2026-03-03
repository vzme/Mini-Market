<?php require("includes/nav.php");
solider(2);

if (isset($_POST['add'])) {

  $category = $obj->secure($_POST['category']);
  $name_product = $obj->secure($_POST['name_product']);
  $quantity = $obj->secure($_POST['quantity']);
  $buy = $obj->secure($_POST['buy']);
  $sell = $obj->secure($_POST['sell']);
  $date_create = $obj->secure($_POST['date_create']);
  $date_expired = $obj->secure($_POST['date_expired']);



  // wargrtni id categoryaka
  $get_id_category = Category::getjustId($category);
  $id_category = $get_id_category->id;

  $query_add = $pro->create($id_category, $name_product, $buy, $sell, $quantity, $date_create, $date_expired);

  if ($query_add) {
    echo "Added";
  } else {
    echo "Failed";
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
        <h1 class="text-center text-white">Add Product</h1>
        <div class="mb-3">

          <p class="text-white">Category</p>
          <select id="disabledSelect" name="category" class="form-select">
            <?php $gets = Category::getC();
            while($rows = mysqli_fetch_assoc($gets)){
            ?>
            <option><?php echo $rows['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <p class="text-white">Name product</p>
        <input type="text" name="name_product" class="form-control" placeholder="Name Product">


        <p class="text-white">Quantity</p>
        <input type="number" name="quantity" class="form-control" placeholder="Quantity">

        <p class="text-white">Buy</p>
        <input type="number" name="buy" class="form-control" placeholder="Buy Price">

        <p class="text-white">Sell</p>
        <input type="number" name="sell" class="form-control" placeholder="Sell Price">


        <p class="text-white">Date Create</p>
        <input type="date" name="date_create" class="form-control" placeholder="Date Create">


        <p class="text-white">Date Expired</p>
        <input type="date" name="date_expired" class="form-control" placeholder="Date Expire">


        <button type="submit" name="add" class="btn btn-primary mt-3 w-100">Add User</button>
      </form>
    </div>

  </div>
</div>


<?php require("includes/footer.php"); ?>