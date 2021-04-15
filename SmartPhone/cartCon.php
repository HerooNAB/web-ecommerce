<?php
require_once("./model/product.class.php");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = basename($actual_link);
$product = Product::detail_product($id);
session_start();
$_SESSION["cart"][$id] = $product;
header('Location: http://localhost/smartphone/shop.php');
