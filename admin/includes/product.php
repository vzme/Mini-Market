<?php
class Product{

public $id;
public $category_id;
public $name_product;
public $quantity;
public $sell_price;
public $buy_price;
public $date_create;
public $date_expired;


public function create($category_id , $name_product , $buy_price , $sell_price , $quantity  , $date_create , $date_expired){
        global $obj;
        $query = $obj->query("INSERT INTO product(`category_id`,`name_product`, `buy_price` , `sell_price` , `quantity`, `date_create` , `date_expired`)
                             VALUES('$category_id' , '$name_product' , '$buy_price' , '$sell_price' , '$quantity' , '$date_create' , '$date_expired')");

        if($query){
        return true;
        }else{
            return false;
        }

    }

        public function getAllProduct(){
    return self::query_process("SELECT * FROM product");    
    }

    public static function getOneProduct($name){
    
    $single_product = self::query_process("SELECT id FROM product where name = '$name'");
    return !empty($single_user) ? array_shift($single_user) : false;
    }

    public static function getProductById($id){
    
    $single_product_id = self::query_process("SELECT * FROM product where name = '$id'");
    return !empty($single_user) ? array_shift($single_product_id) : false;
    }


    public static function query_process($data)
    {
        global $obj;
        $query = $obj->query($data);
        $get_content_user = array();

        while ($rows = mysqli_fetch_array($query)) {
            $get_content_user[] = self::instance($rows);
        }

        return $get_content_user;
    }
    public static function instance($column)
    {
        $userClass = new self;
        foreach ($column as $property => $info) {
            $userClass->$property = $info;
        }
        return $userClass;
    }

}

$pro = new Product();
?>