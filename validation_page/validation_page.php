<!DOCTYPE html>
<html lang="en">

<?php
    // session start, get username and email
    require_once '../backend/common.php';
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
    }


    // Create the DAO object to facilitate connection to the database.
    if (isset($_GET['myCountry'])){
        $university = $_GET['myCountry'];
        
        $dao = new UserDAO();
        $user = $dao->get($email);
        
        // Check if the email exists
        if ($user != null) {
            // If email exists
            // update university for this user
            $user->setUniversity($university);
            $university = $user->getUniversity();
            $_SESSION['university'] = $university;

            $dao->update($user);

        } else {
            $errors['email'][] = 'This email account does not exist.';
            exit();
        }
        // echo $email, $username, $university;

    }

    //TO DO: if selected uni, display uni instead
    if (isset($_SESSION['university'])) {
        if ($_SESSION['university'] == '') {
            $university = 'No University Choosen';
        } else {
            $university = $_SESSION['university'];
        }  
    } 


?>

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
        <div class="title">Profile</div>
        <div class="name subtitle">Name:</span></div>
        <div class="user-input user-name"><?php print_r($_SESSION['username']);?></div>
        <div class="email subtitle">Email:</div>
        <div class="user-input user-email"><?php print_r($_SESSION['email']);?></div>
        <div class="subtitle">University:</div>
        <div class="user-uni" id="user_uni">
            <div class="user-input"><?php print_r($university);?></div>
            <a class="edit-btn" onclick="showSearchBar()">Edit</a>
        </div>
        <div class="search-bar" id="search_bar">
            <form class='search-bar-2' autocomplete="off" action="">
                <div class="autocomplete" style="width:100%;">
                    <input class='uni-input' id="myInput" type="text" name="myCountry">
                    
                </div>
                <input class='uni-submit' type="submit">
            </form>
        </div>
        <!-- a href="../homepage/homepage.php" -->
        <div id="outcome"></div>
    </div>



    <script>
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
    <script src="validation_page.js"></script>

</body>

</html>