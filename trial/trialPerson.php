<?php
    class Person{
        private $name;
        private $email;
        private $uni;
        private $country;
        private $fdesc;

        public function __construct($name, $email, $uni, $country, $fdesc){
            $this->name = $name;
            $this->email = $email;
            $this->uni = $uni;
            $this->country = $country;
            $this->fdesc = $fdesc;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getUni() {
            return $this->uni;
        }

        public function getCountry() {
            return $this->country;
        }

        public function getFDesc() {
            return $this->fdesc;
        }
    }
?> 