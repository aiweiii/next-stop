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

<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="main.css">

<?php 
    require_once '../backend/common.php';

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
        $university = $_SESSION['university'];

        echo $email, $username, $university;
    } else {
        // redirect to homepage if never login/signup
        header("Location: ../homepage/homepage.php");
    }
?>

</head>
<body>
    <!-- navigation bar -->
    <nav>
        <div class="nav-logo">
            <a href="#" id="nav-logo">next stop.</a>
        </div>

        <div class="nav-items" id="nav-items">
            <a href="../homepage/homepage.php" class="nav-item" id="nav-home">Home</a>
            <a href="display.php" class="nav-item" id="nav-forum">Forum</a>
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

    <!-- end of navigation bar -->

    <div class="container">

        <div class="row">
            <h2 class="text-center" style="color: #cc8359;"> Create Your Post &#10024; </h2>
        </div>
        <br>

        <div class="row">

            <!-- NOTE: We set FORM NAME attribute so we can perform Form Validation using JavaScript -->
            <form name='entry_form' action='add_post.php' method='POST' onSubmit="return validate_form()">

                <div class="form-group">
                    <label for="exampleFormControlInput1"> Subject </label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="Summarise your experience!" name='subject' size='30' id='my_subject' required>
                </div><br>

                <div class='form-group'>
                    <label for='exampleFormControlTextarea1'> Details </label>
                    <textarea class='form-control' id='exampleFormControlTextarea1' placeholder="Inlcude details of your experience!" rows='3' name='entry' id='entry_id' required></textarea>
                </div>

                <!-- <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> Subject </span>
                    <input type="text" class="form-control" placeholder="Summarise your experience!" aria-label="Username" aria-describedby="basic-addon1" name='subject' size='30' id='my_subject' required>
                </div> -->

                <!-- <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> Details </span>
                    <input type="text" class="form-control" placeholder="Inlcude details of your experience!" aria-label="Username" aria-describedby="basic-addon1" name='entry' cols='80' rows='5' id='entry_id' required>
                </div> -->

                <!-- Details: <br>
                <small> Inlcude details of your experience!  </small> <br>
                <textarea name='entry' cols='80' rows='5' id='entry_id' required></textarea>
                <br> -->

                <!-- <h6 style="color: slateblue;"> Include Tags: </h6>
                <small> Including the relevant tags will help increase your post's visibility to others! </small>
                <br><br> -->

                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Country
                    </button>
                        <ul name='country' class="dropdown-menu">
                            <li><option value='Korea'>Korea</option></li>
                            <li><option value='Singapore'>Singapore</option></li>
                            <li><option value='United Kingdom'>United Kingdom</option></li>
                        </ul>
                </div> -->

                <div class="container text-center">

                    <hr>

                    <div class="input-group flex-nowrap" style="width: 25%; margin: auto;">
                        <span class=" input-group-text" id="addon-wrapping">@</span>
                        <input type="text" class=" col-md-4 form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"  name='username' id='my_username' required>
                    </div> <br>

                    <div id="app">
                        <div class="container">
                            Country:
                                <select name='country' id='country'>
                                    <option v-for="country in countArr" :value="country"> {{country}} </option>
                                </select>
                            <br><br>
                            University:
                                <select name='university' id='university'>
                                    <option v-for="uni in uniArr" :value="uni"> {{uni}} </option>
                                </select>
                        </div>
                    </div><br>

                    <input type='submit' value='Submit My Entry!' class="btn btn-warning">
                </div>

            </form>

        </div>
    </div>

    <script>
        const app = Vue.createApp( {
            //=========== DATA PROPERTIES ===========
            data() {
                return {
                    uniArr: [],
                    countArr: [],
                }
            },
            //=========== METHODS =========== 
            methods: {
                addChild() {
                    var url = "../countries.json";
                    axios.get(url) 
                    .then(response => {
                        var myCountries = response.data;
                        var universities = []
                        var countries = []
                        for (let i=0; i<myCountries.length; i++){
                            if (!countries.includes(myCountries[i]['Country'])) {
                                countries.push(myCountries[i]['Country'])
                            }
                            universities.push(myCountries[i]['University'])
                        }
                        this.uniArr = universities;
                        this.countArr = countries;
                        // console.log(this.uniVar);
                        // console.log(this.countryVar);
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


        <!-- bootstrap -->    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
        crossorigin="anonymous"></script>

</body>
</html>