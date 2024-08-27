<?php include('../db/db.php') ?>
<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "delete from `posts` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../pages/post.php");
        $_SESSION['post_del_msg'] = "ok";
    }
}

if (isset($_GET['pj_id'])) {
    $id = $_GET['pj_id'];

    $query = "delete from `projects` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../pages/projects.php");
        $_SESSION['rew_msg'] = "ok";
    }
}

if (isset($_GET['id_mail'])) {
    $id = $_GET['id_mail'];

    $query = "delete from `subscribe_email` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../pages/dashboard.php");
        $_SESSION['mail_del_msg'] = "ok";
    }
}

if (isset($_GET['pre_id'])) {
    $id = $_GET['pre_id'];

    $query = "delete from `paid_projects` where `id`='$id'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        header("location:../pages/premium.php");
        $_SESSION['paid_msg'] = "ok";
    }
}

if (isset($_GET['user_name'])) {
    $uname = $_GET['user_name'];
    $query = "delete from `reviews` where `user_name`='$uname'";
    $result = mysqli_query(
        $connection,
        $query
    );

    if (!$result) {
        die("Query Failed");
    } else {
        // header("location:../pages/dashboard.php");
        $_SESSION['del_rew'] = "ok";
    }
}
?>