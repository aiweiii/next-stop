<?php
require_once '../backend/common.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-logo">
            <a href="../landing_page/landing_page.html" id="nav-logo">next stop.</a>
        </div>  

        <div class="nav-items" id="nav-items">
            <a href="homepage.php" class="nav-item" id="nav-home">Home</a>
            <a href="#" class="nav-item" id="nav-forum">Forum</a>
            <a href="#" class="nav-item" id="nav-uniGuide">University Guide</a>
            <a href="#" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
        </div>

        <div class="nav-login-signup">
            <a href="../log_in.html" class="nav-login" id="nav-login">Login</a>
            <a href="../sign_up.html" class="nav-signup" id="nav-signup">Sign Up</a>
        </div>

        <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
            <span class="menu menu-small menu-top"></span>
            <span class="menu menu-middle"></span>
            <span class="menu menu-small menu-bottom"></span>
        </div>
    </nav>
    <div class="hero">
        <div class="title">Welcome,<br><?php print_r($_SESSION['username']);?> 😄</div>
        <div class="box">
            <div class="task-title">Explore our features:</div>
            <a href="../validation_page/validation_page.php" class="task">
                <div class="icon">✔️</div>
                <div class="right">
                    <div class="task-text">Choose Your University</div>
                    <div class="task-subtitle">Connect with your peers through the Telegram Groupchat</div>    
                </div>
            </a>
            <a href="../forum_dynamic/display.php" class="task" onclick="click_task_2">
                <div class="icon find">🔍</div>
                <div class="right">
                    <div class="task-text">Explore the forum</div>
                    <div class="task-subtitle">See what is trending right now</div>    
                </div>
            </a>
            <div class="task">
                <div class="icon find">🔍</div>
                <div class="right">
                    <div class="task-text">Explore the University Guides</div>
                    <div class="task-subtitle">Be well prepared for your exchange</div>    
                </div>
            </div>
            <div class="progress-bar">
                <progress id="file" value="32" max="100"> 32% </progress>
                33%    
            </div>
        </div>
    </div>



    <script>
        var navItems = document.getElementById("nav-items");
        navItems.style.maxHeight = "0px";
        function toggleMenu(){
            if( navItems.style.maxHeight == "0px" ){
                navItems.style.maxHeight = "200px";
            } else {
                navItems.style.maxHeight = "0px";
            }
        }
    </script>


</body>
</html>