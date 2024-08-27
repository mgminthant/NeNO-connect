<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../db/db.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        th {
            font-size: 20px;
        }

        td {
            padding: 10px 0;
            font-size: 18px;
        }

        .huey svg {
            font-size: 40px;
        }

        .yell svg {
            fill: yellowgreen;
        }

        .feedback-parent {
            display: flex;
            align-items: center;
            padding: 0px 40px;
            justify-content: space-between;
        }

        .slide {
            margin: 0 50px;
            padding: 30px;
            overflow: hidden;
            gap: 20px;
            display: flex;
        }

        .feedback-parent svg {
            font-size: 80px;
            cursor: pointer;
        }

        .feedback {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, auto));
            gap: 20px;
        }

        .feedback svg {
            font-size: 20px;
            cursor: default;
        }

        .single-feedback {
            cursor: default;
            position: relative;
            max-width: 450px;
            max-height: 500px;
            background-color: white;
            padding: 50px;
            border-radius: 30px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .single-feedback p {
            overflow: scroll;
            max-height: 300px;
            font-size: 18px;
            min-height: 250px;
        }

        .feedback div img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .acc {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            justify-content: center;
            align-items: center;
        }

        .slide-left {
            animation-play-state: paused;
            animation: scroll 5s linear;
        }

        .single-feedback h5 {
            font-size: 15px;
        }

        .scroll-watcher {
            width: 100%;
            height: 5px;
            background-color: white;
            position: fixed;
            top: 0;
            z-index: 100;
            transform-origin: left;
            animation: scroll-watcher linear;
            animation-timeline: scroll();
            scale: 0 1;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }


        @keyframes scroll-watcher {
            to {
                scale: 1 1;
            }
        }

        @keyframes top-bottom {
            from {
                transform: ;
            }
        }

        @media (max-width: 900px) {
            .slide {
                margin: 0 15px;
            }

            .feedback-parent {
                padding: 0 15px;
            }

            .feedback-parent svg {
                font-size: 150px;
            }

            .feedback svg {
                font-size: 20px;
            }
        }

        @media (max-width :600px) {
            .single-feedback {
                padding: 15px;
                border-radius: 15px;
            }

            .up {
                transform: translateY(0px);
                margin: 20px 0;
            }
        }

        @media (max-width:576px) {
            .connect div div {
                border: 1px solid blue !important;
            }

            .connect div div.mid {
                margin: 10px 0;
            }

            table th,
            td {
                text-align: center;
                word-wrap: break-word;
            }

            .mc {
                padding: 0 !important;
            }
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

        td span svg:hover {
            fill: red;
        }

        @media only screen and (max-width: 650px) {

            table th,
            td {
                font-size: 12px;
            }
        }
    </style>
</head>

<body class="bg-dark">
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
                        <a href="./post.php" type="button" class="text-decoration-none text-white active">Feed</a>
                    </div>
                    <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                    <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
                    <a href="" type="button" class="text-decoration-none text-white">Assistant</a>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <?php
                    if ($_SESSION['user_name']) {
                        ?>
                        <div class="dropdown" style="cursor: pointer; pointer-events: auto;">
                            <img src="../uploads/<?php echo $_SESSION['src']; ?>" style="width: 50px; height: 50px;"
                                class=" border border-info rounded-circle dropdown-toggle" data-bs-toggle="dropdown"
                                type="button">
                            <ul class="dropdown-menu">
                                <li>
                                    <h6 class="dropdown-item" href="#"><b><?php echo $_SESSION['user_name']; ?></b></h6>
                                </li>
                                <li><a class="dropdown-item" href="">Dashboard</a></li>
                                <li>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
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
                    <a href="./post.php" type="button" class="text-decoration-none text-white active">Feed</a>
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
            if ($_SESSION['user_name']) {
                ?>
                <div class="dropdown menu-none" style="cursor: pointer; pointer-events: auto;">
                    <img src="../uploads/<?php echo $_SESSION['src']; ?>" style="width: 50px; height: 50px;"
                        class=" border border-info rounded-circle dropdown-toggle" data-bs-toggle="dropdown" type="button">
                    <ul class="dropdown-menu">
                        <li>
                            <h6 class="dropdown-item" href="#"><b><?php echo $_SESSION['user_name']; ?></b></h6>
                        </li>
                        <li><a class="dropdown-item" href="">Dashboard</a></li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Logout
                            </button>
                        </li>
                    </ul>
                </div>
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

    <?php
    if ($_SESSION['user_name'] == "Admin") {
        ?>
        <div class="container-lg pt-5">
            <div class="d-flex gap-2 text-white align-items-center my-5 pt-3">
                <div class="bg-primary p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-speedometer" viewBox="0 0 16 16">
                        <path
                            d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd"
                            d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                    </svg>
                </div>
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-11 mx-auto px-0 ok1 text-center">
                    <div class="py-5 rounded bg-light" style="width: 97%;height:97%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-signpost" viewBox="0 0 16 16">
                            <path
                                d="M7 1.414V4H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h5v6h2v-6h3.532a1 1 0 0 0 .768-.36l1.933-2.32a.5.5 0 0 0 0-.64L13.3 4.36a1 1 0 0 0-.768-.36H9V1.414a1 1 0 0 0-2 0M12.532 5l1.666 2-1.666 2H2V5z" />
                        </svg>
                        <p class="my-2">Total Posts</p>
                        <?php
                        $check_query = "SELECT * FROM `posts`";
                        $check_result = mysqli_query($connection, $check_query);

                        if ($check_result) {
                            $total_posts = mysqli_num_rows($check_result);
                            echo "<h3>$total_posts</h3>";
                        } else {
                            echo "<h3>Query failed</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-11 mx-auto px-0 text-center text-white">
                    <div class="py-5 rounded bg-secondary" style="width: 97%;height:97%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-fullscreen-exit" viewBox="0 0 16 16">
                            <path
                                d="M5.5 0a.5.5 0 0 1 .5.5v4A1.5 1.5 0 0 1 4.5 6h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5m5 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 10 4.5v-4a.5.5 0 0 1 .5-.5M0 10.5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 6 11.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5m10 1a1.5 1.5 0 0 1 1.5-1.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0z" />
                        </svg>
                        <p class="my-2">Mini Projects</p>
                        <?php
                        $check_query = "SELECT * FROM `projects`";
                        $check_result = mysqli_query($connection, $check_query);

                        if ($check_result) {
                            $total_posts = mysqli_num_rows($check_result);
                            echo "<h3>$total_posts</h3>";
                        } else {
                            echo "<h3>Query failed</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-11 mx-auto px-0 ok1 text-center">
                    <div class="py-5 rounded bg-light" style="width: 97%;height:97%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-easel" viewBox="0 0 16 16">
                            <path
                                d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0M2 3v7h12V3z" />
                        </svg>
                        <p class="my-2">Paid Projects</p>
                        <?php
                        $check_query = "SELECT * FROM `paid_projects`";
                        $check_result = mysqli_query($connection, $check_query);

                        if ($check_result) {
                            $total_posts = mysqli_num_rows($check_result);
                            echo "<h3>$total_posts</h3>";
                        } else {
                            echo "<h3>Query failed</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-11 mx-auto px-0 ok1 text-center text-white">
                    <div class="py-5 rounded bg-secondary" style="width: 97%;height:97%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>
                        <p class="my-2">Users</p>
                        <?php
                        $check_query = "SELECT * FROM `participants`";
                        $check_result = mysqli_query($connection, $check_query);
                        if ($check_result) {
                            $total_posts = mysqli_num_rows($check_result) - 1;
                            echo "<h3>$total_posts</h3>";
                        } else {
                            echo "<h3>Query failed</h3>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center text-white my-5 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0c6dfd"
                    class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                    <path
                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z" />
                    <path
                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686" />
                </svg>
                <h5 class="mb-0">Subscribed Email</h5>
            </div>
        </div>
        <div class="container-lg mc">
            <table class="text-white w-100">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Subscribe Date</th>
                    <th>Delete Email</th>
                </tr>
                <?php
                $query = "SELECT * FROM `subscribe_email`";
                $id_lay = 1;
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <h5 style="transform: translateY(100px)" ; class="text-center w-100 text-white pt-5 mt-5">No Mail Subscribe
                        Yet!</h5>
                    <?php
                }
                if ($check_result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $mail_id = $row['id'];
                        ?>
                        <tr>
                            <td><?php echo $id_lay ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td> <span class="text-black btn" data-bs-toggle="modal" data-bs-target="#exampleModal10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                        class="bi bi-calendar2-x" viewBox="0 0 16 16">
                                        <path
                                            d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                        <path
                                            d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </span></td>
                        </tr>
                        <?php

                        $id_lay++;
                    }
                } else {
                    echo "<h3>Query failed</h3>";
                }
                ?>
            </table>
        </div>
        <?php
    } else if (!$_SESSION['user_name']) {
        ?>
            <div class="text-center text-white">
                <h1>You aren't not Admin? You Can access This page
                </h1>
                <a href="../index.php">Home Page</a>
            </div>
        <?php
    }

    if ($_SESSION['user_name'] !== 'Admin') {
        ?>
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="d-flex justify-content-between pt-5">
                    <h5 class="text-white">
                        <?php
                        echo $_SESSION['user_name'];
                        ?>
                    </h5>
                    <div class="write" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"><button
                            class="btn btn-primary">
                            <i>Write Review</i>
                        </button></div>
                </div>
            </div>
            <div class="feedback mt-5">
                <?php
                $uname = $_SESSION['user_name'];
                $query = "select * from `reviews` where `user_name` = '$uname'";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <div class="mt-5 pt-5">
                        <h5 class="text-white text-center mt-5 pt-5">No Reviews Yet!</h5>
                    </div>
                    <?php
                }
                if (!$result) {
                    die("query failed" . mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $reviewId = $row['id'];
                        ?>
                        <div class="single-feedback">
                            <?php
                            if ($_SESSION['user_name'] !== "Admin") {
                                ?>
                                <span class="" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <span class="text-black btn" data-bs-toggle="tooltip" data-bs-placement="right"
                                        style="position: absolute;top: 5px;right:20px" data-bs-title="Delete Reviews">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                            style="cursor: pointer;" class="bi bi-trash3 cursor-pointer" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </span>
                                </span>
                                <?php
                            }
                            ?>
                            <h5 class="fs-5">"<?php echo $row['title']; ?>"</h5>
                            <p> <?php echo $row['description']; ?></p>
                            <div class="acc">
                                <img src="../uploads/<?php echo $row['src'] ?>" alt="" />
                                <div class="">
                                    <h5 class="pb-1 text-center"><?php echo $row['user_name'] ?></h5>
                                    <div class="rate">
                                        <?php
                                        if ($row['rating'] == 0) {
                                            ?>
                                            <div class="d-flex gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg>
                                            </div> <?php
                                        } else if ($row['rating'] == 1) {
                                            ?>
                                                <div class="d-flex gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                        class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                        class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                        class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                        class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                        class="bi bi-star" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                    </svg>
                                                </div> <?php
                                        } else if ($row['rating'] == 2) {
                                            ?>
                                                    <div class="d-flex gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                            class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                            class="bi bi-star" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                            class="bi bi-star" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                            class="bi bi-star" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                        </svg>
                                                    </div> <?php
                                        } else if ($row['rating'] == 3) {
                                            ?>
                                                        <div class="d-flex gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                class="bi bi-star" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                class="bi bi-star" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                            </svg>
                                                        </div> <?php
                                        } else if ($row['rating'] == 4) {
                                            ?>
                                                            <div class="d-flex gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                                </svg>
                                                            </div> <?php
                                        } else {
                                            ?>
                                                            <div class="d-flex gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F4D03F"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                            </div> <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- delete email modal  -->
    <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to delete?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="../process/deletePost.php?id_mail=<?php echo $mail_id; ?>"
                        class="btn text-decoration-none btn-danger rounded">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- write reviews modal  -->
    <form action="../process/insertReview.php" method="post">
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
            tabindex="-1">
            <div class="modal-dialog modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Choose Star</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="star-container d-flex justify-content-center gap-2">
                            <input type="checkbox" name="drone1" class='radio_input' value="1" style="opacity: 0;" />
                            <label for="huey" class="huey cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </label>
                            <input type="checkbox" name="drone2" class='radio_input' value="1" style="opacity: 0;" />
                            <label for="huey" class="huey cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </label> <input type="checkbox" class='radio_input' name="drone3" value="1"
                                style="opacity: 0;" />
                            <label for="huey" class="huey cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </label> <input type="checkbox" class='radio_input' name="drone4" value="1"
                                style="opacity: 0;" />
                            <label for="huey" class="huey cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </label>
                            <input type="checkbox" name="drone5" class='radio_input' value="1" style="opacity: 0;" />
                            <label for="huey" class="huey cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </label>
                        </div>
                        <input type="text" class="form-control mt-4" placeholder="Review Title..." name="title">
                        <textarea class="form-control my-4" aria-label="With textarea" name="desc"
                            placeholder="Review Description..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="insert_review">
                            Done</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_SESSION['mail_del_msg'])) {
        ?>
        <div class="toast-container two position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    E-mail Delete Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['mail_del_msg']);
        echo "<script>
        const fail_succe = document.getElementsByClassName('two')[0];
        setTimeout(() => {
            fail_succe.style.display='none';
        }, 4000);
        </script>
        ";
    }
    if (isset($_SESSION['del_rew'])) {
        ?>
        <div class="toast-container two position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Review Delete Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['del_rew']);
        echo "<script>
        const fail_succe = document.getElementsByClassName('two')[0];
        setTimeout(() => {
            fail_succe.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>
    <!-- delete review modal  -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to delete?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="../process/deleteReview.php?dasid=<?php echo $reviewId ?>"
                        class="btn text-decoration-none btn-primary rounded">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <!--logout modal  -->
    <form action="../process/login.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to logut?</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <button class="btn btn-primary rounded" type="submit" name="login">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script>
    const star = document.querySelectorAll('.huey');
    const desc = document.querySelectorAll('.desc');
    const more = document.querySelectorAll('.more');


    const radio_input = document.querySelectorAll('.radio_input');
    for (let i = 0; i < star.length; i++) {
        star[i].addEventListener('click', () => {
            star[i].classList.toggle('yell');
            if (star[i].classList.contains('yell')) {
                radio_input[i].checked = true;
            } else {
                radio_input[i].checked = false;
            }
        })
    }
</script>
<script src="../asset/bootstrap.bundle.min.js"></script>

</html>