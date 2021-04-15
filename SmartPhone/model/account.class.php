<?php
require_once("./config/db.class.php");
/**
 * 
 */
class Account
{
    public $id;
    public $username;
    public $Address;
    public $PhoneNumber;

    public function __construct($username, $addr, $PhoneNumber)
    {
        $this->username = $username;
        $this->Address = $addr;
        $this->PhoneNumber = $PhoneNumber;
    }
    // lấy danh sách chuyên mục loại sản phẩm
    public static function list_account()
    {
        $db = new DB();
        $sql = "SELECT * FROM account";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function name_list_account($id)
    {
        $db = new DB();
        $sql = "SELECT account.username FROM account WHERE id='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>
