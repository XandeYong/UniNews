<?php
class Account{
    //Variables
    private $account_id;
    private $username;
    private $email;
    private $password;

    //Parameterized Constructor
    function __construct($account_id, $username, $email, $password){
        $this->account_id = $account_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    //Getter & Setter
    function get_account_id() {
        return $this->account_id;
    }

    function set_account_id($account_id){
        $this->account_id = $account_id;
    }

    function get_username() {
        return $this->username;
    }

    function set_username($username){
        $this->username = $username;
    }

    function get_email() {
        return $this->email;
    }

    function set_email($email){
        $this->email = $email;
    }

    function get_password() {
        return $this->password;
    }

    function set_password($password){
        $this->password = $password;
    } 
}
?>