<?php include('../db/db.php'); ?>
<?php
session_start();
if (isset($_POST['login'])) {
    if (isset($_SESSION['user_name'])) {
        session_destroy();
        header("location:../index.php");
    } else {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $serect_code = $_POST['serect_code'];

        if ($password) {
            $query = "select * from `participants` where `user_name` = '$user_name' and `password` = '$password'";
        } else {
            $query = "select * from `participants` where `user_name` = '$user_name' and `serect_code` = '$serect_code'";
        }

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_name'] = $user_name;
                $_SESSION['src'] = $row['src'];
                $_SESSION['success_msg'] = "Welcome";
                header("location:../index.php");
            } else {
                header("location:../index.php");
                $_SESSION['fail_msg'] = "fail";
            }
        }
    }
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['Singup'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password2'];
    $serect_code = $_POST['serect_code'];

    $check_query = "SELECT * FROM `participants` WHERE `user_name` = '$user_name'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        header("Location: ../index.php");
        $_SESSION['exist_msg'] = "success";
        exit();
    } else {
        // Username doesn't exist, proceed with the insertion
        $filename = basename($_FILES['img']['name']);
        $filename = mysqli_real_escape_string($connection, $filename);
        $tempname = $_FILES['img']['tmp_name'];
        $folder = "../uploads/" . $filename;

        $insert_query = "INSERT INTO `participants` (`user_name`, `serect_code`, `password`, `src`) VALUES ('$user_name', '$serect_code', '$password', '$filename')";
        $insert_result = mysqli_query($connection, $insert_query);

        if (!$insert_result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            if (move_uploaded_file($tempname, $folder)) {
                // File uploaded successfully
            } else {
                // Handle file upload failure if necessary
            }
            header("Location: ../index.php");
            $_SESSION['singup_msg'] = "success";
            exit();
        }
    }
}
?>