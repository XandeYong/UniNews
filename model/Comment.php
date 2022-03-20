<?php
class Comment {
    //Variables
    private $commentID;
    private $name;
    private $email;
    private $content;
    private $status;
    private $datetime;
    private $news;

    //Parameterized Constructor
    function __construct($commentID, $name, $email, $content, $status, $datetime, $news){
        $this->commentID = $commentID;
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
        $this->status = $status;
        $this->datetime = $datetime;
        $this->news = $news;
    }

    //Getter Setter
    function get_commentID() {
        return $this->commentID;
    }

    function set_commentID($commentID){
        $this->commentID = $commentID;
    }

    function get_name() {
        return $this->name;
    }

    function set_name($name){
        $this->name = $name;
    }

    function get_email() {
        return $this->email;
    }

    function set_email($email){
        $this->email = $email;
    }

    function get_content() {
        return $this->content;
    }

    function set_content($content){
        $this->content = $content;
    }

    function get_status() {
        return $this->status;
    }

    function set_categoryDateModify($status){
        $this->status = $status;
    }

    function get_datetime() {
        return $this->datetime;
    }

    function set_datetime($datetime) {
        $this->datetime = $datetime;
    }
    
    function get_news() {
        return $this->news;
    }

    function set_news($news) {
        $this->news = $news;
    }
}
?>