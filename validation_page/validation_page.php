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

    // if(isset($_POST['signup'])){
        

    //     // -----------------------------------------------------------------------------------------------------------
    //     $image = $_FILES['profile_page'];
    //     $fileName = $_FILES['profile_page']['name'];
    //     $fileTmpName = $_FILES['profile_page']['tmp_name'];
    //     $fileSize = $_FILES['profile_page']['size'];
    //     $fileError = $_FILES['profile_page']['error'];
    //     $fileType = $_FILES['profile_page']['type'];


    //     $fileExt = explode('.',$fileName);
    //     $fileActualExt = strtolower(end($fileExt));
    //     $allowed = ['jpg','jpeg','png'];
    //     // ------------------------------------------ UPLOAD PICTURE RESTRICTIONS -----------------------------------
    //     if (in_array($fileActualExt,$allowed)){
    //         if($fileError == 0) {
    //             if($fileSize < 50000000){
    //                 $fileNameNew = uniqid('',true) . "." . $fileActualExt;
    //                 // var_dump($fileNameNew);
    //                 $fileDestination = "uploads/" . $fileNameNew;
    //                 move_uploaded_file($fileTmpName, $fileDestination);
    //             }else{
    //                 $message = "Your file is too big";
    //             }
    //         }
    //         else{
    //             $message = "There was an error uploading your file!";
    //         }
    //     }
    //     else{
    //         $message= "You cannot upload files of this type!";
    //     }

    // }
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        
</head>

<body>
    <nav>
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="var(--crimson)" fill-opacity="1" d="M0,192L80,208C160,224,320,256,480,272C640,288,800,288,960,245.3C1120,203,1280,117,1360,74.7L1440,32L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
    <div class="container">


        <div class="row">
            <div class="col-md pb-5">
                <h1 class="text-sm change-color fw-bold">Profile Page</h1>

            </div>
            <div class="col-4 pb-5 centering-on-collapse">
                <div class="profile-pic-huge"><?php print_r($_SESSION['username'][0]);?></div>
            </div>
        </div>


<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


        <div class="row">
        

                <div class="fw-bold text-muted">Name</div>
                <div class="user-input fs-5 "><?php print_r($_SESSION['username']);?></div>

                <div class="fw-bold text-muted">Email</div>
                <div class="user-input fs-5 "><?php print_r($_SESSION['email']);?></div>


                <div class="fw-bold text-muted">Exchange School</div>
                <div class="d-flex no-flex">

                        <div class="user-uni" id="user_uni">
                            <div class="user-input fs-5 text-nowrap p-0"><?php print_r($university);?></div>
                            <a class="edit-link fs-5 me-5" onclick="showSearchBar()">✏️</a>
                        </div>

                            <div class="search-bar w-100" id="search_bar">
                                <form class='search-bar-2' autocomplete="off" action="">
                                    <div class="autocomplete" style="width:100%;">
                                        <input class='uni-input' id="myInput" type="text" name="myCountry">
                                        
                                    </div>
                                    <input class='uni-submit' type="submit">
                                </form>
                </div>
                </div>

        </div>

        <!-- a href="../homepage/homepage.php" -->
        <div id="outcome"></div>
        <div class="logout-box my-5 pb-5"><a class="logout btn btn-warning p-2 w-100" href='../logout.php' style="text-decoration: none;">Log out</a></div>
        
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
    <script src="validation_page.js"></script>

</body>

</html>