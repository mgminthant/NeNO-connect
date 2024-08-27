<?php include '../db/db.php'; ?>
<?php
date_default_timezone_set('Asia/Yangon');
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["subscribe"])) {
    session_start();
    $email = $_POST["email"];
    $current_date = date('d/m/Y');
    $query = "insert into `subscribe_email` (`email`,`date`) values ('$email','$current_date')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        header("location:../index.php");
        $_SESSION['scribe_msg'] = "success";
    }
}

if (isset($_POST["insert_post"])) {
    session_start();
    $filename = basename($_FILES['img']['name']);
    $tempname = $_FILES['img']['tmp_name'];
    $categ = $_POST['flexRadioDefault'];
    $current_time = date('Y-m-d H:i:s');
    $desc = $_POST['desc'];
    $title = $_POST['title'];
    $folder = "../uploads/" . $filename;

    $query = "insert into `posts` (`date`,`description`,`title`,`categ`,`src`) values ('$current_time','$desc','$title','$categ','$filename')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>Image uploaded successfully!</h3>";
        } else {
            echo "<h3>Failed to move uploaded file!</h3>";
        }
        header("location:../pages/post.php");
        $_SESSION['post_msg'] = "success";
    }
}

?>