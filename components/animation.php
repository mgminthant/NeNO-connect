<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
    }

    canvas {
        display: block;
        vertical-align: bottom;
    }

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: black;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
    }

    .count-particles {
        background: #fff;
        position: absolute;
        top: 48px;
        left: 0;
        width: 80px;
        color: #13e8e9;
        font-size: 0.8em;
        text-align: left;
        text-indent: 4px;
        line-height: 14px;
        padding-bottom: 2px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    .js-count-particles {
        font-size: 1.1em;
    }

    #stats,
    .count-particles {
        -webkit-user-select: none;
        margin-top: 5px;
        margin-left: 5px;
    }

    #stats {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .count-particles {
        border-radius: 0 0 3px 3px;
    }

    .ani-div {
        pointer-events: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 3;
    }

    .btn {
        pointer-events: auto;
    }

    .under {
        padding-top: 100vh;
    }

    .outer {
        width: 140px;
        height: 2px;
        margin: 0 auto;
        background-color: #78be20;
    }

    h4 {
        margin-bottom: 0 !important;
    }

    .animation * {
        box-sizing: border-box;
    }

    .animation-text {
        font-size: 24px;
        font-family: arial;
        color: #bcbbbb;
        text-align: center;
        margin-bottom: 250px;
    }

    .animation {
        position: relative;
        box-sizing: border-box;
        height: 200px;
        width: 70%;
        margin: 0 auto;
    }

    .user::before {
        content: '';
        display: block;
        position: absolute;
        top: 10px;
        left: 14px;
        height: 10px;
        width: 10px;
        background-color: #fff;
        border-radius: 666px;
    }

    .user::after {
        content: '';
        display: block;
        position: absolute;
        top: 21px;
        left: 10px;
        height: 8px;
        width: 18px;
        background-color: #ffffff;
        border-radius: 6px 6px 0 0;
    }

    .user {
        width: 38px;
        height: 38px;
        position: absolute;
        z-index: 2;
        background-color: #cccccc;
        border-radius: 300px;
        /*animation parameters*/
        animation: user-animation ease-in 1s;
        animation-iteration-count: 1;
        transform-origin: 50% 50%;
        animation-fill-mode: forwards;
        animation-delay: 3s;
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

    @keyframes user-animation {
        0% {
            background-color: #cccccc;
        }

        100% {
            background-color: #78be20;
        }
    }

    .user1 {
        top: 61%;
        left: 43%;
        background-color: #78be20;
        animation: none;
    }

    .user2 {
        top: 71%;
        left: 16%;
    }

    .user3 {
        top: 79%;
        left: 70%;
    }

    .user4 {
        top: 1%;
        left: 17%;
    }

    .user5 {
        top: 0%;
        left: 74%;
    }

    .user6 {
        top: 36%;
        left: 0%;
    }

    .user7 {
        top: 16%;
        left: 39%;
    }

    .user8 {
        top: 37%;
        right: 0;
    }

    .user6,
    .user7,
    .user8 {
        animation-delay: 6s;
    }

    /* LINES */
    .line {
        position: absolute;
        height: 2px;
        width: 50%;
        background-color: #cccccc;
        transform-origin: 50% 50%;
        transform: rotate(0deg);
        z-index: 1;
    }

    .line::before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        height: 100%;
        width: 0%;
        background-color: #78be20;
        /*animation parameters*/
        animation: line-animation ease-in-out 1s;
        animation-iteration-count: 1;
        transform-origin: 50% 50%;
        animation-fill-mode: forwards;
        animation-delay: 5s;
    }

    @keyframes line-animation {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    .line1::before,
    .line2::before,
    .line3::before,
    .line4::before {
        animation-delay: 2s;
    }

    .line1 {
        top: 76%;
        left: 21%;
        width: 30%;
        transform: rotate(-13deg);
    }

    .line2 {
        top: 80%;
        left: 48%;
        width: 30%;
        transform: rotate(-156deg);
    }

    .line3 {
        top: 42%;
        left: 13%;
        width: 47%;
        transform: rotate(56deg);
    }

    .line4 {
        top: 41%;
        left: 43%;
        width: 48%;
        transform: rotate(129deg);
    }

    .line5 {
        top: 59%;
        left: 5%;
        width: 47%;
        transform: rotate(23deg);
    }

    .line6 {
        top: 59%;
        left: 47%;
        width: 47%;
        transform: rotate(158deg);
    }

    .line7 {
        top: 64%;
        left: -2%;
        width: 30%;
        transform: rotate(55deg);
    }

    .line8 {
        top: 47%;
        left: 0%;
        width: 46%;
        transform: rotate(95deg);
    }

    .line9 {
        top: 53%;
        left: 11%;
        width: 46%;
        transform: rotate(125deg);
    }

    .line10 {
        top: 19%;
        left: 44%;
        width: 38%;
        transform: rotate(165deg);
    }

    .line11 {
        top: 59%;
        left: 39%;
        width: 47%;
        transform: rotate(53deg);
    }

    .line12 {
        top: 20%;
        left: 22%;
        width: 24%;
        transform: rotate(-151deg);
    }

    .line13 {
        top: 50%;
        left: 54%;
        width: 50%;
        transform: rotate(94deg);
    }

    .line14 {
        top: 68%;
        left: 70%;
        width: 32%;
        transform: rotate(124deg);
    }

    sub {
        font-size: 10px;
    }

    button {
        color: white;
        border-radius: 2rem;
        cursor: pointer;
        width: 95.02px;
        height: 42.66px;
        border: none;
        background-color: #3653f8;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button .span-mother {
        display: flex;
        overflow: hidden;
    }

    button:hover .span-mother {
        position: absolute;
    }

    button:hover .span-mother span {
        transform: translateY(1.2em);
    }

    button .span-mother span:nth-child(1) {
        transition: 0.2s;
    }

    button .span-mother span:nth-child(2) {
        transition: 0.3s;
    }

    button .span-mother span:nth-child(3) {
        transition: 0.4s;
    }

    button .span-mother span:nth-child(4) {
        transition: 0.5s;
    }

    button .span-mother span:nth-child(5) {
        transition: 0.6s;
    }

    button .span-mother span:nth-child(6) {
        transition: 0.7s;
    }

    button .span-mother2 {
        display: flex;
        position: absolute;
        overflow: hidden;
    }

    button .span-mother2 span {
        transform: translateY(-1.2em);
    }

    button:hover .span-mother2 span {
        transform: translateY(0);
    }

    button .span-mother2 span {
        transition: 0.2s;
    }

    button .span-mother2 span:nth-child(2) {
        transition: 0.3s;
    }

    button .span-mother2 span:nth-child(3) {
        transition: 0.4s;
    }

    button .span-mother2 span:nth-child(4) {
        transition: 0.5s;
    }

    button .span-mother2 span:nth-child(5) {
        transition: 0.6s;
    }

    button .span-mother2 span:nth-child(6) {
        transition: 0.7s;
    }

    .menu a {
        pointer-events: auto !important;
        cursor: pointer;
    }

    .eye {
        opacity: 0.8;
        pointer-events: auto;
        cursor: pointer;
    }

    .not-click {
        opacity: 0.5;
        pointer-events: none;
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

<body>
    <div class="ani-div text-white">
        <div class="container-fluid p-4 d-flex py-4 justify-content-between">
            <h3 class="text-white">Quantum<sub>Connect</sub></h3>
            <div class="d-flex gap-5 menu align-items-center menu-none">
                <div class="">
                    <a href="#" type="button" class="text-decoration-none text-white active">Home</a>
                </div>
                <a href="./pages/post.php" type="button" class="text-decoration-none text-white">Feed</a>
                <a href="./pages/projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
                <a href="./pages/premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
                <a href="./pages/assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
            </div>
            <?php
            if (isset($_SESSION['user_name'])) {
                ?>
                <div class="dropdown menu-none" style="cursor: pointer; pointer-events: auto;">
                    <img src="./uploads/<?php echo $_SESSION['src']; ?>" style="width: 50px; height: 50px;"
                        class=" border border-info rounded-circle dropdown-toggle" data-bs-toggle="dropdown" type="button">
                    <ul class="dropdown-menu">
                        <li>
                            <h6 class="dropdown-item" href="#"><b><?php echo $_SESSION['user_name']; ?></b></h6>
                        </li>
                        <li><a class="dropdown-item" href="./pages/dashboard.php">Dashboard</a></li>
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
                <button type="button" class="btn btn-primary rounded-pill menu-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Login
                </button>
                <?php
            }
            ?>
            <div class="res-menu" style="cursor:pointer;pointer-events: auto;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <div class="bg-white" style="width:30px;height:2px;"></div>
                <div class="bg-white  my-1" style="width:30px;height:2px;"></div>
                <div class="bg-white" style="width:30px;height:2px;"></div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center ani-div">
            <div class="container d-flex flex-column align-items-center text-center gap-3 main-title">
                <h1>Lucky Bro💀 You Found This Site!</h1>
                <small>
                    We can reduce the gap between normal developer and more productive developer🚀
                </small>
                <a class="btn text-decoration-none ex" href="./pages/post.php">
                    <button>
                        <span class="span-mother">
                            <span>E</span>
                            <span>x</span>
                            <span>p</span>
                            <span>l</span>
                            <span>o</span>
                            <span>r</span>
                            <span>e</span>
                        </span>
                        <span class="span-mother2">
                            <span>C</span>
                            <span>l</span>
                            <span>i</span>
                            <span>c</span>
                            <span>k</span>
                            <span>m</span>
                            <span>e</span>
                        </span>
                    </button>
                </a>
            </div>
        </div>
    </div>
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
                <div class="d-flex gap-5 menu align-items-center flex-column text-white">
                    <div class="">
                        <a href="#" type="button" class="text-decoration-none text-white active">Home</a>
                    </div>
                    <a href="./pages/post.php" type="button" class="text-decoration-none text-white">Feed</a>
                    <a href="./pages/projects.php" type="button" class="text-decoration-none text-white">Mini
                        Projects</a>
                    <a href="./pages/premium.php" type="button" class="text-decoration-none text-white">Paid
                        Projects</a>
                    <a href="./pages/assistant.php" type="button" class="text-decoration-none text-white">Assistant</a>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        ?>
                        <div class="dropdown" style="cursor: pointer; pointer-events: auto;">
                            <img src="./uploads/<?php echo $_SESSION['src']; ?>" style="width: 50px; height: 50px;"
                                class="rounded-circle dropdown-toggle border border-info" data-bs-toggle="dropdown"
                                type="button">
                            <ul class="dropdown-menu">
                                <li>
                                    <h6 class="dropdown-item" href="#"><b>Min Thant</b></h6>
                                </li>
                                <li><a class="dropdown-item" href="./pages/dashboard.php">Dashboard</a></li>
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
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Login
                        </button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- login modal -->
    <form action="./process/login.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <?php
                if (isset($_SESSION['user_name'])) {
                    ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLabel">Are you Sure! You want to logut?</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <button class="bt btn-primary rounded" type="submit" name="login">Confirm</button>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 log-title" id="exampleModalLabel">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body contain">
                            <div class="d-flex justify-content-center">
                                <img src="./asset/img/1st.png" alt="" id="img" style="width:200px;">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="mail" name="user_name">
                            </div>
                            <div class="mb-3 sere">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control pw" name="password">
                                    <i class="position-absolute eye fa-solid fa-eye-slash"
                                        style="right:10px;top: 50%;transform:translateY(-50%);"></i>
                                </div>
                            </div>
                            <span class="fot">Forgot password? <b id="forgotpw"
                                    class="text-decoration-underline text-primary" style="cursor:pointer;">Click</b></span>
                            <div class="mb-3 d-none sere">
                                <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control pw" name="password2">
                                    <i class="position-absolute eye fa-solid fa-eye-slash"
                                        style="right:10px;top: 50%;transform:translateY(-50%);"></i>
                                </div>
                            </div>
                            <div class="mb-3 d-none sere" id="enterse">
                                <label for="exampleFormControlTextarea1" class="form-label">Enter Serect Code</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control pw" name="serect_code">
                                    <i class="position-absolute eye fa-solid fa-eye-slash"
                                        style="right:10px;top: 50%;transform:translateY(-50%);"></i>
                                </div>
                            </div>
                            <div class="mb-3 d-none sere">
                                <small class="mt-1">Choose Profile Photo</small>
                                <input type="file" name="img" class="form-control" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                        <div class="mx-auto mb-4">
                            <button type="submit" class="btn btn-primary login-singup" name="login"
                                id="submitBtn">Login</button>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <p class="text-center singup-acc">If you haven't account?</p><span
                                class="text-decoration-underline text-primary singup" style="cursor:pointer;">Signup</span>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </form>
    <?php
    if (isset($_SESSION['fail_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Login Fail!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Invalid username or password!
                    <span type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="text-decoration-underline" data-bs-dismiss="toast" aria-label="Close">
                        Try Again
                    </span>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['fail_msg']);
        echo "<script>
        const fail_success = document.getElementsByClassName('toast-container')[0];
        setTimeout(() => {
            fail_success.style.display='none';
        }, 4000);
        </script>
        ";
    }
    if (isset($_SESSION['exist_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Signup Fail!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    UserName Already exist!
                    <span type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="text-decoration-underline" data-bs-dismiss="toast" aria-label="Close">
                        Try Again
                    </span>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['exist_msg']);
        echo "<script>
        const fail_success = document.getElementsByClassName('toast-container')[0];
        setTimeout(() => {
            fail_success.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>
    <?php
    if (isset($_SESSION['success_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Login Successful!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Welcome <?php echo $_SESSION['user_name']; ?>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['success_msg']);
        echo "<script>
        const fail_success = document.getElementsByClassName('toast-container')[0];
        setTimeout(() => {
            fail_success.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>
    <?php
    if (isset($_SESSION['scribe_msg'])) {
        ?>
        <div class="toast-container position-fixed top-0 bottom-0 start-50 translate-middle-x p-3">
            <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Successful!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Email Subscribed Successful!
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['scribe_msg']);
        echo "<script>
        const fail_success = document.getElementsByClassName('toast-container')[0];
        setTimeout(() => {
            fail_success.style.display='none';
        }, 4000);
        </script>
        ";
    }
    ?>
    <div id="particles-js"></div><br>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stats.js/r16/Stats.min.js"></script>
    <script>
        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        value_area: 500.3181133058181,
                    },
                },
                color: {
                    value: "#000000",
                },
                shape: {
                    type: "edge",
                    stroke: {
                        width: 1,
                        color: "white",
                    },
                    polygon: {
                        nb_sides: 3,
                    },
                    image: {
                        src: "img/github.svg",
                        width: 100,
                        height: 100,
                    },
                },
                opacity: {
                    value: 0.49716301422833176,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 0.1,
                        opacity_min: 0.1,
                        sync: false,
                    },
                },
                size: {
                    value: 2.7,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 15,
                        size_min: 0.1,
                        sync: false,
                    },
                },
                line_linked: {
                    enable: true,
                    distance: 160.3412060865523,
                    color: "#fdfdfd",
                    opacity: 0.4008530152163807,
                    width: 1,
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "bounce",
                    bounce: false,
                    attract: {
                        enable: true,
                        rotateX: 1763.753266952075,
                        rotateY: 1603.4120608655228,
                    },
                },
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "grab",
                    },
                    onclick: {
                        enable: true,
                        mode: "push",
                    },
                    resize: true,
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 0.156297557645007,
                        },
                    },
                    bubble: {
                        distance: 400,
                        size: 30,
                        duration: 2,
                        opacity: 0.09744926547616141,
                        speed: 2.2,
                    },
                    repulse: {
                        distance: 250,
                        duration: 0.4,
                    },
                    push: {
                        particles_nb: 4,
                    },
                    remove: {
                        particles_nb: 2,
                    },
                },
            },
            retina_detect: true,
        });

        var count_particles, stats, update;
        count_particles = document.querySelector(".js-count-particles");
        update = function () {
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);

        const mail = document.getElementById("mail");
        const log = document.getElementsByClassName("log-title")[0];
        const pw = document.querySelectorAll(".pw");
        const eye = document.querySelectorAll(".eye");
        const sere = document.querySelectorAll(".sere");

        const check = document.getElementById("check");
        const img = document.getElementById("img");
        const contain = document.getElementsByClassName("contain")[0];
        const singup_account = document.getElementsByClassName("singup-acc")[0];
        const singup = document.getElementsByClassName("singup")[0];
        const login_singup = document.getElementsByClassName("login-singup")[0];


        for (let i = 0; i < pw.length; i++) {
            eye[i].classList.add('not-click');
            pw[i].addEventListener('click', () => {
                if (eye[i].classList.contains('fa-eye-slash')) {
                    img.src = "./asset/img/HidePassword.gif";
                } else {
                    img.src = "./asset/img/password.gif"
                }

            })

            pw[i].addEventListener('input', () => {
                if (pw[i].value.trim() !== "") {
                    eye[i].classList.remove('not-click');
                } else {
                    eye[i].classList.add('not-click');
                }
            })

            eye[i].addEventListener('click', () => {
                eye[i].classList.toggle('fa-eye');
                eye[i].classList.toggle('fa-eye-slash');
                if (eye[i].classList.contains("fa-eye-slash")) {
                    img.src = "./asset/img/HidePassword.gif";
                    pw[i].type = "password";
                } else {
                    pw[i].type = "text";
                    img.src = "./asset/img/password.gif";
                }
            })
        }
        mail.addEventListener('click', () => {
            img.src = "./asset/img/2.png";
        })

        const submitBtn = document.getElementById('submitBtn');
        singup.addEventListener('click', () => {
            if (singup.innerText === "Signup") {
                document.getElementsByClassName("fot")[0].classList.add("d-none");
                for (let i = 0; i < sere.length; i++) {
                    sere[i].classList.remove("d-none");
                }
                log.innerText = "Signup";
                singup_account.innerText = "If you have account ?";
                singup.innerText = "Login";
                login_singup.innerText = "Singup";
                submitBtn.name = "Singup";
                
            } else {
                for (let i = 0; i < sere.length; i++) {
                    sere[i].classList.add("d-none");
                    sere[0].classList.remove("d-none");
                }
                log.innerText = "Login";
                document.getElementsByClassName("fot")[0].classList.remove("d-none");
                singup_account.innerText = "If you haven't account ?";
                singup.innerText = "Signup";
                login_singup.innerText = "Login";
                submitBtn.name = "login";

            }
        })
        const forgotpw = document.getElementById("forgotpw");
        const enterse = document.getElementById("enterse");
        forgotpw.addEventListener("click", () => {
            document.getElementsByClassName("fot")[0].classList.add("d-none");
            enterse.classList.remove("d-none");
            sere[0].classList.add("d-none");
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>