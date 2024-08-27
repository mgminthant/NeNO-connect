<?php include '../db/db.php'; ?>

<?php
session_start();
if (isset($_POST["insert_review"])) {
    $star1 = $_POST['drone1'];
    $star2 = $_POST['drone2'];
    $star3 = $_POST['drone3'];
    $star4 = $_POST['drone4'];
    $star5 = $_POST['drone5'];

    $rating = (int) $star1 + (int) $star2 + (int) $star3 + (int) $star4 + (int) $star5;
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $user_name = $_SESSION['user_name'];
    $src = $_SESSION['src'];
}
$query = "insert into `reviews` (`title`,`description`,`user_name`,`src`,`rating`) values ('$title','$desc','$user_name','$src','$rating')";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed" . mysqli_error($connection));
} else {
    header("location:../pages/dashboard.php");
    $rew_msg = "ok";
}
?>