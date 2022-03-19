<?php
class About {
    //Variables
    private $description;

    //Parameterized Constructor
    function __construct($description){
        $this->description = $description;
    }

    //Getter Setter
    function get_description() {
        return $this->description;
    }

    function set_description($description){
        $this->description = $description;
    }
}
?>