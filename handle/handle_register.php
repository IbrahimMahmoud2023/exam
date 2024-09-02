<?php
require_once '../dbase.php';

if(isset($_POST['signup'])){
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $password = htmlspecialchars(trim($_POST['password']));
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);

    $errors = [];
    if(empty($name)){
        $errors[] = "name is required";
    }elseif(!is_string($name)){
        $errors[] = "name must be string";
    }

    if(empty($email)){
        $errors[] = "email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "email not correct";
    }

    if(empty($password)){
        $errors[] = "password is required";
    }elseif(strlen($password) < 4){
        $errors[] = "password must be more than 4";
    }

    if(empty($phone)){
        $errors[] = "phone is required";
    } elseif (!is_numeric($phone))
    {
        $errors[] = "phone must be integer";
    }


    if(empty($address)){
        $errors[] = "address is required";
    }elseif(!is_string($address)){
        $errors[] = "address must be string";
    }


    if(empty($errors)){

        $role = 'User';

        $query = "INSERT INTO users (`name`,`email`,`password`,`phone`,`address`,`role`) VALUES ('$name','$email','$hashpassword','$phone','$address','$role')";
        $result = mysqli_query($conn, $query);
        if($result){

            $_SESSION['success'] = "data inserted successfully";
            header("location:../login.php");
        }else{
            header("location:../signup.php");
        }
    }else{
        $_SESSION['errors'] = $errors;
        header("location:../signup.php");
    }

}else{
    header("location:../signup.php");
    exit();
}