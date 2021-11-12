<?php
    // session start, get username and email
    require_once '../backend/common.php';
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
    }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Bootstrap CSS, JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../navbar/navbar.css">
  <link rel="stylesheet" href="../main.css">
  <script src="script.js"></script>
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
          <div class="profile-pic"><?php print_r($_SESSION['username'][0]);?></div>
          <div class="username" id="username"><?php print_r($_SESSION['username']);?></div>
      </a>

      <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
          <span class="menu menu-small menu-top"></span>
          <span class="menu menu-middle"></span>
          <span class="menu menu-small menu-bottom"></span>
      </div>
  </nav>

  <div class="container-fluid p-0" >

    <div class="row g-0" style="height:  calc(100vh - 70px);">

      <!-- Maps -->
      <div class="col-md-8" style="height: 100%;">
          <input id="pac-input" class="controls" type="text" placeholder="Enter a location.." />
        <div id="map"></div>
        <div id="infowindow-content">
          <span id="place-name" class="title"></span><br />
          <strong>Place ID:</strong> <span id="place-id"></span><br />
          <span id="place-address"></span>
        </div>
      </div>

      <!-- Uni info -->
      <div class="col-md p-4 uni-info">
      <h2 class="fw-bold mb-4 ">University Guides</h2>

        <!-- <p class="text-secondary">Pick your university <a href="">here</a> before you browse.</p> -->
        <h4>Uni Name</h4>
        <p>Info</p>

        <!-- insert your pic here -->
        <img src="../img/signup_bg.png" width="100%" class="pb-4" alt="">

        <h4>Uni Name</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ipsam iure magnam, id voluptate corporis possimus, voluptatibus, molestias ipsum velit ut inventore voluptatem. Doloribus sit provident laborum iste accusantium. Rem?</p>

        <h4>Uni Name</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio quam aspernatur saepe dignissimos dolore repellat accusamus similique blanditiis libero molestias eaque pariatur minus, praesentium, velit ut eum, aliquam aut officia.</p>

      </div>
    </div>

  </div>


  <script>
        var username = '<?php echo $username;?>';
        if (username != null) {
            //for smaller devices
            document.getElementById("nav-login-signup").innerHTML = '';
            document.getElementById("nav-username").innerHTML = 'Profile';

            //for larger devices
            document.getElementById("user-profile").style.display = 'flex';
            document.getElementById("nav-login-signup-2").style.display = "none";
            
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

  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf_8QgsbouLol-VDIvCW72IIe4bqOD9C8&callback=initMap&libraries=places&v=weekly&channel=2"
    async></script>
</body>

</html>