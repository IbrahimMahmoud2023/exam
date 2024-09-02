<?php
require_once '../dbase.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
}

header('Location: ../cart.php');
exit();
