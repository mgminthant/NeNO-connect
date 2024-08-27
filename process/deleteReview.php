<?php include('../db/db.php') ?>
<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "delete from `reviews` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../index.php");
        $_SESSION['rew_msg'] = "ok";
    }
}

if (isset($_GET['dasid'])) {
    $id = $_GET['dasid'];
    $query = "delete from `reviews` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../pages/dashboard.php");
        $_SESSION['del_rew'] = "ok";
    }
}

?>