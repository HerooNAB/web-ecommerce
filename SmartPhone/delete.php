<?php
require_once("./model/product.class.php");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id=basename($actual_link);
$product = Product::deleteProduct($id);
header('Location: http://localhost/smartphone/product1.php');
