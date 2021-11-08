<?php

class Post {
    private $id;
    private $create_timestamp;
    private $update_timestamp;
    private $subject;
    private $entry;
    private $country;
    private $university;
    private $username;

    public function __construct($id, $create_timestamp, $update_timestamp, $subject, $entry, $country, $university, $username) {
        $this->id = $id;
        $this->create_timestamp = $create_timestamp;
        $this->update_timestamp = $update_timestamp;
        $this->subject = $subject;
        $this->entry = $entry;
        $this->country = $country;
        $this->university = $university;
        $this->username = $username;
    }

    public function getID() {
        return $this->id;
    }

    public function getCreateTimestamp() {
        return $this->create_timestamp;
    }

    public function getUpdateTimestamp() {
        return $this->update_timestamp;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getEntry() {
        return $this->entry;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getUniversity() {
        return $this->university;
    }

    public function getUsername() {
        return $this->username;
    }

}

?>