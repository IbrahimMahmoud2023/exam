<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
require_once 'dbase.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="pro">
            <img src="admin/upload/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
            <div class="des">
                <span><?php echo $row['category']; ?></span>
                <h5><?php echo $row['title']; ?></h5>
                <p><?php echo $row['description']; ?></p>
                <h4>$<?php echo $row['price']; ?></h4>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="cart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
    <input type="hidden" name="product_description" value="<?php echo $row['description']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
    <input type="number" name="quantity" min="1" value="">
    <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
               </form>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

