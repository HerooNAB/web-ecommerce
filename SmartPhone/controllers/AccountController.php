<?php
// Connect database
session_start();
$rootURL = "AccountController.php?action";
require_once("../config/db.class.php");
// Control request
$action = $_REQUEST['action'];
if (!isset($action)) {
    die("INVALID");
}

switch ($action) {
    case 'login':
        Login();
        break;
    case 'logout':
        Logout();
        break;
    case 'register':
        register();
        break;
    case 'checkout':
        checkout();
        break;
    case 'update':
        Update();
        break;
    case 'status':
        updatestatus();
        break;
    case 'updateAccount':
        updatesaccount();
        break;
    default:
        break;
}

function Login()
{

    $severName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "ecommerce";
    $status = "";

    //Create connection
    $conn = new mysqli($severName, $username, $password, $databaseName);

    //Check connection  
    if ($conn->connect_error) {
        die("Connection fail: " . $conn->connect_error);
    }

    $username = $_POST['uname'];
    $pass = $_POST['psw'];
    $sqlGetAll = "SELECT * FROM `account` WHERE username= ? AND pass= ?";
    $stmt = $conn->prepare($sqlGetAll);
    $stmt->bind_param("ss", $username, $pass);

    if ($stmt->execute()) {
        $username = $stmt->get_result()->fetch_row();
        if (!empty($username)) {
            $_SESSION['user'] = $username;
            header("Location: ../index.php");
        } else {
            header("Location: http://localhost/smartphone/login.php");
        }
    } else {
        echo "ERROR" . $stmt->error;
    }
}
function register()
{
    $db = new DB();
    $username = $_POST['uname'];
    $pass = $_POST['psw'];
    $sql = "INSERT INTO account(account.username, account.pass)
    VALUES ('$username', '$pass')";
    // thêm product vào CSD
    $result = $db->query_execute($sql);
    header("Location: http://localhost/smartphone/login.php");
}
function Logout()
{
    $_SESSION['user'] = null;
    header("Location: http://localhost/smartphone/index.php");
}
function checkout()
{
    $db = new DB();
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $date = date("d/m/y");
    $sql = "INSERT INTO orderproduct(ShipName,ShipAddress,Phone,OrderDate) VALUES ('$name','$address','$phone','$date')";
    $result = $db->query_execute($sql);
    foreach ($_SESSION["cart"] as $value) {
        foreach ($value as $v) {

            $id = $v["ProductID"];
            $sql = "INSERT INTO `orderdetail`(orderdetail.ProductID,orderdetail.Quantity,orderdetail.Name )VALUES ('$id',$name,)";
            $a = $db->query_execute($sql);
        }
    }
    $_SESSION["cart"] = null;
    header("Location: http://localhost/smartphone/index.php");
}
function Update()
{
    $db = new DB();
    $file_temp =  $_FILES["txtPic"]['tmp_name'];
    $user_file =  $_FILES["txtPic"]['name'];
    $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
    $filepath = "../uploads/" . $timestamp . $user_file;
    $filepath2 = "./uploads/" . $timestamp . $user_file;
    if (move_uploaded_file($file_temp, $filepath)) {
        echo "Tải tập tin thành công";
    } else {
        echo "Tải tập tin thất bại";
    }
    $id = $_POST["txtid"];
    $ProductName = $_POST["txtName"];
    $Description = $_POST["txtDesc"];
    $Price =  $_POST["txtPrice"];
    $Quantity = $_POST["txtQuantity"];
    $cateID = $_POST["txtCateID"];
    $sql = "UPDATE product SET product.ProductName='$ProductName', product.cateID='$cateID', product.Description='$Description',product.Price='$Price', product.Quantity='$Quantity',product.Picture='$filepath2' WHERE product.ProductID='$id'";
    $result = $db->query_execute($sql);
    header("Location: http://localhost/smartphone/product1.php");
}
function updatestatus()
{
    $db = new DB();
    $status = 1;
    $id = $_POST["id"];
    $sql = "UPDATE orderproduct SET orderproduct.Status='$status' WHERE orderproduct.OrderID='$id'";
    $result = $db->query_execute($sql);
    header("Location: http://localhost/smartphone/admin1.php");
}
function updatesaccount()
{
    $db = new DB();
    $password = $_POST["pass"];
    $id = $_POST["id"];
    $sql = "UPDATE account SET account.pass='$password' WHERE account.id='$id'";
    $result = $db->query_execute($sql);
    header("Location: http://localhost/smartphone/admin1.php");
}
