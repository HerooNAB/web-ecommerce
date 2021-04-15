<?php
include_once("./hearder.php");
require_once("./model/product.class.php");
$laptop = array();
$maytinh = array();
$dienthoai = array();
$listproduct = Product::list_product();
foreach ($listproduct as $item) {
    if ($item["CateID"] == "1") {
        array_push($dienthoai, $item);
    } elseif ($item["CateID"] == "2") {
        array_push($maytinh, $item);
    } else {
        array_push($laptop, $item);
    }
}
?>
<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="./img/br1.png" alt="Slide">
            </li>
            <li><img src="./img/br2.png" alt="Slide">

            </li>
            <li><img src="./img/b-3.png" alt="Slide">

            </li>
            <li><img src="./img/b-4.png" alt="Slide">

            </li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->
<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="img/brand1.png" alt="">
                        <img src="img/brand3.png" alt="">
                        <img src="img/brand4.png" alt="">
                        <img src="img/brand5.png" alt="">
                        <img src="img/brand6.png" alt="">
                        <img src="img/brand1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <br />

                    <h2 class="section-title" style="margin-left: -1000px; color:blue;">Mobile</h2>
                    <div class="product-carousel">
                        <?php
                        foreach ($dienthoai as $item) {
                        ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">

                                </div>

                                <h2><a href="./detail.php/<?php echo $item["ProductID"] ?>"><?php echo $item["ProductName"]; ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $item["Price"] . " $"; ?></ins>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <br />

                    <h2 class="section-title" style="margin-left: -1000px;color:blue;">Laptop</h2>
                    <div class="product-carousel">
                        <?php
                        foreach ($laptop as $item) {
                        ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">

                                </div>

                                <h2><a href="./detail.php/<?php echo $item["ProductID"] ?>"><?php echo $item["ProductName"]; ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $item["Price"] . " $"; ?></ins>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <br />
                    <br />
                    <h2 class="section-title" style="margin-left: -1000px;color:blue;">Tablet</h2>
                    <div class="product-carousel">
                        <?php
                        foreach ($maytinh as $item) {
                        ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="">

                                </div>

                                <h2><a href="./detail.php/<?php echo $item["ProductID"] ?>"><?php echo $item["ProductName"]; ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $item["Price"] . " $"; ?></ins>
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
</div> <!-- End main content area -->
<?php
include_once("./footer.php");
?>