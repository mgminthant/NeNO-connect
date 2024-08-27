<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Assistant</title>
  <style>
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

    .send {
      display: none;
    }

    .send.show {
      margin-left: -35px;
      display: block;
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

    .loading div {
      width: 5px;
      height: 5px;
      background-color: white;
    }

    .loading div:nth-child(1) {
      animation: ani1 .5s linear infinite;
    }

    .loading div:nth-child(2) {
      animation: ani1 .7s linear infinite;
    }

    .loading div:nth-child(3) {
      animation: ani1 .9s linear infinite;
    }

    @keyframes ani1 {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-5px);
      }

      100% {
        transform: translateY(-10px);
      }
    }

    .chat img {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }

    @media only screen and (max-width: 500px) {
      .chat img {
        width: 30px;
        height: 30px;
      }
    }
  </style>
  <link rel="stylesheet" href="../asset/bootstrap.min.css">
</head>

<body style="background-color:#18191a;">
  <!-- responsive navbar -->
  <div class="res-nav">
    <div class="offcanvas offcanvas-start" style="background-color:#18191a;" tabindex="-1" id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header d-flex justify-content-between">
        <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Quantum<sub>Connect</sub></h5>
        <div type="button" data-bs-dismiss="offcanvas" aria-label="Close" style="color:white;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg"
            viewBox="0 0 16 16">
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
          <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
          <a href="" type="button" class="text-decoration-none text-white active">Assistant</a>
        </div>
        <div class="d-flex justify-content-center mt-5">
          <img src="../asset/img/artificial-intelligence.gif" alt="" class="rounded-circle img-fluid"
            style="width: 50px; height: 50px;">
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-black text-white p-0 mb-3 position-sticky top-0 z-3">
    <div class="d-flex p-4 justify-content-between w-100 input align-items-center"
      style="border-bottom: 1px solid rgb(85, 84, 84);background-color : #242526;">
      <h3 class="text-white">Quantum<sub style="font-size: 10px;">Connect</sub></h3>
      <div class="menu-none">
        <div class="d-flex gap-5 menu menu-none">
          <a href="../index.php" type="button" class="text-decoration-none text-white">Home</a>
          <a href="./post.php" type="button" class="text-decoration-none text-white">Feed</a>
          <div>
            <a href="./projects.php" type="button" class="text-decoration-none text-white">Mini Projects</a>
          </div>
          <a href="./premium.php" type="button" class="text-decoration-none text-white">Paid Projects</a>
          <a href="" type="button" class="text-decoration-none text-white active">Assistant</a>
        </div>
      </div>
      <div class="res-menu" style="cursor:pointer;pointer-events: auto;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <div class="bg-white" style="width:30px;height:2px;"></div>
        <div class="bg-white" style="width:30px;height:2px;margin: 7px 0;"></div>
        <div class="bg-white" style="width:30px;height:2px;"></div>
      </div>
      <img src="../asset/img/artificial-intelligence.gif" alt="" class="rounded-circle img-fluid menu-none"
        style="width: 50px; height: 50px;">
    </div>
  </div>
  <div class="container position-fixed" style="left: 50%; transform:translateX(-50%);bottom: 25px;">
    <div class="row" style="background-color:#18191a;">
      <div class="col-lg-7 col-md-10 col-11 d-flex align-items-center mx-auto">
        <input type="text" class="form-control" placeholder="Enter question..." id="prompt">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
          class="bi bi-arrow-right-square-fill send" viewBox="0 0 16 16" style="cursor: pointer;">
          <path
            d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1" />
        </svg>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 col-11 mx-auto">
        <div class="chat text-white">

        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['src'])) {
    $src = $_SESSION['src'];
  } else {
    $src = "Question.png";
  }
  ?>
</body>
<script type="importmap">
    {
      "imports": {
        "@google/generative-ai": "https://esm.run/@google/generative-ai"
      }
    }
  </script>
<html>

<body>
  <script type="module">
    import { GoogleGenerativeAI } from "@google/generative-ai";
    const API_KEY = "AIzaSyAHOI8m1HFBiHdx3eEg6wIhnf56jS9FKYI";

    const genAI = new GoogleGenerativeAI(API_KEY);
    const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });

    const chat = document.getElementsByClassName('chat')[0];
    const prompt = document.getElementById('prompt');
    const send = document.getElementsByClassName('send')[0];
    let input_text;

    const formatResult = (text) => {
      let splitText = text.split("**");
      let formatText = "";
      for (let i = 0; i < splitText.length; i++) {
        if (i % 2 == 0) {
          formatText += splitText[i];
        } else {
          formatText += "<b>" + splitText[i] + "</b>";
        }
      }
      formatText = formatText.split("*").join("<br>");
      return formatText;
    };

    const textTypeEffect = (word, index, pTag1) => {
      const bot = document.querySelectorAll('.bot-text');
      setTimeout(() => {
        pTag1.innerHTML += word;
        const bd_element = document.documentElement;
        bd_element.scrollTo({
          top: bd_element.scrollHeight,
          behavior: "smooth",
        });
      }, 75 * index);
    };

    async function run(text_prompt) {
      const divTag = document.createElement("div");
      const imgTag = document.createElement("img");
      const pTag = document.createElement("p");
      const divTag1 = document.createElement("div");
      const imgTag1 = document.createElement("img");
      const divTag2 = document.createElement("div");
      const divTag3 = document.createElement("div");
      const divTag4 = document.createElement("div");
      const divTag5 = document.createElement("div");
      chat.append(divTag);

      divTag.append(imgTag, pTag);
      imgTag.src = "../uploads/<?php echo $src; ?>";
      divTag.className = "d-flex gap-2 align-items-center mt-3";
      imgTag.className = "rounded-circle border border-info";
      pTag.innerText = text_prompt;

      const pTag1 = document.createElement("p");
      imgTag1.src = "../asset/img/bot.png";
      pTag1.className = "bot-text pb-5 mb-5";
      divTag2.append(divTag3, divTag4, divTag5);
      divTag3.className = "rounded-circle";
      divTag4.className = "rounded-circle";
      divTag5.className = "rounded-circle";
      divTag1.append(imgTag1, divTag2, pTag1);

      divTag1.className = "bot mt-5 d-flex gap-2";
      divTag2.className = "loading d-flex gap-2 d-none";
      chat.append(divTag1);
      divTag2.classList.remove("d-none");
      const result = await model.generateContent(text_prompt);
      const response = await result.response;
      const text = response.text();
      divTag2.classList.add("d-none");

      let newFormatText = formatResult(text);
      console.log(newFormatText);
      newFormatText = newFormatText.split(" ");
      for (let i = 0; i < newFormatText.length; i++) {
        textTypeEffect(newFormatText[i] + " ", i, pTag1);
      }
    }

    prompt.addEventListener('input', (e) => {
      e.target.value ? send.classList.add('show') : send.classList.remove('show');
      input_text = e.target.value;
    });

    send.addEventListener("click", () => {
      run(input_text);
      prompt.value = '';
      send.classList.remove('show');
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>

</html>