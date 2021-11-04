<?php
require_once "common.php";

    $_SESSION = [];
    $errors = [];

    // Get the data from form processing
    $_POST = json_decode(file_get_contents("php://input"),true);

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

// debug
    // $full_name = 'xue er';
    // $email = 'lol@smu.edu.sg';
    // $password = 'Password1';
    // $confirm_password = 'Password1';

    // Form field validation - fullname field
    if (empty($full_name)){
        $errors['full_name'][] = 'Please enter your name.';
    }

    // Form field validation - email field
    if (empty($email)){
        $errors['email'][] = 'Please enter your email.';
    }
    else {
        $dao = new UserDAO();
        $user = $dao->get($email);
        if ($user != null){
            $errors['email'][] = 'This email address is already taken. Please try another.';
            $tmp_email = $email;
        }
        else if (($pos = strpos($email, "@")) !== FALSE) { 
            $email_domain = substr($email, $pos + 1);
            if ($email_domain != 'smu.edu.sg'){
                $errors['email'][] = 'Your email must end with @smu.edu.sg';
            }
        }
    }
    
    // Form field validation - password field
    if (empty($password)){
        $errors['password'][] = 'Please enter your password.';
    }
    else {
        if ($password != $confirm_password){
            $errors['password'][] = 'Password does not match with confirm password.';
        }
        if (strlen($password) < 8){
            $errors['password'][] = 'Password must be longer than 8 characters.';
        }
        if ($password == strtolower($password) || $password == strtoupper($password)){
            $errors['password'][] = 'Password should contain uppercase and lowercase letters.';
        }
    }

    // debugging
    // for ($i = 0; $i <= count($errors); $i++){
    //     echo $errors[$i]."<br>";
    // }
    // echo $errors;

    // If got error, go back to signup page and flash the errors
    if (count($errors) > 0 ){
        $php_arr = $errors;
        echo json_encode($php_arr);
        // header("Location: ../sign_up.html");
        exit();
    }

    // if everything is checked. Create user Object and write to database
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $new_user = new User($full_name, $email, $hashed);

    $status = $dao->create($new_user);

    // $full_name = $name;


if ( $status ) {
    // success; redirect page
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $full_name;
    // header("Location: ../login.html");
    exit();
}
    
?>

