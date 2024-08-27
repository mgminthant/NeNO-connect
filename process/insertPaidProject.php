<?php include('../db/db.php'); ?>

<?php
session_start();
if (isset($_POST['upload'])) {
    $filename = basename($_FILES['vid']['name']);
    $tempname = $_FILES['vid']['tmp_name'];
    $folder = "../uploads/" . $filename;
    $price = $_POST['price'];
    $serect_code = $_POST['serect_code'];
    $desc = $_POST['desc'];
    $tech_stack = $_POST['tech_stack'];
    $demo_link = $_POST['demo_link'];
    $code_link = $_POST['code_link'];

    if ($_FILES['vid']['error'] !== UPLOAD_ERR_OK) {
        echo "<h3>Failed to upload image. Error code: " . $_FILES['image']['error'] . "</h3>";
    } else {
        $query = "insert into `paid_projects` (`price`,`serect_code`,`description`,`tech_stack`,`demo_link`,`code_link`,`src`) values ('$price','$serect_code','$desc','$tech_stack', '$demo_link','$code_link','$filename')";

        if (mysqli_query($connection, $query)) {
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3>Image uploaded successfully!</h3>";
            } else {
                echo "<h3>Failed to move uploaded file!</h3>";
            }
            header("location:../pages/premium.php");
            $_SESSION['pj_add'] = "ok";
        } else {
            echo "<h3>Failed to insert filename into database!</h3>";
        }
    }
}
?>