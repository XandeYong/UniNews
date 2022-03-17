<?php
class Category{
    //Variables
    private $categoryID;
    private $category;
    private $categoryDesc;
    private $categoryDate;
    private $categoryDateModify;

    //Parameterized Constructor
    function __construct($categoryID, $category, $categoryDesc, $categoryDate, $categoryDateModify){
        $this->categoryID = $categoryID;
        $this->category = $category;
        $this->categoryDesc = $categoryDesc;
        $this->categoryDate = $categoryDate;
        $this->categoryDateModify = $categoryDateModify;
    }

    //Getter Setter
    function get_categoryID() {
        return $this->categoryID;
    }

    function set_categoryID($categoryID){
        $this->categoryID = $categoryID;
    }

    function get_category() {
        return $this->category;
    }

    function set_category($category){
        $this->category = $category;
    }

    function get_categoryDesc() {
        return $this->categoryDesc;
    }

    function set_categoryDesc($categoryDesc){
        $this->categoryDesc = $categoryDesc;
    }

    function get_categoryDate() {
        return $this->categoryDate;
    }

    function set_categoryDate($categoryDate){
        $this->categoryDate = $categoryDate;
    }

    function get_categoryDateModify() {
        return $this->categoryDateModify;
    }

    function set_categoryDateModify($categoryDateModify){
        $this->categoryDateModify = $categoryDateModify;
    }
}
?>