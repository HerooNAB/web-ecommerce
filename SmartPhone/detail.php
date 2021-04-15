<?php
require_once("./model/product.class.php");
require_once("./model/category.class.php");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = basename($actual_link);
$product = Product::detail_product($id);
$cate = Category::list_category();
foreach ($product as $item) {
    $product1 = Product::cate($item['CateID']);
}
?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page - Ustora Demo</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <?php require_once("./hearder.php") ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Chi Tiết Sản Phẩm</h2>
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
                        <h2 class="sidebar-title">Tìm kiếm</h2>
                        <form style="padding: 10px;" action="">
                            <input type="text" placeholder="Tìm Kiếm...">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Danh Sách Sản Phẩm</h2>
                        <?php
                        foreach ($cate as $item) {
                            if ($item["CategoryName"] == "Điện thoại") {
                                echo '<img src="../img/Brphone.png" class="recent-thumb" alt="">';
                            } else if ($item["CategoryName"] == "Laptop") {
                                echo '<img src="../img/Brlaptop.png" class="recent-thumb" alt="">';
                            } else {
                                echo '<img src="../img/Brtablet.png" class="recent-thumb" alt="">';
                            }
                        ?>
                            <div class="thubmnail-recent">
                                <h2><a href=""><?php echo $item["CategoryName"]; ?></a></h2>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                foreach ($product as $item) {
                ?>
                    <div class="col-md-8">
                        <div class="product-content-right">
                            <div class="product-breadcroumb">
                                <a href="">Trang Chủ</a>
                                <a href="">Danh Sách Sản Phẩm</a>
                                <a href=""><?php echo $item["ProductName"]; ?></a>
                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name"><?php echo $item["ProductName"]; ?></h2>
                                        <div class="product-inner-price">
                                            <ins> Giá :<?php echo $item["Price"]; ?> $</ins>
                                        </div>
                                        <div role="tabpanel">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Mô Tả</h2>
                                                    <p><?php echo $item["Description"]; ?></p>
                                                </div>

                                            </div>
                                        </div>

                                        <form style="padding: 20px;" action="" class="cart">
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <button class="add_to_cart_button" type="submit">Thêm vào giỏ</button>
                                        </form>


                                    </div>
                                </div>
                            <?php
                        }
                            ?>


                            </div>
                        </div>
                    </div>
                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Sản Phẩm Liên Quan</h2>
                        <div class="related-products-carousel owl-carousel owl-theme owl-loaded owl-responsive-600">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-1850px, 0px, 0px); transition: all 0.25s ease 0s; width: 3700px;">
                                    <div class="owl-item cloned" style="width: 350px; margin-right: 20px;">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="img/product-5.jpg" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                </div>
                                            </div>

                                            <h2><a href=""></a></h2>

                                            <div class="product-carousel-price">
                                                <ins>$1200.00</ins> <del>$1355.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 350px; margin-right: 20px;">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="img/product-6.jpg" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                </div>
                                            </div>

                                            <h2><a href="">Samsung gallaxy note 4</a></h2>

                                            <div class="product-carousel-price">
                                                <ins>$400.00</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 350px; margin-right: 20px;">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="img/product-1.jpg" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                </div>
                                            </div>

                                            <h2><a href="">Sony Smart TV - 2015</a></h2>

                                            <div class="product-carousel-price">
                                                <ins>$700.00</ins> <del>$100.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 350px; margin-right: 20px;">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="img/product-2.jpg" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                </div>
                                            </div>

                                            <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                            <div class="product-carousel-price">
                                                <ins>$899.00</ins> <del>$999.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 350px; margin-right: 20px;">
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="img/product-3.jpg" alt="">
                                                <div class="product-hover">
                                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                </div>
                                            </div>

                                            <h2><a href="">Apple new i phone 6</a></h2>

                                            <div class="product-carousel-price">
                                                <ins>$400.00</ins> <del>$425.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($product1 as $item) {
                                    ?>
                                        <div class="owl-item active" style="width: 350px; margin-right: 20px;">
                                            <div class="single-product">
                                                <div class="product-f-image">
                                                    <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">
                                                    <div class="product-hover">
                                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                                    </div>
                                                </div>

                                                <h2><a href=""><?php echo $item["ProductName"]; ?></a></h2>

                                                <div class="product-carousel-price">
                                                    <ins> Giá :<?php echo $item["Price"]; ?> $</ins>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>


    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="../js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="../js/s/main.js"></script>
</body>

</html>