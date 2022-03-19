<?php
class Contact_us {
    //Variables
    private $title;
    private $description;
    private $email;

    //Parameterized Constructor
    function __construct($title, $description, $email){
        $this->title = $title;
        $this->description = $description;
        $this->email = $email;
    }

    //Getter Setter
    function get_title() {
        return $this->title;
    }

    function set_title($title){
        $this->title = $title;
    }

    function get_description() {
        return $this->description;
    }

    function set_description($description){
        $this->description = $description;
    }

    function get_email() {
        return $this->email;
    }

    function set_email($email){
        $this->email = $email;
    }
}
?>