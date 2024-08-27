<?php include('./db/db.php'); ?>
<?php
session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .connect i {
            font-size: 70px;
            color: #0d6efd;
        }

        .row>* {
            padding-right: 0;
        }

        .up {
            transform: translateY(50px);
        }

        .up:hover {
            transform: translateY(0px);
            transition: transform 0.3s ease-in-out;
        }

        .under {
            padding-top: 100vh;
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
            width: calc(500px * 5);
            display: flex;
            gap: 20px;
            animation: scroll 60s infinite linear;
        }

        .feedback svg {
            font-size: 20px;
            cursor: default;
        }

        .single-feedback {
            cursor: default;
            position: relative;
            width: 400px;
            max-width: 70vw;
            overflow: scroll;
            max-height: 500px;
            padding: 50px;
            border-radius: 30px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .slide:hover .feedback {
            animation-play-state: paused;
        }

        .single-feedback p {
            font-size: 18px;
            overflow: scroll;
            max-height: 300px;
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
        }


        .pre-loader {
            width: 100vw;
            height: 100vh;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            background-color: white;
        }

        .main {
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .fail_success {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            display: none;
        }
    </style>
</head>

<body>
    <div class="pre-loader fs-3 bg-black text-white">
        <div class="text text-bold"></div>
    </div>
    <div class="scroll-watcher"></div>
    <?php include('./components/animation.php') ?>
    <div class="under">
        <?php include('./components/wedo.php') ?>
        <?php include('./components/offer.php') ?>
        <?php include('./components/feedback.php') ?>
        <?php include('./components/footer.php') ?>
    </div>
</body>
<script>
    const second = document.getElementsByClassName('feedback')[1];
    const first = document.getElementsByClassName('feedback')[0];
    if (document.querySelectorAll('.single-feedback').length <= 4) {
        second.style.display = "none";
        first.style.animationPlayState = "paused";
        document.getElementsByClassName("slide")[0].style.overflow = "scroll";
    }
</script>
<!-- text type effect  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"
    integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
    crossorigin="anonymous"></script>
<script src="./Js/index.js"></script>
<script src="./Js/poper.js"></script>

</html>