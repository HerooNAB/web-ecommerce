<?php
require_once("./config/db.class.php");
error_reporting(E_ALL ^ E_WARNING); 
error_reporting( error_reporting() & ~E_NOTICE );
/**
 * 
 */
class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
    {
        //
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    // lưu sản phẩm
    public function save()
    {

        // xử lý upload hình ảnh
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath = "./uploads/" . $timestamp . $user_file;
        if (move_uploaded_file($file_temp, $filepath) == false) {
            return false;
        }
        // end upload file
        $db = new DB();

        // thêm product vào CSDL
        $sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES 
        ('$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$filepath')";

        $result = $db->query_execute($sql);
        
        return $result;
    }
    public static function edit($id,$name,$cateId,$quantity,$description,$picture,$price)
    {

        // xử lý upload hình ảnh
        $db = new DB();
        // thêm product vào CSDL
    
        $sql = "UPDATE Product SET ProductName='$name', Quantity='$quantity', Price='$price', Description='$description', CateID='$cateId', Picture='hung' WHERE id=$id";
        if($db->query_execute($sql)==true)
        {
            echo "Record updated successfully";
        }
        else {
            echo "Error updating record: " . $db->error;
          }
    }
   
    public static function list_product()
    {
        $db = new DB();
        $sql = "SELECT * FROM `product`";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function detail_product( $id)
    {
        $db = new DB();
        $sql = "SELECT * FROM product WHERE ProductID=$id ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function cate($id)
    {
        $db = new DB();
        $sql = "SELECT * FROM product WHERE CateID=$id";
        $result = $db->select_to_array($sql);
        return $result;
    }
      public static function deleteProduct($id){

        $db = new DB();
        $sql = "DELETE FROM product WHERE ProductID=$id"; 
        $result = $db->query_execute($sql);
        return $result;
    }
}
