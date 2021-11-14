<?php
    // session start, get username and email
    require_once '../backend/common.php';
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
    } else {
      $username = '';
    }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Guide</title>

  <!-- Bootstrap CSS, JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

  <!-- Axios -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../navbar/navbar.css">
  <link rel="stylesheet" href="../main.css">
  <title>Place ID Finder</title>

</head>

<body>
    <!-- navbar placeholder !!!! -->
    <nav style="border-bottom: solid 1px #cfcfcf;">
      <div class="nav-logo">
          <a href="../landing_page/landing_page.html" id="nav-logo">next stop.</a>
      </div>  

      <div class="nav-items" id="nav-items">
          <a href="../homepage/homepage.php" class="nav-item" id="nav-home">Home</a>
          <a href="../forum_dynamic/display.php" class="nav-item" id="nav-forum">Forum</a>
          <a href="../guide/index.php" class="nav-item" id="nav-uniGuide">University Guide</a>
          <a href="../log_in.html" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
          <a href="../validation_page/validation_page.php" class="nav-item" id="nav-username"></a>
      </div>

      <div class="nav-login-signup" id="nav-login-signup-2">
          <a href="../log_in.html" class="nav-login" id="nav-login">Login</a>
          <a href="../sign_up.html" class="nav-signup" id="nav-signup">Sign Up</a>
      </div>

      <a href="../validation_page/validation_page.php" class="user-profile" id="user-profile">
          <div class="profile-pic"><?php print_r($username[0]);?></div>
          <div class="username" id="username"><?php print_r($username);?></div>
      </a>

      <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
          <span class="menu menu-small menu-top"></span>
          <span class="menu menu-middle"></span>
          <span class="menu menu-small menu-bottom"></span>
      </div>
  </nav>

  <script>
        var username = '<?php echo $username;?>';
        if (username != '') {
            //for smaller devices
            document.getElementById("nav-login-signup").innerHTML = '';
            document.getElementById("nav-username").innerHTML = 'Profile';

            //for larger devices
            document.getElementById("user-profile").style.display = 'flex';
            document.getElementById("nav-login-signup-2").style.display = "none";
        } else {
            document.getElementById("nav-home").href = '../index.html'
        }

        var navItems = document.getElementById("nav-items");
        navItems.style.maxHeight = "0px";
        function toggleMenu() {
            if (navItems.style.maxHeight == "0px") {
                navItems.style.maxHeight = "200px";
            } else {
                navItems.style.maxHeight = "0px";
            }
        } 
    </script>

  <div class="container-fluid p-0" >

    <div class="row g-0" style="height:  calc(100vh - 71px);">
      <!-- Maps -->
      <div class="col-md-6" style="height: 100%;">
          <input id="pac-input" class="controls" type="text" placeholder="Enter a location"/>
        <div id="map"></div>
        <div id="infowindow-content">
          <span id="place-name" class="title"></span><br />
          <strong>Place ID:</strong> <span id="place-id"></span><br />
          <span id="place-address"></span>
        </div>
      </div>

      <!-- Uni info -->
      <div class="col-md p-4 sidebar">

        <div class="d-flex flex-column align-items-center mt-5" id="instruction" style="display: inline;">
          <img id="instructionImage" style="display: block" src="img/welcome.jpg" alt="Welcome!" width=100%>
          <h2 class="pt-5" id="instructionText" style="display: block">Begin by Searching for a Partner University!</h2>
        </div>

        <div id="uni-info" style="display: none;">
          <h2 id="uniName"></h2>
          <p id="desc">Osaka University is a national university located in Osaka, Japan. It is the sixth oldest university in Japan as the Osaka Prefectural Medical College, and one of Japan's National Seven Universities. It is the 4th best ranked higher education institution in Japan (96th worldwide) in 2016 by the Academic Ranking of World Universities.</p>

          <!-- insert your pic here -->
          <img id="image" src="" width="100%" class="pb-4" alt="">

          <!-- people entering this university -->
          <h3 class="pt-3" id="students_uni_header"></h3>

          <p id="null_students">
          </p>

          <ol id="students_uni">
          </ol>

          <!-- Quiz Starts Here -->
          <div class="my-3">
            <div class="score p-1 border rounded-3 text-center bg-dark text-white fw-bold" style="width: 25%;">Score:
              <span class="text-theme-color" id="user-score">0</span>
              <span class="text-white" id="total-score">/ 5</span>
            </div>

          <!-- Welcome Box -->
          <section class="mt-3" id="welcome-area">
            <div class="card text-center border-theme-color" style="width: 100%;">
              <img src="img/infoImg1.jpg" class="card-img-top" id="card-img" alt="People Celebrating">
              <div class="card-body">
                <h5 class="card-title fs-2 fw-bold text-theme-color" id="card-title-text">Quiz Time!</h5>
                <p class="card-text fs-4 text-muted" id="region"></p>
                <p class="card-text fs-4">Have what it takes? Test your knowledge on this place!</p>
                <button class="btn btn-major btn-lg col-6" id="start">Let's Go!</button>
              </div>
            </div>
          </section>

          <section class="mt-3" id="submit-area" style="display:none">
            <div class="card text-center border-theme-color" style="width: 100%;">
              <img src="img/celebrate.jpg" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title fs-2 fw-bold text-theme-color">Well Done!</h5>
              </div>
            </div>
          </section>


          <div class="card text-center" id="question-area" style="width: 100%;display:none">
            <div class="card-body border">
              <h5 class="card-title" id="question-text"></h5>
            </div>
            <div class="options list-group list-group-flush">
              <button type="button" class="list-group-item list-group-item-action list-hover" id="option1">option1</button>
              <button type="button" class="list-group-item list-group-item-action list-hover" id="option2">option2</button>
              <button type="button" class="list-group-item list-group-item-action list-hover" id="option3">option3</button>
              <button type="button" class="list-group-item list-group-item-action list-hover" id="option4">option4</button>
            </div>
          </div>

          <div class="mt-3">
            <button class="btn btn-dark" id="restart">Restart</button>
            <button class="btn btn-major" id="next">Next</button>
          </div>
        </div>
      </div>


      </div>
    </div>
  </div>


  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf_8QgsbouLol-VDIvCW72IIe4bqOD9C8&callback=initMap&libraries=places&v=weekly&channel=2" async></script>

  <script src="questions.js" ></script>
  <script src="script.js" ></script>
  <script src="script_quiz.js" ></script>

</body>

</html>