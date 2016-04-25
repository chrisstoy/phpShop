<?php

/* Represents a Product */
class Product
{
    public $id;
    public $categories;
    public $name;
    public $blurb;
    public $description;
    public $image;


    function __construct($name, $blurb, $image) {
        $this->name = $name;
        $this->blurb = $blurb;
        $this->image = $image;
    }

}

?>