<?php
class Subcategory {
    //Variables
    private $subcategoryID;
    private $subcategory;
    private $subcategoryDesc;
    private $subcategoryDate;
    private $subcategoryDateModify;
    private $category;

    //Parameterized Constructor
    function __construct($subcategoryID, $subcategory, $subcategoryDesc, $subcategoryDate, $subcategoryDateModify, $category){
        $this->subcategoryID = $subcategoryID;
        $this->subcategory = $subcategory;
        $this->subcategoryDesc = $subcategoryDesc;
        $this->subcategoryDate = $subcategoryDate;
        $this->subcategoryDateModify = $subcategoryDateModify;
        $this->category = $category;
    }

    //Getter Setter
    function get_subcategoryID() {
        return $this->subcategoryID;
    }

    function set_subcategoryID($subcategoryID){
        $this->subcategoryID = $subcategoryID;
    }

    function get_subcategory() {
        return $this->subcategory;
    }

    function set_subcategory($subcategory){
        $this->subcategory = $subcategory;
    }

    function get_subcategoryDesc() {
        return $this->subcategoryDesc;
    }

    function set_subcategoryDesc($subcategoryDesc){
        $this->subcategoryDesc = $subcategoryDesc;
    }

    function get_subcategoryDate() {
        return $this->subcategoryDate;
    }

    function set_subcategoryDate($subcategoryDate){
        $this->subcategoryDate = $subcategoryDate;
    }

    function get_subcategoryDateModify() {
        return $this->subcategoryDateModify;
    }

    function set_subcategoryDateModify($subcategoryDateModify){
        $this->subcategoryDateModify = $subcategoryDateModify;
    }

    function get_category() {
        return $this->category;
    }

    function set_category($category){
        $this->category = $category;
    }
}
?>