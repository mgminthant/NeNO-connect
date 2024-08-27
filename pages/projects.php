<?php include('../db/db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="../asset/font.css">
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/imagehover.css">
    <style>
        .grid-cls {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(350px, auto));
        }

        .bg-cls {
            position: relative;
            border: 1px solid black;
            max-height: 450px;
            max-width: 500px;
            border-radius: 10px;
            overflow: hidden;
        }

        .bg-cls .header {
            position: absolute;
            background-color: rgb(36, 37, 38);
            bottom: 0;
            width: 100%;
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

<body class="" style="background-color:#18191a;">
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
                        <a href="" type="button" class="text-decoration-none text-white active">Mini Projects</a>
                    </div>
                    <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
                    <a href="./assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    session_start();
                    if ($_SESSION['user_name'] === 'Admin') {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Project
                        </button>
                        <?php
                    } else {
                        ?>
                        <img src="../asset/img/portfolio.gif" alt="" class="rounded-circle img-fluid"
                            style="width: 50px; height: 50px;">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-black text-white p-0 mb-3 position-sticky top-0 z-3">
        <div class="d-flex p-4 justify-content-between w-100 input align-items-center"
            style="border-bottom: 1px solid rgb(85, 84, 84);background-color : #242526;">
            <h3 class="text-white">Quantum<sub style="font-size: 10px;">Connect</sub></h3>
            <div class="d-flex gap-5 menu menu-none">
                <a href="../index.php" type="button" class="text-decoration-none text-white">Home</a>
                <a href="./post.php" type="button" class="text-decoration-none text-white">Feed</a>
                <div>
                    <a href="" type="button" class="text-decoration-none text-white active">Mini Projects</a>
                </div>
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
                <img src="../asset/img/portfolio.gif" alt="" class="rounded-circle img-fluid menu-none"
                    style="width: 50px; height: 50px;">
                <?php
            }
            ?>
        </div>
    </div>
    <form action="../process/insertProject.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project Here</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="4"
                            placeholder="Enter description..."></textarea>
                        <textarea placeholder="Html Code.." class="form-control mt-3" name="htmlcode"
                            id="exampleFormControlTextarea1" rows="3"></textarea>
                        <textarea class="form-control mt-3" name="csscode" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Css Code..."></textarea>
                        <textarea class="form-control mt-3" name="jscode" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Js Code..."></textarea>
                        <input class="form-control my-3" type="file" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="upload" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_SESSION['minipj_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Project Add Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['minipj_msg']);
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
    <div class="grid-cls container">
        <?php
        $query = "select * from `projects`";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 0) {
            ?>
            <h5 class="text-center w-100 text-white pt-5 mt-5">No Project Yet!</h5>
            <?php
        }
        if (!$result) {
            echo "query failed";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $src = $row['src'];
                $description = $row['description'];
                $project_id = $row['id'];
                ?>
                <form action="./editor.php?id=<?php echo $row['id']; ?>" method="post" target="_blank">
                    <div class="bg-cls">
                        <?php
                        if ($_SESSION['user_name'] === 'Admin') {
                            ?>
                            <div class="d-flex justify-content-between">
                                <a class="cursor-pointer btn text-white tras" data-bs-toggle="tooltip" data-bs-placement="left"
                                    href="../process/updateProject.php?id=<?php echo $row['id']; ?>" data-bs-title="Edit Post">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <span class="" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <svg style="position: absolute;top: 10px;right:20px;cursor:pointer;"
                                        data-bs-title="Delete Project" data-bs-toggle="tooltip" data-bs-placement="right"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                        style="cursor: pointer;" class="bi bi-trash3 cursor-pointer" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                        <figure class="imghvr-fold-left">
                            <img src="../uploads/<?php echo $src; ?>" alt="" style="min-height: 500px;object-fit:cover;">
                            <figcaption>
                                <?php echo $description; ?>
                            </figcaption>
                        </figure>
                        <div class="header d-flex justify-content-between align-items-center py-3 px-2">
                            <img src="../asset/img/min.jpg" class="img-fluid rounded-circle"
                                style="width :40px; height : 40px;" />
                            <button class="btn btn-primary" type="submit" name="edit">Code</button>
                        </div>
                    </div>
                </form>
                <?php
            }
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION['rew_msg'])) {
        ?>
        <div class="toast-container two position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    Project Delete Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['rew_msg']);
        echo "<script>
        const fail_succe = document.getElementsByClassName('two')[0];
        setTimeout(() => {
            fail_succe.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>

    <!-- delete project modal  -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to delete?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="../process/deletePost.php?pj_id=<?php echo $project_id; ?>"
                        class="btn text-decoration-none btn-primary rounded">Confirm</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../asset/bootstrap.bundle.min.js"></script>
<script src="../Js/poper.js"></script>

</html>