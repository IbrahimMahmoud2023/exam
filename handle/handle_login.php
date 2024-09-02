<?php

require_once '../dbase.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result); 
            $user_id = $user['id'];
            $user_name = $user['name'];
            $old_password = $user['password'];
            $user_role = $user['role']; // الحصول على دور المستخدم

            // التحقق من صحة كلمة المرور
            $verify = password_verify($password, $old_password);

            if ($verify) {
                // تعيين متغيرات الجلسة
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                
                // التحقق من الدور وتوجيه المستخدم إلى الصفحة المناسبة
                if ($user_role === 'Admin') {
                    header("location:../admin/view/layout.php");
                } else {
                    header("location:../shop.php");
                }
                exit(); 
            } else {
                $_SESSION['errors'] = "The password is incorrect";
                header("location:../login.php");
                exit(); 
            }
        } else {
            $_SESSION['errors'] = "The email is incorrect";
            header("location:../login.php");
            exit();
        }
    }

    header("location:../login.php");
    exit(); 
}
