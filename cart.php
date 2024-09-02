<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<?php
require_once 'dbase.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];

   
    $check_query = "SELECT * FROM cart WHERE product_id = '$product_id'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
       
        $update_query = "UPDATE cart SET quantity = quantity + $quantity WHERE product_id = '$product_id'";
        $conn->query($update_query);
    } else {
       
        $insert_query = "INSERT INTO cart (product_id, name, price, image, quantity,description) 
                         VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$quantity','$product_description')";
        $conn->query($insert_query);
    }
}


$query = "SELECT * FROM cart";
$result = $conn->query($query);
?>

<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Subtotal</td>
                <td>Remove</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="admin/upload/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td>$<?php echo $row['quantity'] * $row['price']; ?></td>
                <td><a href="handle/handle_remove.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">confirm</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<?php include "footer.php"; ?>
