<?php 
    require_once 'common.php';

    $errors = [];

    // Get the data from log_in.html
    $_POST = json_decode(file_get_contents("php://input"),true);

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Create the DAO object to facilitate connection to the database.
    $dao = new UserDAO();
    $user = $dao->get($email);
    // Check if the email exists
    if ($user != null)
    {
        // If email exists
        // get the hashed password from the database
        // Match the hashed password with the one which user entered
        // if it does not match. -> error
        $hashed = $user->getPasswordhashed();
        $status = password_verify($password, $hashed);


        // check if the plain text password is valid
        if ($status)
        { 
            $_SESSION['email'] = $email;
            exit;
        }
        else
        {
            // password not valid
            // return to login page and show error
            $errors['password'][] = 'Invalid password.';
        }

    } else
    {
        $errors['email'][] = 'This email account does not exist.';
        
        
    }
    if (count($errors) > 0 ){
        // header('Location: login.php');
        echo json_encode($errors);
        exit();
    }

    // debug
    // echo json_encode($_SESSION);

?>