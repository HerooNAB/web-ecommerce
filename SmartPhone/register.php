<?php
include_once("./hearder.php");

?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="/smartphone/controllers/AccountController.php?action=register" method="post">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Register</button>

    </div>
</form>
<?php
include_once("./footer.php");
?>