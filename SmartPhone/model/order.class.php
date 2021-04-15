<?php
require_once("./config/db.class.php");
/**
 * 
 */
class Order
{
    public $OrderID;
    public $OrderDate;
    public $Phone;
    public $Name;
    public $Address;

    public function __construct($date, $phone, $name, $address)
    {
        $this->OrderDate = $date;
        $this->Phone = $phone;
        $this->Name = $name;
        $this->Address = $address;
    }
    // lấy danh sách chuyên mục loại sản phẩm
    public static function list_order()
    {
        $db = new DB();
        $sql = "SELECT * FROM orderproduct";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
