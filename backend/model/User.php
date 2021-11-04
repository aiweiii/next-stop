<?php

class User {
    private $full_name;
    private $email;
    private $password_hashed;
    private $university;


    function __construct($full_name, $email, $password_hashed) {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password_hashed = $password_hashed;
    }

    public function getFullname(){
        return $this->full_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPasswordhashed(){
        return $this->password_hashed;
    }

    public function setPasswordhashed($hashed){
        $this->password_hashed = $hashed;
    }

    public function getUniversity(){
        return $this->university;
    }
    
    public function setUniversity($university){
        $this->university = $university;
    }

}
