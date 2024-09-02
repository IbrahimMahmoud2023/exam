<?php

require_once '../dbase.php';

if(isset($_POST['addCategory'])){


    $title = $_POST['title'];

    $errors = [];

    if(empty($title)){
        $errors = "title is required";
    }

    if(empty($errors)){
        $query = "INSERT INTO category (`title`) VALUES ('$title')";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = "title inserted success";
            header("location:../admin/view/addProduct.php");
            exit();
        }else{
            $_SESSION['errors'] = $errors;
            header("location:../admin/view/addCategory.php");
        }
    }






}else{
    $_SESSION['errors'] = $errors;
    header("location:../admin/view/addCategory.php");
    exit();
}