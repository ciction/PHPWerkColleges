<?php

class ErrorMessage{
    private $title;
    private $description;

    //Constructor
    public function __construct($title = "Error", $description = "There was an unexpected error, please try again.") {
        $this->title = $title;
        $this->description = $description;
    }

    //getters & setters
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
}
?>