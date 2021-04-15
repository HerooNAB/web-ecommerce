<?php
require_once("./config/db.class.php");
/**
 * 
 */
class Category
{
    public $cateID;
    public $categoryName;
    public $description;

    public function __construct($cate_name, $desc)
    {
        $this->categoryName = $cate_name;
        $this->description = $desc;
    }
    // lấy danh sách chuyên mục loại sản phẩm
    public static function list_category()
    {
        $db = new DB();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function name_list_category($id)
    {
        $db = new DB();
        $sql = "SELECT category.CategoryName FROM category WHERE CateID='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function save()
    {
        $db = new DB();

        // thêm category vào CSDL
        $sql = "INSERT INTO Category (CategoryName,Description) VALUES 
        ('$this->categoryName', '$this->description')";

        $result = $db->query_execute($sql);

        return $result;
    }
}
