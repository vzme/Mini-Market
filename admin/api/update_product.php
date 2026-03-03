<?php
require("includes/init.php");

if(isset($_POST['update_product'])){

$id = $obj->secure($_POST['id']);
$category_id = $obj->secure($_POST['category_id']);
$product_name = $obj->secure($_POST['name_product']);
$buy = $obj->secure($_POST['buy_price']);
$sell = $obj->secure($_POST['sell_price']);
$quantity =$obj->secure($_POST['quantity']);
$date_create = $obj->secure($_POST['date_create']);
$date_expired = $obj->secure($_POST['date_expired']);

$query = $pro->update($id , $category_id , $product_name , $buy , $sell , $quantity , $date_create , $date_expired);
if($query){

echo "Success";
header("Location:viewproduct.php");
}else{

echo "Failed";

}


}



?>