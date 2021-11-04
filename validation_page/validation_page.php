<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="validation_page.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
            <a href="../sign_up.html" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
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
    <div class="container">
        <div class="title">Choose Your University:</div>
        <div class="search-bar">
            <form autocomplete="off" action="/action_page.php">
                <div class="autocomplete" style="width:100%;">
                    <input id="myInput" type="text" name="myCountry">
                </div>
            </form>
        </div>
        <a href="../homepage/homepage.php" class="confirm-btn">Confirm</a>
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
    <script src="validation_page.js"></script>

</body>
</html>