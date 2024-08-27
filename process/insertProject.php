<?php include('../db/db.php'); ?>
<?php
if (isset($_POST['upload'])) {
    session_start();
    $filename = basename($_FILES['image']['name']);
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "../uploads/" . $filename;
    $desc = $_POST['desc'];
    $htmlcode = $_POST['htmlcode'];
    $csscode = $_POST['csscode'];
    $jscode = $_POST['jscode'];

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "<h3>Failed to upload image. Error code: " . $_FILES['image']['error'] . "</h3>";
    } else {
        $query = "insert into `projects` (`description`,`htmlcode`,`csscode`,`jscode`,`src`) values ('$desc','$htmlcode','$csscode','$jscode', '$filename')";

        if (mysqli_query($connection, $query)) {
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3>Image uploaded successfully!</h3>";
            } else {
                echo "<h3>Failed to move uploaded file!</h3>";
            }
            header("location:../pages/projects.php");
            $_SESSION['minipj_msg'] = "success";
        } else {
            echo "<h3>Failed to insert filename into database!</h3>";
        }
    }
}
?>