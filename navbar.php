<?php
require_once 'dbase.php';
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = "en"; 
}

if ($lang == "ar") {
    require_once 'lang/lang_ar.php';
} else {
    require_once 'lang/lang_en.php';
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $language['dir']; ?>">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
   
</head>
<body>

<section id="header">
    <a href="index.html">
        <img src="img/logo.png" alt="homeLogo">
    </a>

    <div>
        <ul id="navbar">
            <li class="link">
                <a class="active" href="index.html"></a>
            </li>
            <li class="link">
                <a href="shop.php"></a>
            </li>
            <li class="link">
                <a href="index.php"><?php echo $language['BLOG']; ?></a>
            </li>
            <li class="link">
                <a href="about.php"><?php echo $language['About']; ?></a>
            </li>
            <li class="link">
                <a href="contact.php"><?php echo $language['Contact']; ?></a>
            </li>
            <li class="link">
                <a href="signup.php"><?php echo $language['Signup']; ?></a>
            </li>
            <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == "ar") { ?>
            <li class="link">
                <a href="lang.php?lang=en">English</a>
            </li>
            <?php } else { ?>
            <li class="link">
                <a href="lang.php?lang=ar">العربيه</a>
            </li>
            <?php } ?>
            <li class="link">
                <a href="login.php"><?php echo $language['Login']; ?></a>
            </li>
            <li class="link">
                <a id="lg-cart" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>

    <div id="mobile">
        <a href="cart.html">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="#" id="bar"><i class="fas fa-outdent"></i></a>
    </div>
</section>

</body>
</html>
