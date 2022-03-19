<?php
class News {
    //Variables
    private $news_id;
    private $title;
    private $description;
    private $image;
    private $status;
    private $category;
    private $subCategory;
    private $comments;

    //Constructors
    function __construct($news_id, $title, $description, $image, $status, $category, $subCategory, $comments){
        $this->news_id = $news_id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->comments = $comments;
    }

    //Getter & Setter
    function get_news_id() {
        return $this->news_id;
    }

    function set_news_id($news_id){
        $this->news_id = $news_id;
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