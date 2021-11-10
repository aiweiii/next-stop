<!DOCTYPE html>
<html lang="en">

<?php
    // session start, get username and email
    require_once '../backend/common.php';
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <nav>
        <div class="nav-logo">
            <a href="../landing_page/landing_page.html" id="nav-logo">next stop.</a>
        </div>  

        <div class="nav-items" id="nav-items">
            <a href="../homepage/homepage.php" class="nav-item" id="nav-home">Home</a>
            <a href="#" class="nav-item" id="nav-forum">Forum</a>
            <a href="#" class="nav-item" id="nav-uniGuide">University Guide</a>
            <a href="../log_in.html" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
            <a href="../validation_page/validation_page.php" class="nav-item" id="nav-username"></a>
        </div>

        <div class="nav-login-signup" id="nav-login-signup">
            <a href="../log_in.html" class="nav-login" id="nav-login">Login</a>
            <a href="../sign_up.html" class="nav-signup" id="nav-signup">Sign Up</a>
        </div>

        <a class="username" id="username"></a>

        <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
            <span class="menu menu-small menu-top"></span>
            <span class="menu menu-middle"></span>
            <span class="menu menu-small menu-bottom"></span>
        </div>
    </nav>
    <div class="hero"></div>

    <script>
        function showProfile() {
            document.getElementById("nav-login-signup").innerHTML = '';
            document.getElementById("nav-username").innerHTML = 'Profile';
            document.getElementById("username").innerHTML = username;
            document.getElementById("username").style.display = "block";
            document.getElementById("nav-login-signup").style.display = "none";
        }
        
        
        //TO DO: if user is registered then showProfile()
        //if(isset($_SESSION['username'])){
            //var username = '<?php echo $username;?>';
            //showProfile()
        //}
        showProfile()
        

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