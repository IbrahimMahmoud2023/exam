<?php
include "header.php";
include "navbar.php";
require_once 'dbase.php';
?>

<?php
if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
<?php 
    unset($_SESSION['success']);
}
?>

<?php
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php }
    unset($_SESSION['errors']);  
}
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Register</h3>
    <form action="handle/handle_register.php" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control p_input" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control p_input" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control p_input" name="password">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control p_input" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control p_input" name="address">
        </div>
        <div class="text-center">
            <button type="submit" name="signup" class="btn btn-primary btn-block enter-btn">Signup</button>
        </div>
        <div class="d-flex">
            <button class="btn btn-facebook col me-2">
                <i class="mdi mdi-facebook"></i> Facebook 
            </button>
            <button class="btn btn-google col">
                <i class="mdi mdi-google-plus"></i> Google plus 
            </button>
        </div>
        <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
        <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
    </form>
</div>

<?php include "footer.php" ?>
