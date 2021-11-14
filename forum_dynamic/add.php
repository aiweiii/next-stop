<?php

require_once '../backend/common.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
} else {
    header('location:../log_in.html');
}
//  echo $_SESSION['university'];


?>

<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Vue3 CDN -->
    <script src="https://unpkg.com/vue@next"></script>
    <script language='JavaScript' type='text/javascript'>
        function validate_form() {

            // There are 3 ways to access a Form Input Field
            var s = document.forms['entry_form'].subject.value;     // This works if input field has NAME attribute
            //var s = document.forms['entry_form']['my_subject'].value; // This works if input field has ID attribute
            //var s = document.entry_form.subject.value;                 // This works if input field has NAME attribute

            if( s.length < 10 ) {
                alert("Subject has to be minimum 10 characters long!");
                return false;
            }
        }
    </script>

<link rel="stylesheet" href="../navbar/navbar.css">
<link rel="stylesheet" href="../main.css">
<link rel="stylesheet" href="css/add.css">

<title> New Post </title>


</head>
<body>

    <!-- country  -->
    <input name='country' id='country' :value="countrydisplay">

    <!-- navigation bar -->
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

    <!-- end of navigation bar -->

    <div class="big-box">

        <div class="row">
            <h2 class="title"> Create Your Post &#10024; </h2>
        </div>
        <br>

        <div class="row" id="app">

            <!-- NOTE: We set FORM NAME attribute so we can perform Form Validation using JavaScript -->
            <form name='entry_form' action='add_post.php' method='POST' onSubmit="return validate_form()">

                <p><b>University:</b> <span v-html="universitydisplay"></span></p> 
                <input type="hidden" name='university' id='university' :value="universitydisplay">
                <input type="hidden" name='username' id='my_username' :value="username">

                <p><b>Country:</b> {{countrydisplay}}</p>


                <div class="form-group">
                    <label for="exampleFormControlInput1"> <b>Subject</b> </label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="Summarise your experience!" name='subject' size='30' id='my_subject' required>
                </div><br>

                <div class='form-group'>
                    <label for='exampleFormControlTextarea1'> <b>Details</b> </label>
                    <textarea class='form-control' id='exampleFormControlTextarea1' placeholder="Include details of your experience!" rows='3' name='entry' id='entry_id' required></textarea>
                </div>


                <div class="container text-center">

                    <hr>


                    <input type='submit' value='Submit My Entry!' class="btn btn-warning">
                </div>

            </form>

        </div>

        <script>
        const app = Vue.createApp( {
            //=========== DATA PROPERTIES ===========
            data() {
                return {
                    uniArr: [],
                    countArr: [],
                    country: '',
                    email: '',
                    username: '',
                    university: '',
                    universitydisplay: '',
                    countrydisplay: '',
                }
            },
            //=========== METHODS =========== 
            methods: {
                addChild() {
                    var url = "sessionAPI.php";
                    axios.get(url) 
                    .then(response => {
                        var result = response.data;
                        // console.log(response.data)

                        var email = result.email;
                        var username = result.username;
                        var university = result.university;

                        if (university == ''){
                            university = 'No university selected yet. Update your <a class="edit-btn" href="../validation_page/validation_page.php">profile page</a> now!'
                            this.countrydisplay = 'None'
                        }
                        this.email = email;
                        this.username = username;
                        this.universitydisplay = university;

                    })
                    .catch(error => {
                        console.log(error.message)
                    })

                    var url = "../countries.json";
                    axios.get(url) 
                    .then(response => {
                        var myCountries = response.data;
                        // console.log(response.data)
                        var universities = []
                        var countries = []
                        for (let i=0; i<myCountries.length; i++){
                            if (!countries.includes(myCountries[i]['Country'])) {
                                countries.push(myCountries[i]['Country'])
                            }
                            // console.log(myCountries[i]['University'])
                            // console.log(this.universitydisplay)
                            if (myCountries[i]['University'] == this.universitydisplay){
                                this.countrydisplay = myCountries[i]['Country']
                            }
                            universities.push(myCountries[i]['University'])
                            // console.log(universities)
                        }
                        this.uniArr = universities;
                        this.countArr = countries;
                        // console.log(this.uniArr);
                        // console.log(this.countArr);
                        // return universities, countries
                    })
                    .catch(error => {
                        console.log(error.message)
                    })

                }
            },
            created() {
                this.addChild()

            },
        } )
        const vm = app.mount('#app')
        </script>



    </div>



        <!-- bootstrap -->    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
        crossorigin="anonymous"></script>

</body>
</html>