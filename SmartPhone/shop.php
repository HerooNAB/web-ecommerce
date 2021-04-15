<?php
include_once("./hearder.php");
require_once("./model/product.class.php");
require_once("./model/category.class.php");
if (!isset($_GET["cateid"])) {
    $listproduct = Product::list_product();
} else {
    $CateId = $_GET["cateid"];
    $listproduct = Product::cate($CateId);
}

$cate = Category::list_category();

?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div style="text-align: center;" class="wrap-nav">

        <h2 class="sidebar-title" style="font-size: 35px; padding-right:60px"> <a href="" /smartphone/shop.php">Danh Sách Sản Phẩm</a></h2>
        <?php
        foreach ($cate as $item) {
        ?>
            <div class="thubmnail-recent" style=" display:inline-flex">
                <h2 style="font-size: 23px;"><a href="/smartphone/shop.php?cateid=<?php echo $item["CateID"]; ?>"><?php echo $item["CategoryName"]; ?></a></h2>
                <img src="../img/brand6.png" class="recent-thumb" alt="">
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="container">

            <?php
            foreach ($listproduct as $item) {
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">
                        </div>
                        <?php $item["ProductID"] ?>
                        <h2><a href="./detail.php/<?php echo $item["ProductID"] ?>"><?php echo $item["ProductName"]; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $item["Price"]; ?></ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="./cartCon.php/<?php echo $item["ProductID"] ?>">Thêm Giỏ Hàng</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
</div>
<?php
include_once("./footer.php");
?>