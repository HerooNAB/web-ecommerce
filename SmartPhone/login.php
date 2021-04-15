<?php
include_once("./hearder.php");

?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="/smartphone/controllers/AccountController.php?action=login" method="post">

    <div class="container">
        <div style="text-align: center; font-size: 30px;">
            <label for="uname"><b>Username</b></label>
        </div>
        <input type="text" placeholder="Enter Username" name="uname" required>
    </div>

    <div class="container">
        <div style="text-align: center; font-size: 30px;">
            <label for="psw"><b>Password</b></label>
        </div>
        <input type="password" placeholder="Enter Password" name="psw" required>
    </div>

    <div class="container">
        <button type="submit">Login</button>
    </div>
</form>
<?php
include_once("./footer.php");
?>