<?php
if (isset($_GET['categ'])) {
    session_start();
    $_SESSION['categ'] = $_GET['categ'];
    header("location:../pages/post.php");
}
?>