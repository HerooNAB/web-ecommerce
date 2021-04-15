<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Product Page - Admin HTML Template</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="assets1/css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="assets1/css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="assets1/css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
  <nav class="navbar navbar-expand-xl">
    <div class="container h-100">
      <a class="navbar-brand" href="admin1.php">
        <h1 class="tm-site-title mb-0">Product Admin</h1>
      </a>
      <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars tm-nav-icon"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="/smartphone/admin1.php">
              <i class="fas fa-tachometer-alt"></i> Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-file-alt"></i>
              <span> Reports <i class="fas fa-angle-down"></i> </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Daily Report</a>
              <a class="dropdown-item" href="#">Weekly Report</a>
              <a class="dropdown-item" href="#">Yearly Report</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="product1.php">
              <i class="fas fa-shopping-cart"></i> Products
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link">
              <i class="far fa-user"></i> Accounts
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
              <span> Settings <i class="fas fa-angle-down"></i> </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Billing</a>
              <a class="dropdown-item" href="#">Customize</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-block">
              Admin, <b>Logout</b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">
            <?php
            require_once("./config/db.class.php");
            require_once("./model/product.class.php");
            require_once("./model/category.class.php");
            $listproduct = Product::list_product();
            error_reporting(E_ALL ^ E_WARNING);
            error_reporting(error_reporting() & ~E_NOTICE);
            ?>
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Category</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listproduct as $item) {
                ?>
                  <td class="v-align-middle">
                    <p><?php echo $item["ProductName"]; ?></p>
                  </td>
                  <td class="v-align-middle">

                    <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="" width="30%">
                  </td>
                  <td class="v-align-middle">
                    <p><?php echo $item["Quantity"]; ?></p>
                  </td>
                  <td class="v-align-middle">
                    <p><?php echo $item["Price"]; ?></p>
                  </td>
                  <td class="v-align-middle">
                    <p><?php echo $item["Description"]; ?></p>
                  </td>
                  <?php
                  $id = $item["CateID"];
                  $cate = reset(Category::name_list_category($id));
                  ?>
                  <td class="v-align-middle">
                    <p><?php echo $cate["CategoryName"]; ?></p>
                  </td>
                  <td>
                    <a href="./delete.php/<?php echo $item["ProductID"] ?>" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                    </button>
                    <button class="tm-product-delete-link" data-toggle="modal" data-target="#<?php echo "Modal" . $item["ProductID"] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    </a>
                  </td>

                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- table container -->
          <a href="./addproduct.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>

        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
          <h2 class="tm-block-title">Product Categories</h2>
          <div class="tm-product-table-container">
            <?php
            require_once("./config/db.class.php");
            require_once("./model/product.class.php");
            require_once("./model/category.class.php");
            $listproduct = Category::list_category();
            error_reporting(E_ALL ^ E_WARNING);
            error_reporting(error_reporting() & ~E_NOTICE);

            ?>
            <table class="table tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listproduct as $item) {
                ?>
                  <td class="v-align-middle">
                    <p><?php echo $item["CategoryName"]; ?></p>
                  </td>

                  <td class="v-align-middle">
                    <p><?php echo $item["Description"]; ?></p>
                  </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- table container -->

          <a href="./addcategory.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new Category</a>

        </div>
      </div>
    </div>
  </div>
  <?php
  require_once("./model/product.class.php");
  require_once("./model/category.class.php");
  $listproduct = Product::list_product();
  foreach ($listproduct as $item) {
  ?>

    <div class="modal fade stick-up" id="<?php echo "Modal" . $item["ProductID"]; ?>" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header clearfix ">

            <h4 class="p-b-5"><span class="semi-bold">Edit</span> Product</h4>
          </div>
          <div class="modal-body">
            <form action="/smartphone/controllers/AccountController.php?action=update" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12">
                  <label>Product Id</label>
                  <div class="form-group form-group-default">
                    <input id="appName" name="txtid" type="text" class="form-control" value="<?php echo $item["ProductID"]; ?>" readonly="readonly" placeholder="Name of your product">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <label>Product Name</label>

                  <div class="form-group form-group-default">
                    <input id="appName" name="txtName" type="text" class="form-control" value="<?php echo $item["ProductName"]; ?>" placeholder="Name of your product">
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Description</label>
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <input id="appDescription" type="text" name="txtDesc" value="<?php echo $item["Description"]; ?>" class="form-control" placeholder="Description...">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Price</label>
                  <div class="form-group form-group-default">
                    <input id="appPrice" type="text" name="txtPrice" class="form-control" value="<?php echo $item["Price"]; ?>" placeholder="Your price">
                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Quantity</label>
                  <div class="form-group form-group-default">
                    <input id="appNotes" type="text" name="txtQuantity" value="<?php echo $item["Quantity"]; ?>" class="form-control" placeholder="Quantity....">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group form-group-default">

                    <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true" name="txtCateID">
                      <?php
                      require_once("./model/category.class.php");
                      $cates = Category::list_category();
                      foreach ($cates as $v) {
                        if ($item["CateID"] == $v["CateID"]) {

                      ?>

                          <option value="<?php echo $v["CateID"] ?>" selected><?php echo $v["CategoryName"] ?></option>

                        <?php
                        } else {
                        ?>
                          <option value="<?php echo $v["CateID"] ?>"><?php echo $v["CategoryName"] ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>

                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <input class="form-control" type="file" name="txtPic" accept=".PNG,.GIF,.JPG">
                      <label>Image Old</label>
                      <img src="<?php echo "/smartphone/" . $item["Picture"]; ?>" alt="" width="30%">
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <input class="btn btn-primary" type="submit" name="btnsubmit1" value="Add" />
            <button aria-label="" type="button" class="btn btn-cons" data-dismiss="modal">Close</button>
          </div>

          </form>
        </div>
        <!-- /.modal-content -->
      </div>

      <!-- /.modal-dialog -->
    </div>
  <?php
  }
  ?>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2018</b> All rights reserved.

        Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
      </p>
    </div>
  </footer>

  <script src="assets1/js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="assets1/js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function() {
      $(".tm-product-name").on("click", function() {
        window.location.href = "";
      });
    });
  </script>
</body>

</html>