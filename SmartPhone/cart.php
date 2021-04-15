<?php
include_once("./hearder.php");
require_once("./model/product.class.php");
error_reporting(E_ALL ^ E_WARNING);
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
if (isset($_SESSION["cart"])) {
    $listproduct = $_SESSION["cart"];
}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ Hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Thanh Toán</h2>
                    <form style="padding: 20px;" action="/smartphone/controllers/AccountController.php?action=checkout" method="post">
                        <label style="margin-left: 10px;">Họ tên</label>
                        <input type="text" name="name" required>
                        <label style="padding-top: 10px; margin-left: 10px;">Địa Chỉ</label>
                        <input type="text" name="address" required>
                        <label style="padding-top: 10px; margin-left: 10px;">Số Điện Thoại</label>
                        <input type="text" name="phone" required>
                        <input type="submit" value="Thanh Toán">
                    </form>
                </div>
            </div>


            <div class="col-md-8">
                <div class="product-content-right">
                    <div style="padding-top: 55px;" class="woocommerce">
                        <form style="padding: 20px;" method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    foreach ($listproduct as $value) {
                                        foreach ($value as $v) {
                                    ?>
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="#"><?php echo ($id) ?></a>
                                                </td>

                                                <td class="product-thumbnail">
                                                    <a href="./detail.php/<?php echo $v["ProductID"] ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo "/smartphone/" . $v["Picture"]; ?>"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="./detail.php/<?php echo $v["ProductID"] ?>"><?php echo $v["ProductName"]; ?></a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount"><?php echo $v["Price"]; ?></span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">

                                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">

                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount"><?php echo $v["Price"] * 1; ?></span>
                                                </td>
                                            </tr>
                                            <?php $id = $id + 1; ?>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("./footer.php");
?>