<?php
session_start();
require_once '../dbase.php';

if (isset($_POST['addProduct'])) {
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $dir = "../admin/upload/";

    $errors = [];

    // Validation
    if (empty($category)) {
        $errors[] = "Category is required.";
    }
    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    if (empty($description)) {
        $errors[] = "Description is required.";
    }
    if (empty($price)) {
        $errors[] = "Price is required.";
    }
    if (empty($quantity)) {
        $errors[] = "Quantity is required.";
    }

    // Image upload validation
    $img = $_FILES['image'];
    $img_name = $img['name'];
    $tmp_name = $img['tmp_name'];
    $ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $newName = uniqid() . "." . $ext;
    $img_error = $img['error'];
    $img_size = $img['size'] / (1024 * 1024); // Convert size to MB

    if ($img_error > 0) {
        $errors[] = "The image is not correct.";
    } elseif ($img_size > 1) {
        $errors[] = "The image size must be less than 1MB.";
    } elseif (!in_array($ext, ['png', 'jpg', 'jpeg'])) {
        $errors[] = "The image must be in PNG, JPG, or JPEG format.";
    }

    // If no errors, proceed with the database insertion
    if (empty($errors)) {
        $query = "INSERT INTO products (category, title, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssdis", $category, $title, $description, $price, $quantity, $newName);
        
        if ($stmt->execute()) {
            move_uploaded_file($tmp_name, $dir . $newName);
            $_SESSION['success'] = "The product was inserted successfully.";
            header("Location: ../shop.php");
            exit();
        } else {
            $errors[] = "The product was not inserted.";
        }
        $stmt->close();
    }

    // Display errors
    $_SESSION['errors'] = $errors;
    header("Location: ../admin/view/addProduct.php");
    exit();
} else {
    $_SESSION['errors'] = ["Invalid request."];
    header("Location: ../admin/view/addProduct.php");

}
?>
