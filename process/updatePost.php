<?php include('../db/db.php') ?>
<?php
date_default_timezone_set('Asia/Yangon');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <style>
        .categ svg {
            width: 20px;
            fill: #0d6efd;
        }

        .categ:hover svg {
            transform: translateY(-5px) !important;
            animation-duration: 1s;
        }

        .write {
            position: fixed;
            top: 450px;
        }

        .huey svg {
            font-size: 40px;
        }

        .yell svg {
            fill: yellowgreen;
        }

        .res-menu {
            display: none;
        }

        @media only screen and (max-width: 1000px) {
            .res-menu {
                display: block;
            }

            .menu-none {
                display: none !important;
            }
        }

        @media only screen and (max-width: 768px) {
            .menu {
                display: none;
            }
        }
    </style>
</head>
<?php
function calculate_posted_time($post_time)
{
    $current_time = time();
    $post_time = trim($post_time);
    $post_timestamp = strtotime($post_time);
    $difference = $current_time - $post_timestamp;
    if ($difference < 60) {
        return 'just now';
    } elseif ($difference < 3600) {
        $minutes = floor($difference / 60);
        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($difference < 86400) {
        $hours = floor($difference / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($difference < 2592000) {
        $days = floor($difference / 86400);
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    } elseif ($difference < 31536000) {
        $months = floor($difference / 2592000);
        return $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
    } else {
        $years = floor($difference / 31536000);
        return $years . ' year' . ($years > 1 ? 's' : '') . ' ago';
    }
}
?>
<?php
// detect error 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['update_post'])) {
    if (isset($_GET['new_id'])) {
        $newid = $_GET['new_id'];
    }

    $categ = $_POST['categ'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    $title = $_POST['title'];
    $filename = basename($_FILES['img']['name']);
    $tempname = $_FILES['img']['tmp_name'];
    if (!$filename) {
        $filename = $_POST['imk'];
    }
    $folder = "../uploads/" . $filename;

    $query = "update `posts` set `date`='$date', `description`='$desc', `title`='$title', `categ`='$categ', `src`='$filename' where `id`='$newid'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        if (move_uploaded_file($tempname, $folder)) {
        }
        header("location:../pages/post.php");
    }

}
?>

<body style="background-color: rgb(24, 25, 26); overflow: hidden; padding-right: 0px;" class="modal-open">
    <div class="modal-backdrop fade show"></div>
    <!-- responsive navbar -->
    <div class="res-nav">
        <div class="offcanvas offcanvas-start" style="background-color:#18191a;" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header d-flex justify-content-between">
                <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Quantum<sub>Connect</sub></h5>
                <div type="button" data-bs-dismiss="offcanvas" aria-label="Close" style="color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                    </svg>
                </div>

            </div>
            <div class="offcanvas-body">
                <div class="d-flex gap-5 menu flex-column align-items-center">
                    <a href="../index.php" type="button" class="text-decoration-none text-white">Home</a>
                    <div>
                        <a href="#" type="button" class="text-decoration-none text-white active">Feed</a>
                    </div>
                    <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                    <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
                    <a href="./assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <?php
                    session_start();
                    if ($_SESSION['user_name'] == 'Admin') {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1">
                            Add Post
                        </button>
                        <?php
                    } else {
                        ?>
                        <img src="../asset/img/social-media.gif" alt="" class="rounded-circle img-fluid "
                            style="width: 50px; height: 50px;">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid p-0 mb-3">
        <div class="d-flex p-4 justify-content-between position-fixed w-100 top-0 input z-3 align-items-center"
            style="background-color : #242526;border-bottom: 1px solid rgb(85, 84, 84)">
            <h3 class="text-white">Quantum<sub style="font-size: 10px;">Connect</sub></h3>
            <div class="d-flex gap-5 menu menu-none">
                <a href="../index.php" type="button" class="text-decoration-none text-white">Home</a>
                <div>
                    <a href="#" type="button" class="text-decoration-none text-white active">Feed</a>
                </div>
                <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
                <a href="./assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
            </div>
            <div class="res-menu" style="cursor:pointer;pointer-events: auto;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <div class="bg-white" style="width:30px;height:2px;"></div>
                <div class="bg-white" style="width:30px;height:2px;margin: 7px 0;"></div>
                <div class="bg-white" style="width:30px;height:2px;"></div>
            </div>
            <?php
            if ($_SESSION['user_name'] == 'Admin') {
                ?>
                <button type="button" class="btn btn-primary menu-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal1">
                    Add Post
                </button>
                <?php
            } else {
                ?>
                <img src="../asset/img/social-media.gif" alt="" class="rounded-circle img-fluid menu-none"
                    style="width: 50px; height: 50px;">
                <?php
            }
            ?>
        </div>
    </div>
    <div class="container-lg all-data" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-3 pt-5 menu col-8">
                <div class="position-fixed d-flex flex-column ok">
                    <a href="../process/selectCategory.php?categ=All"
                        class="categ d-flex gap-2 text-decoration-none text-white fs-5 icon-link-hover my-3"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M209.4 39.5c-9.1-9.6-24.3-10-33.9-.9L33.8 173.2c-19.9 18.9-19.9 50.7 0 69.6L175.5 377.4c9.6 9.1 24.8 8.7 33.9-.9s8.7-24.8-.9-33.9L66.8 208 208.5 73.4c9.6-9.1 10-24.3 .9-33.9zM352 64c0-12.6-7.4-24.1-19-29.2s-25-3-34.4 5.4l-160 144c-6.7 6.1-10.6 14.7-10.6 23.8s3.9 17.7 10.6 23.8l160 144c9.4 8.5 22.9 10.6 34.4 5.4s19-16.6 19-29.2V288h32c53 0 96 43 96 96c0 30.4-12.8 47.9-22.2 56.7c-5.5 5.1-9.8 12-9.8 19.5c0 10.9 8.8 19.7 19.7 19.7c2.8 0 5.6-.6 8.1-1.9C494.5 467.9 576 417.3 576 304c0-97.2-78.8-176-176-176H352V64z" />
                        </svg><span>All</span></a>
                    <a href="../process/selectCategory.php?categ=Android"
                        class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" />
                        </svg><span>Electronic</span></a>
                    <a href="../process/selectCategory.php?categ=Web"
                        class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover my-3"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                        </svg><span>Clothes</span></a>
                    <a href="" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M0 96C0 43 43 0 96 0H384h32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32zM247.4 283.8c-3.7 3.7-6.2 4.2-7.4 4.2s-3.7-.5-7.4-4.2c-3.8-3.7-8-10-11.8-18.9c-6.2-14.5-10.8-34.3-12.2-56.9h63c-1.5 22.6-6 42.4-12.2 56.9c-3.8 8.9-8 15.2-11.8 18.9zm42.7-9.9c7.3-18.3 12-41.1 13.4-65.9h31.1c-4.7 27.9-21.4 51.7-44.5 65.9zm0-163.8c23.2 14.2 39.9 38 44.5 65.9H303.5c-1.4-24.7-6.1-47.5-13.4-65.9zM368 192a128 128 0 1 0 -256 0 128 128 0 1 0 256 0zM145.3 208h31.1c1.4 24.7 6.1 47.5 13.4 65.9c-23.2-14.2-39.9-38-44.5-65.9zm31.1-32H145.3c4.7-27.9 21.4-51.7 44.5-65.9c-7.3 18.3-12 41.1-13.4 65.9zm56.1-75.8c3.7-3.7 6.2-4.2 7.4-4.2s3.7 .5 7.4 4.2c3.8 3.7 8 10 11.8 18.9c6.2 14.5 10.8 34.3 12.2 56.9h-63c1.5-22.6 6-42.4 12.2-56.9c3.8-8.9 8-15.2 11.8-18.9z" />
                        </svg><span>Book</span></a>
                    <a href="" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover my-3"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                        </svg><span>Food</span></a>
                    <a href="" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M400 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm27.2 64l-61.8-48.8c-17.3-13.6-41.7-13.8-59.1-.3l-83.1 64.2c-30.7 23.8-28.5 70.8 4.3 91.6L288 305.1V416c0 17.7 14.3 32 32 32s32-14.3 32-32V288c0-10.7-5.3-20.7-14.2-26.6L295 232.9l60.3-48.5L396 217c5.7 4.5 12.7 7 20 7h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H427.2zM56 384a72 72 0 1 1 144 0A72 72 0 1 1 56 384zm200 0A128 128 0 1 0 0 384a128 128 0 1 0 256 0zm184 0a72 72 0 1 1 144 0 72 72 0 1 1 -144 0zm200 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                        </svg><span>Bike</span></a>
                </div>
            </div>
            <div class="col-lg-7 ok text-white d-flex flex-column gap-3 overflow-scroll col-sm-9 col-11 post px-0">
                <?php
                if (isset($_SESSION['categ'])) {
                    ?>
                    <h5 class="text-center mt-2">Categ - <?php echo $_SESSION['categ']; ?></h5>
                    <?php
                } else {
                    ?>
                    <h5 class="text-center mt-2">Categ - All</h5>
                    <?php
                }
                ?>
                <?php
                $query = "select * from `posts`";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <h5 class="text-center w-100 text-white pt-5 mt-5">No Post Yet!</h5>
                    <?php
                }
                if (!$result) {
                    echo "query failed";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $time = $row["date"];
                        $src = $row['src'];
                        $post_id = $row['id'];
                        ?>
                        <div class="rounded p-3 position-relative" style="background-color: #242526;">
                            <div class="d-flex justify-content-between mb-2 align-items-center">
                                <small class="time"><?php echo calculate_posted_time($time); ?></small>
                                <?php
                                if ($_SESSION['user_name'] === "Admin") {
                                    ?>
                                    <a class="cursor-pointer btn text-white" data-bs-toggle="tooltip" data-bs-placement="left"
                                        href="../process/updatePost.php?id=<?php echo $row['id']; ?>" data-bs-title="Edit Post">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#exampleModal10">
                                        <span class="text-black btn" data-bs-toggle="tooltip" data-bs-placement="right"
                                            style="position: absolute;top: 10px;right:20px" data-bs-title="Delete Review">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                                style="cursor: pointer;" class="bi bi-trash3 cursor-pointer" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </span>
                                    </span>
                                    <?php
                                }
                                ?>
                            </div style=''>
                            <h5 class="text-center my-3"><?php echo $row['title']; ?></h5>
                            <p class="desc mb-0"><?php echo $row['description']; ?>
                            </p>
                            <i class="more" style="cursor: pointer;"></i>
                            <img src="../uploads/<?php echo $src; ?>" class="w-100 mt-2" alt=""
                                style="height: 400px;object-fit:cover;" />
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "select * from `posts` where `id` = '$id'";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?>

    <form action="updatePost.php?new_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade show d-block" id="exampleModalToggle1" aria-modal="true"
            style="background-color: rgba(32, 31, 32, 0.2)" aria-labelledby="exampleModalToggleLabel2" tabindex="-1"
            role="dialog" bis_skin_checked="1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">ADD POST</h1>
                        <a href="../pages/post.php" class="btn-close"></a>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control mt-4" placeholder="Title" name="title"
                            value="<?php echo $row['title']; ?>">
                        <input type="text" class="form-control mt-4" placeholder="Category..." name="categ"
                            value="<?php echo $row['categ']; ?>">
                        <textarea class="form-control my-4" aria-label="With textarea" name="desc"
                            placeholder="Description..."><?php echo $row['description']; ?></textarea>
                        <input type="text" class="form-control mt-4" placeholder="Date..." name="date"
                            value="<?php echo $row['date']; ?>">
                        <input class="form-control my-3" type="file" name="img" accept=".jpg, .jpeg, .png">
                        <input type="text" hidden name="imk" value="<?php echo $row['src'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="update_post">
                            Done</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="../asset/bootstrap.bundle.min.js"></script>
<script src="../asset/popper.min.js"></script>

</html>