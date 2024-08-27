<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Projects</title>
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <script src="../asset/bootstrap.bundle.min.js"></script>
    <style>
        .active {
            animation: ani 1s infinite linear;
        }

        video {
            transition: all 0.3s ease;
        }

        video:hover {
            transform: scale(1.05);
        }

        @keyframes ani {
            0% {
                border: none;
            }

            100% {
                border-bottom: 2px solid #3653f8;

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
    </style>
</head>

<div class="" style="background-color:#18191a;min-height: 100vh;">
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
                    <a href="./post.php" type="button" class="text-decoration-none text-white">Feed</a>
                    <div>
                        <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                    </div>
                    <a href="" type="button" class="text-decoration-none text-white active">Paid Projects</a>
                    <a href="./assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    session_start();
                    if (
                        $_SESSION['user_name'] === 'Admin'
                    ) {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Project
                        </button>
                        <?php
                    } else {
                        ?>
                        <img src="../asset/img/premium.gif" alt="" class="rounded-circle img-fluid"
                            style="width: 50px; height: 50px;">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-black text-white p-0 mb-3 top-0 z-3">
        <div class="d-flex p-4 justify-content-between w-100 position-fixed w-100 top-0 input align-items-center"
            style="border-bottom: 1px solid rgb(85, 84, 84);background-color : #242526;">
            <h3 class="text-white">Quantum<sub style="font-size: 10px;">Connect</sub></h3>
            <div class="d-flex gap-5 menu menu-none">
                <a href="../index.php" type="button" class="text-decoration-none text-white">Home</a>
                <a href="./post.php" type="button" class="text-decoration-none text-white">Feed</a>
                <div>
                    <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                </div>
                <a href="" type="button" class="text-decoration-none text-white active">Paid Projects</a>
                <a href="./assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
            </div>
            <div class="res-menu" style="cursor:pointer;pointer-events: auto;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <div class="bg-white" style="width:30px;height:2px;"></div>
                <div class="bg-white" style="width:30px;height:2px;margin: 7px 0;"></div>
                <div class="bg-white" style="width:30px;height:2px;"></div>
            </div>
            <?php
            session_start();
            if ($_SESSION['user_name'] === 'Admin') {
                ?>
                <button type="button" class="btn btn-primary menu-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Project
                </button>
                <?php
            } else {
                ?>
                <img src="../asset/img/premium.gif" alt="" class="rounded-circle img-fluid menu-none"
                    style="width: 50px; height: 50px;">
                <?php
            }
            ?>
        </div>
    </div>
    <form action="../process/insertPaidProject.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project Here</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" class="form-control mt-4" placeholder="Price..." name="price">
                        <input type="text" class="form-control mt-4" placeholder="Purchase Code..." name="serect_code">
                        <textarea class="form-control mt-4" name="desc" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                        <input type="text" class="form-control mt-4" placeholder="Tech Stack..." name="tech_stack">
                        <input type="text" class="form-control mt-4" placeholder="Demo Link..." name="demo_link">
                        <input type="text" class="form-control mt-4" placeholder="Code Link..." name="code_link">
                        <input class="form-control my-3" type="file" name="vid">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="upload" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    if (isset($_SESSION['pj_add'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Project Add Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['pj_add']);
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

    <div class="container pt-5">
        <div class="row d-flex align-items-center mt-5 pt-5">
            <?php
            include('../db/db.php');
            $query = "select * from `paid_projects`";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) == 0) {
                ?>
                <h5 class="text-center w-100 text-white pt-5 mt-5">No Project Yet!</h5>
                <?php
            }
            $counter = 2;
            if (!$result) {
                echo "query failed";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pre_id = $row['id'];
                    if ($counter % 2 == 0) {
                        ?>
                        <div class="row mb-5">
                            <div class="d-flex justify-content-between">
                                <a class="cursor-pointer btn text-white tras" data-bs-toggle="tooltip" data-bs-placement="left"
                                    href="../process/updatePremium.php?id=<?php echo $row['id']; ?>" data-bs-title="Edit Post">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <span class="" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <svg style="cursor:pointer;" data-bs-title="Delete Project" data-bs-toggle="tooltip"
                                        data-bs-placement="right" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" style="cursor: pointer;" class="bi bi-trash3 cursor-pointer"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </span>
                            </div>
                            <span class="d-none serect"><?php echo $row['serect_code']; ?></span>
                            <div class="text-white col-lg-6 col-md-10 mx-auto">
                                <video width="100%" height="100%">
                                    <source src="../uploads/<?php echo $row['src'] ?>" type="video/mp4">
                                </video>
                            </div>
                            <div class="text-white col-lg-6 col-md-10 mx-auto mt-2">
                                <h5 class="my-3 text-center">Price-<?php echo $row['price']; ?>$</h5>
                                <div class="input-group mb-3 w-50 mx-auto">
                                    <input type="text" class="form-control src_code" placeholder="Enter secrect code"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary text-white button-addon2" type="button">Button</button>
                                </div>
                                <p class="mb-0 text-center"><?php echo $row['description']; ?></p>
                                <div class="d-flex gap-2 justify-content-center align-items-center my-3">
                                    <h5><?php echo $row['tech_stack']; ?></h5>
                                </div>
                                <div class="d-flex gap-3 justify-content-center align-items-center">
                                    <a class="d-flex gap-2 text-white text-decoration-none align-items-center"
                                        href="<?php echo $row['demo_link']; ?>">
                                        Demo Link
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                                        </svg>
                                    </a>
                                    |
                                    <a class="private text-white d-none text-decoration-none d-flex gap-2 align-items-center"
                                        href="<?php echo $row['code_link']; ?>">
                                        Source Code
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-github" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row d-flex align-items-center mb-5">
                            <?php
                            if ($_SESSION['user_name'] === 'Admin') {
                                ?>
                                <div class="d-flex justify-content-between">
                                    <a class="cursor-pointer btn text-white tras" data-bs-toggle="tooltip" data-bs-placement="left"
                                        href="../process/updatePremium.php?id=<?php echo $row['id']; ?>" data-bs-title="Edit Post">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <span class="" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        <svg style="cursor:pointer;" data-bs-title="Delete Project" data-bs-toggle="tooltip"
                                            data-bs-placement="right" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="white" style="cursor: pointer;" class="bi bi-trash3 cursor-pointer"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </span>
                                </div>
                                <?php
                            }
                            ?>
                            <span class="d-none serect"><?php echo $row['serect_code']; ?></span>
                            <div class="text-white col-lg-6 col-md-10 mx-auto">
                                <h5 class="my-3 text-center">Price-<?php echo $row['price']; ?>$</h5>
                                <div class="input-group mb-3 w-50 mx-auto">
                                    <input type="text" class="form-control src_code" placeholder="Enter secrect code"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary text-white button-addon2" type="button">Button</button>
                                </div>
                                <p class="mb-0 text-center"><?php echo $row['description']; ?></p>
                                <div class="d-flex gap-2 justify-content-center align-items-center my-3">
                                    <h5><?php echo $row['tech_stack']; ?></h5>
                                </div>
                                <div class="d-flex gap-3 justify-content-center align-items-center">
                                    <a class="d-flex gap-2 text-white text-decoration-none align-items-center"
                                        href="<?php echo $row['demo_link']; ?>">
                                        Demo Link
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                                        </svg>
                                    </a>
                                    |
                                    <a class="private text-white d-none text-decoration-none d-flex gap-2 align-items-center"
                                        href="<?php echo $row['code_link']; ?>">
                                        Source Code
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-github" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="text-white col-lg-6 col-md-10 mt-2 mx-auto">
                                <video width="100%" height="100%">
                                    <source src="../uploads/<?php echo $row['src'] ?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <?php
                    }
                    $counter++;
                }
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['paid_msg'])) {
            ?>
            <div class="toast-container two position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
                <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        Project Delete Successful!
                    </div>
                </div>
            </div>
            <?php
            unset($_SESSION['paid_msg']);
            echo "<script>
        const fail_succe = document.getElementsByClassName('two')[0];
        setTimeout(() => {
            fail_succe.style.display='none';
        }, 4000);
        </script>
        ";
        }
        ?>
        <!-- delete reviews modal  -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to delete?</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="../process/deletePost.php?pre_id=<?php echo $pre_id; ?>"
                            class="btn text-decoration-none btn-primary rounded">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
        </body>
        <script src="../asset/popper.min.js"></script>
        <script>
            const videos = document.querySelectorAll('video');
            const serect = document.querySelectorAll(".serect");
            const private = document.querySelectorAll(".private");

            const src_code = document.querySelectorAll(".src_code");
            const btn = document.querySelectorAll(".button-addon2");

            videos.forEach(function (video) {
                video.addEventListener('mouseover', function () {
                    video.muted = true;
                    video.play().catch(error => {
                        console.error("Error playing video: ", error);
                    });
                });

                video.addEventListener('mouseout', function () {
                    video.pause();
                });
            });

            for (let i = 0; i < btn.length; i++) {
                btn[i].addEventListener('click', () => {
                    let real_value = serect[i].innerText;
                    if (src_code[i].value == real_value) {
                        private[i].classList.remove('d-none');
                        src_code[i].value = "";
                    } else {

                    }
                })
            }
        </script>

</html>