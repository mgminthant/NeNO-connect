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

    sub{
        font-size: 10px;
    }
</style>

<body>
    <div class="ani-div text-white">
        <div class="container d-flex py-4 justify-content-between">
            <h3 class="text-white">ZeNO<sub>Connect</sub></h3>
            <div class=""><button class="btn btn-primary rounded-pill">Admin</button></div>
        </div>
        <div class="d-flex flex-column justify-content-center ani-div">
            <div class="container d-flex flex-column align-items-center text-center gap-3 main-title">
                <h1>Easy Budgeting, Zero Stress</h1>
                <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A dignissimos magni ex tempore suscipit
                    debitis
                    suscipit?</small>
                <div class="btn btn-primary">Get Started</div>
            </div>
        </div>
    </div>
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

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>