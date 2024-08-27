<?php include('../db/db.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php
date_default_timezone_set('Asia/Yangon');
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <script src="../asset/bootstrap.bundle.min.js"></script>
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        .desc {
            max-height: 290px;
            overflow: hidden;
        }

        .categ svg {
            width: 20px;
            fill: #0d6efd;
        }

        .categ:hover svg {
            transform: translateY(-5px) !important;
            animation-duration: 1s;
        }

        .menu button svg {
            display: none;
        }

        @media (max-width:576px) {

            .menu,
            .post,
            {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .all-data {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .menu span,
        .menu button i {
            display: none;
        }

        .menu button svg {
            display: block;
        }

        .input {
            padding: 10px !important;
            align-items: center;
        }

        .input .input-group {
            width: 200px !important;
        }

        .input h5 {
            font-size: 15px !important;
        }
        }

        .menu a {
            pointer-events: auto !important;
            cursor: pointer;
        }

        .active {
            animation: ani 1s infinite linear;
        }

        @keyframes ani {
            0% {
                border: none;
            }

            100% {
                border-bottom: 2px solid #3653f8;

            }
        }

        .more:hover {
            text-decoration: underline;
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

            .ok {
                margin: 0 auto;
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

<body style="background-color:#18191a;">
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
                    <a href="../process/selectCategory.php?categ=Web"
                        class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z" />
                        </svg><span>Web</span></a>
                    <a href="../process/selectCategory.php?categ=Android"
                        class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover my-3"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M420.6 301.9a24 24 0 1 1 24-24 24 24 0 0 1 -24 24m-265.1 0a24 24 0 1 1 24-24 24 24 0 0 1 -24 24m273.7-144.5 47.9-83a10 10 0 1 0 -17.3-10h0l-48.5 84.1a301.3 301.3 0 0 0 -246.6 0L116.2 64.5a10 10 0 1 0 -17.3 10h0l47.9 83C64.5 202.2 8.2 285.6 0 384H576c-8.2-98.5-64.5-181.8-146.9-226.6" />
                        </svg><span>Android</span></a>
                    <a href="../process/selectCategory.php?categ=Desktop" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l176 0-10.7 32L160 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l256 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-69.3 0L336 416l176 0c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0zM512 64l0 224L64 288 64 64l448 0z" />
                        </svg><span>Desktop</span></a>
                    <a href="../process/selectCategory.php?categ=AI" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover my-3"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M320 0c17.7 0 32 14.3 32 32l0 64 120 0c39.8 0 72 32.2 72 72l0 272c0 39.8-32.2 72-72 72l-304 0c-39.8 0-72-32.2-72-72l0-272c0-39.8 32.2-72 72-72l120 0 0-64c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224l16 0 0 192-16 0c-26.5 0-48-21.5-48-48l0-96c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-16 0 0-192 16 0z" />
                        </svg><span>AI</span></a>
                    <a href="../process/selectCategory.php?categ=ML" class="categ gap-2 text-decoration-none d-flex text-white fs-5 icon-link-hover"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M392.8 1.2c-17-4.9-34.7 5-39.6 22l-128 448c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l128-448c4.9-17-5-34.7-22-39.6zm80.6 120.1c-12.5 12.5-12.5 32.8 0 45.3L562.7 256l-89.4 89.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-112-112c-12.5-12.5-32.8-12.5-45.3 0zm-306.7 0c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l112 112c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256l89.4-89.4c12.5-12.5 12.5-32.8 0-45.3z" />
                        </svg><span>ML</span></a>
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
                if ($_SESSION['categ'] == 'All') {
                    $categ = $_SESSION['categ'];
                    $query = "select * from `posts`";
                } else if ($_SESSION['categ']) {
                    $categ = $_SESSION['categ'];
                    $query = "select * from `posts` where `categ`= '$categ'";
                } else {
                    $query = "select * from `posts`";
                }
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
    <!-- add post modal  -->
    <form action="../process/insertPost.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal1" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">ADD POST</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control mt-4" placeholder="Title..." name="title">
                        <div class="mt-4 d-flex gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked value="All">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    All </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Web"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Web
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Android"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Android </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Desktop"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Desktop </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="Game"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Game </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="AI"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    AI </label>
                            </div>
                        </div>
                        <textarea class="form-control my-4" aria-label="With textarea" name="desc" rows="5"
                            placeholder="Post Description..."></textarea>
                        <input class="form-control my-3" type="file" name="img" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="insert_post">
                            Done</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- delete post modal  -->
    <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to delete?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="../process/deletePost.php?id=<?php echo $post_id; ?>"
                        class="btn text-decoration-none btn-primary rounded">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['post_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Post Add Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['post_msg']);
        echo "<script>
        const bd_element = document.documentElement;
        bd_element.scrollTo({
          top: bd_element.scrollHeight,
          behavior: 'smooth',
        });
        const fail_success = document.getElementsByClassName('toast-container')[0];
        setTimeout(() => {
            fail_success.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>

    <?php
    if (isset($_SESSION['post_del_msg'])) {
        ?>
        <div class="toast-container two position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Post Delete Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['post_del_msg']);
        echo "<script>
        const fail_succe = document.getElementsByClassName('two')[0];
        setTimeout(() => {
            fail_succe.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>
    <script>
        //for post desc
        const desc = document.querySelectorAll(".desc")
        const more = document.querySelectorAll(".more")

        for (let i = 0; i < more.length; i++) {
            if (desc[i].innerText.length > 1055) {
                more[i].innerText = 'see more...';
            }
            more[i].addEventListener('click', () => {
                if (more[i].innerText === "see more...") {
                    desc[i].classList.remove('desc');
                    more[i].innerText = "see less..."
                } else {
                    desc[i].classList.add('desc');
                    more[i].innerText = "see more..."
                }

            })
        }
    </script>
    <script src="../Js/poper.js"></script>
</body>

</html>