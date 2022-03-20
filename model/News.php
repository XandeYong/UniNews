<?php
class News {
    //Variables
    private $newsID;
    private $title;
    private $description;
    private $image;
    private $status;
    private $datetime;
    private $category;
    private $subCategory;
    private $comments = array();

    //Constructors
    function __construct($newsID, $title, $description, $image, $status, $datetime, $category, $subCategory, $comments){
        $this->newsID = $newsID;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->datetime = $datetime;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->comments = $comments;
    }

    //Getter & Setter
    function get_newsID() {
        return $this->newsID;
    }

    function set_newsID($newsID){
        $this->newsID = $newsID;
    }

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

    function get_image() {
        return $this->image;
    }

    function set_image($image){
        $this->image = $image;
    }

    function get_status() {
        return $this->status;
    }

    function set_status($status){
        $this->status = $status;
    }
    
    function get_datetime() {
        return $this->datetime;
    }

    function set_datetime($datetime){
        $this->datetime = $datetime;
    }

    function get_category() {
        return $this->category;
    }

    function set_category($category){
        $this->category = $category;
    }

    function get_subCategory() {
        return $this->subCategory;
    }

    function set_subCategory($subCategory){
        $this->subCategory = $subCategory;
    }

    function get_comments() {
        return $this->comments;
    }

    function set_comments($comments){
        $this->comments = $comments;
    }
}
?>