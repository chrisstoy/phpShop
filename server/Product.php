<?php

namespace Server
{

	/* Represents a Product */
	class Product
	{
		function __construct($id, $name, $blurb, $image, $description="", $categories=[]) {
			$this->id = $id;
			$this->name = $name;
			$this->blurb = $blurb;
			$this->description = $description;
			$this->image = $image;
			$this->categories = $categories;
		}

	}
	
}
